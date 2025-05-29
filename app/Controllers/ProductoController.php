<?php

namespace App\Controllers;

use App\Models\Producto_Model;
use App\Models\Categoria_Model;
use App\Models\Subcategoria_Model;
use App\Models\Marca_Model;

class ProductoController extends BaseController
{
    public function form_gestionar_producto()
    {
        $categoriaModel = new Categoria_Model();
        $subcategoriaModel = new Subcategoria_Model();
        $marcaModel = new Marca_Model();

        $categorias = $categoriaModel->findAll();
        $subcategorias = $subcategoriaModel->findAll();
        $marcas = $marcaModel->findAll();

        $opcionesCategorias = ['0' => 'Seleccionar categoría'];
        foreach ($categorias as $cat) {
            $opcionesCategorias[$cat['id_categoria']] = $cat['descripcion_categoria'];
        }

        $opcionesSubcategorias = ['0' => 'Seleccionar subcategoría'];
        foreach ($subcategorias as $sub) {
            $opcionesSubcategorias[$sub['id_subcategoria']] = $sub['descripcion_subcategoria'];
        }

        $opcionesMarcas = ['0' => 'Seleccionar marca'];
        foreach ($marcas as $marca) {
            $opcionesMarcas[$marca['id_marca']] = $marca['descripcion_marca'];
        }

        $validation = session()->getFlashdata('validation');

        return view('Backend/agregar_view', [
            'categorias' => $opcionesCategorias,
            'subcategorias' => $opcionesSubcategorias,
            'marcas' => $opcionesMarcas,
            'validation' => $validation,
            'title' => 'Agregar productos - Full animal'
        ]);
    }

    public function registrarProducto()
    {
        $model = new Producto_Model();

        $rules = [
            'nombre_producto' => [
                'rules' => 'required|min_length[3]|max_length[50]',
                'errors' => [
                    'required' => 'El nombre del producto es obligatorio.',
                    'min_length' => 'El nombre debe tener al menos {param} caracteres.',
                    'max_length' => 'El nombre no puede superar los {param} caracteres.'
                ]
            ],
            'descripcion_producto' => [
                'rules' => 'required|min_length[3]|max_length[50]',
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
                'rules' => 'required|is_not_unique[categorias.id_categoria]',
                'errors' => [
                    'required' => 'La categoría es obligatoria.',
                    'is_not_unique' => 'La categoría seleccionada no es válida.'
                ]
            ],
            'subcategoria_producto' => [
                'rules' => 'required|is_not_unique[subcategorias.id_subcategoria]',
                'errors' => [
                    'required' => 'La subcategoría es obligatoria.',
                    'is_not_unique' => 'La subcategoría seleccionada no es válida.'
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
                'rules' => 'uploaded[imagen_producto]|is_image[imagen_producto]|max_size[imagen_producto,2048]',
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
        $imagen->move('assets/uploads', $nombreImagen);

        $data = [
            'nombre_producto' => $this->request->getPost('nombre_producto'),
            'descripcion_producto' => $this->request->getPost('descripcion_producto'),
            'stock_producto' => $this->request->getPost('stock_producto'),
            'precio_producto' => $this->request->getPost('precio_producto'),
            'id_categoria_producto' => $this->request->getPost('categoria_producto'),
            'id_subcategoria_producto' => $this->request->getPost('subcategoria_producto'),
            'id_marca_producto' => $this->request->getPost('marca_producto'),
            'imagen_producto' => $nombreImagen,
            'estado_producto' => 1
        ];

        if ($model->insert($data)) {
            return redirect()->back()->withInput()->with('success', 'Producto agregado correctamente.');
        } else {
            return redirect()->back()->withInput()->with('error', 'Hubo un error al guardar el producto.');
        }
    }
}