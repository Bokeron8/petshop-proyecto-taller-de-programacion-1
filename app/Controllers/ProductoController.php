<?php

namespace App\Controllers;

use App\Models\Producto_Model;
use App\Models\Categoria_Model;
use App\Models\Categoria_Producto_Model;
use App\Models\Marca_Model;

class ProductoController extends BaseController
{
  public function form_agregar_producto()
  {
    $categoriaModel = new Categoria_Model();
    $categoria_Producto_Model = new Categoria_Producto_Model();
    $marcaModel = new Marca_Model();

    $categorias = $categoriaModel->findAll();
    $marcas = $marcaModel->findAll();

    $opcionesCategorias = ['0' => 'Seleccionar categoría'];
    foreach ($categorias as $cat) {
      $opcionesCategorias[$cat['id_categoria']] = $cat['descripcion_categoria'];
    }

    $opcionesMarcas = ['0' => 'Seleccionar marca'];
    foreach ($marcas as $marca) {
      $opcionesMarcas[$marca['id_marca']] = $marca['descripcion_marca'];
    }

    $validation = session()->getFlashdata('validation');

    return view('Backend/agregar_view', [
      'categorias' => $opcionesCategorias,
      'marcas' => $opcionesMarcas,
      'validation' => $validation,
      'title' => 'Agregar productos - Full animal'
    ]);
  }

  public function registrarProducto()
  {
    $model = new Producto_Model();
    $categoria_Producto_Model = new Categoria_Producto_Model();

    $rules = [
      'nombre_producto' => [
        'rules' => 'required|min_length[3]|max_length[100]',
        'errors' => [
          'required' => 'El nombre del producto es obligatorio.',
          'min_length' => 'El nombre debe tener al menos {param} caracteres.',
          'max_length' => 'El nombre no puede superar los {param} caracteres.'
        ]
      ],
      'descripcion_producto' => [
        'rules' => 'required|min_length[3]|max_length[1000]',
        'errors' => [
          'required' => 'La descripción del producto es obligatoria.',
          'min_length' => 'La descripción debe tener al menos {param} caracteres.',
          'max_length' => 'La descripción no puede superar los {param} caracteres.'
        ]
      ],
      'stock_producto' => [
        'rules' => 'required|integer|greater_than_equal_to[0]',
        'errors' => [
          'required' => 'El stock es obligatorio.',
          'integer' => 'El stock debe ser un número entero.',
          'greater_than_equal_to' => 'El stock no puede ser negativo.'
        ]
      ],
      'precio_producto' => [
        'rules' => 'required|numeric|greater_than_equal_to[0]',
        'errors' => [
          'required' => 'El precio es obligatorio.',
          'numeric' => 'El precio debe ser un número.',
          'greater_than_equal_to' => 'El precio no puede ser negativo.'
        ]
      ],
      'categoria_producto' => [
        'rules' => 'required',
        'errors' => [
          'required' => 'Debes seleccionar al menos una categoría.'
        ]
      ],
      'categoria_producto.*' => [
        'rules' => 'is_not_unique[categorias.id_categoria]',
        'errors' => [
          'is_not_unique' => 'Una o más categorías seleccionadas no son válidas.'
        ]
      ],


      'marca_producto' => [
        'rules' => 'required|is_not_unique[marcas.id_marca]',
        'errors' => [
          'required' => 'La marca es obligatoria.',
          'is_not_unique' => 'La marca seleccionada no es válida.'
        ]
      ],
      'imagen_producto' => [
        'rules' => 'uploaded[imagen_producto]|max_size[imagen_producto,2048]' . '|mime_in[imagen_producto,image/jpeg,image/png,image/gif,image/webp,image/avif]',
        'errors' => [
          'uploaded' => 'La imagen es obligatoria.',
          'is_image' => 'El archivo debe ser una imagen válida.',
          'max_size' => 'La imagen no puede superar los 2MB.'
        ]
      ]
    ];


    if (!$this->validate($rules)) {

      return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
    }

    $imagen = $this->request->getFile('imagen_producto');
    $nombreImagen = $imagen->getRandomName();

    $data = [
      'nombre_producto' => $this->request->getPost('nombre_producto'),
      'descripcion_producto' => $this->request->getPost('descripcion_producto'),
      'stock_producto' => $this->request->getPost('stock_producto'),
      'precio_producto' => $this->request->getPost('precio_producto'),
      'id_marca_producto' => $this->request->getPost('marca_producto'),
      'imagen_producto' => $nombreImagen,
      'estado_producto' => 1
    ];

    $categorias = $this->request->getPost('categoria_producto');

    $product_id = $model->insert($data);

    if ($product_id) {
      $imagen->move('assets/uploads', $nombreImagen);

      foreach ($categorias as $categoria) {
        $categoria_Producto_Model->insert([
          'id_producto_categorias_productos' => $product_id,
          'id_categoria_categorias_productos' => $categoria
        ]);
      }
      return redirect()->back()->with('success', 'Producto agregado correctamente.');
    } else {
      return redirect()->back()->withInput()->with('error', 'Hubo un error al guardar el producto.');
    }
  }

  public function gestionar_productos()
  {
    $productoModel = new \App\Models\Producto_Model();
    $categoriaModel = new \App\Models\Categoria_Model();

    // Captura filtros desde la URL
    $categoriaSeleccionada = $this->request->getGet('categoria');
    $nombreBuscado = $this->request->getGet('nombre');
    $ordenarPor = $this->request->getGet('ordenar_por');

    $filtros = [];

    if (!empty($categoriaSeleccionada)) {
      $filtros['categorias_id'] = [$categoriaSeleccionada];
    }

    if (!empty($nombreBuscado)) {
      $filtros['nombre'] = $nombreBuscado;
    }

    if (!empty($ordenarPor)) {
      $filtros['ordenar_por'] = $ordenarPor;
    }

    $productos = $productoModel->getProductosFiltrados($filtros);
    $categorias = $categoriaModel->findAll();

    return view('Backend/gestionar_view', [
      'productos' => $productos,
      'categorias' => $categorias,
      'categoriaSeleccionada' => $categoriaSeleccionada,
      'nombreBuscado' => $nombreBuscado,
      'ordenar_por' =>  $ordenarPor,
      'title' => 'Gestionar productos - Full animal'
    ]);
  }

  public function activar($id)
  {
    $productoModel = new \App\Models\Producto_Model();
    $productoModel->update($id, ['estado_producto' => 1]);

    return redirect()->to(base_url('admin/gestionar-productos'));
  }

  public function desactivar($id)
  {
    $productoModel = new \App\Models\Producto_Model();
    $productoModel->update($id, ['estado_producto' => 0]);

    return redirect()->to(base_url('admin/gestionar-productos'));
  }

  public function editar_Producto($id)
  {
    $productoModel = new Producto_Model();
    $categoriaModel = new Categoria_Model();
    $marcaModel = new Marca_Model();

    $producto = $productoModel
      ->join('marcas', 'marcas.id_marca = productos.id_marca_producto')
      ->join('categorias_productos', 'categorias_productos.id_producto_categorias_productos = productos.id_producto')
      ->join('categorias', 'categorias.id_categoria = categorias_productos.id_categoria_categorias_productos')
      ->select('
            productos.*,
            marcas.descripcion_marca AS descripcion_marca,
            GROUP_CONCAT(categorias.id_categoria SEPARATOR ", ") AS categorias_id')
      ->groupBy('productos.id_producto')
      ->where('id_producto', $id)
      ->first();

    if (!$producto) {
      return redirect()->to('/admin/gestionar-productos')->with('error', 'Producto no encontrado');
    }

    $opcionesCategorias = ['0' => 'Seleccionar categoría'];
    foreach ($categoriaModel->findAll() as $cat) {
      $opcionesCategorias[$cat['id_categoria']] = $cat['descripcion_categoria'];
    }



    $opcionesMarcas = ['0' => 'Seleccionar marca'];
    foreach ($marcaModel->findAll() as $marca) {
      $opcionesMarcas[$marca['id_marca']] = $marca['descripcion_marca'];
    }

    return view('Backend/editar_view', [
      'producto' => $producto,
      'categorias' => $opcionesCategorias,
      'marcas' => $opcionesMarcas,
      'title' => 'Editar productos - Full animal'
    ]);
  }

  public function actualizarProducto($id)
  {
    $productoModel = new Producto_Model();
    $categoria_Producto_Model = new Categoria_Producto_Model();
    $productoExistente = $productoModel->where('id_producto', $id)->first();
    if (!$productoExistente) {
      return redirect()->to('/admin/gestionar-productos')->with('error', 'Producto no encontrado');
    }


    $rules = [
      'nombre_producto' => [
        'rules' => 'required|min_length[3]|max_length[100]',
        'errors' => [
          'required' => 'El nombre del producto es obligatorio.',
          'min_length' => 'El nombre debe tener al menos {param} caracteres.',
          'max_length' => 'El nombre no puede superar los {param} caracteres.'
        ]
      ],
      'descripcion_producto' => [
        'rules' => 'required|min_length[3]|max_length[1000]',
        'errors' => [
          'required' => 'La descripción del producto es obligatoria.',
          'min_length' => 'La descripción debe tener al menos {param} caracteres.',
          'max_length' => 'La descripción no puede superar los {param} caracteres.'
        ]
      ],
      'stock_producto' => [
        'rules' => 'required|integer|greater_than_equal_to[0]',
        'errors' => [
          'required' => 'El stock es obligatorio.',
          'integer' => 'El stock debe ser un número entero.',
          'greater_than_equal_to' => 'El stock no puede ser negativo.'
        ]
      ],
      'precio_producto' => [
        'rules' => 'required|numeric|greater_than_equal_to[0]',
        'errors' => [
          'required' => 'El precio es obligatorio.',
          'numeric' => 'El precio debe ser un número.',
          'greater_than_equal_to' => 'El precio no puede ser negativo.'
        ]
      ],
      'categoria_producto' => [
        'rules' => 'required',
        'errors' => [
          'required' => 'Debes seleccionar al menos una categoría.'
        ]
      ],
      'categoria_producto.*' => [
        'rules' => 'is_not_unique[categorias.id_categoria]',
        'errors' => [
          'is_not_unique' => 'Una o más categorías seleccionadas no son válidas.'
        ]
      ],
      'marca_producto' => [
        'rules' => 'required|is_not_unique[marcas.id_marca]',
        'errors' => [
          'required' => 'La marca es obligatoria.',
          'is_not_unique' => 'La marca seleccionada no es válida.'
        ]
      ]
    ];


    if ($this->request->getFile('imagen_producto')->isValid()) {
      $rules['imagen_producto'] = 'max_size[imagen_producto,2048]' . '|mime_in[imagen_producto,image/jpeg,image/png,image/gif,image/webp,image/avif]';
    }

    if (!$this->validate($rules)) {
      return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
    }


    $imagen = $this->request->getFile('imagen_producto');
    if ($imagen->isValid() && !$imagen->hasMoved()) {
      $nombreImagen = $imagen->getRandomName();
      $imagen->move('assets/uploads', $nombreImagen);
    } else {
      $nombreImagen = $productoExistente['imagen_producto'];
    }

    $data = [
      'nombre_producto' => $this->request->getPost('nombre_producto'),
      'descripcion_producto' => $this->request->getPost('descripcion_producto'),
      'stock_producto' => $this->request->getPost('stock_producto'),
      'precio_producto' => $this->request->getPost('precio_producto'),
      'id_marca_producto' => $this->request->getPost('marca_producto'),
      'imagen_producto' => $nombreImagen
    ];
    $categorias = $this->request->getPost('categoria_producto');

    $productoModel->update($id, $data);
    $categoria_Producto_Model->where('id_producto_categorias_productos', $id)->delete();
    foreach ($categorias as $categoria) {

      $categoria_Producto_Model->insert([
        'id_producto_categorias_productos' => $id,
        'id_categoria_categorias_productos' => $categoria
      ]);
    }

    return redirect()->to('/admin/gestionar-productos')->with('success', 'Producto actualizado correctamente.');
  }


  public function ver_producto($id)
  {
    $productoModel = new Producto_Model();
    $categoriaProductoModel = new Categoria_Producto_Model();

    $producto = $productoModel->where('id_producto', $id)->first();





    $filtros = ['id_marca' => $producto['id_marca_producto'], 'excluir_id' => $id];
    $productosRelacionados = $productoModel->getProductosFiltrados($filtros);

    if (!$producto) {
      throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound("Producto no encontrado.");
    }

    $data = [
      'producto' => $producto,
      'productos_relacionados' => $productosRelacionados,
      'title' => $producto['nombre_producto'] . ' - Full Animal'
    ];

    return view('contenidos/producto_view', $data);
  }
}
