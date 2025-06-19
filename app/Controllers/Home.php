<?php

namespace App\Controllers;

use App\Models\Producto_Model;
use App\Models\Categoria_Model;
use App\Models\Subcategoria_Model;
use App\Models\Marca_Model;

class Home extends BaseController
{
  public function index()
  {
    $data = [
      'title' => 'Full animal',
    ];
    return view('contenidos/inicio_view.php', $data);
  }

  public function quienes_somos()
  {
    $data = [
      'title' => 'Quienes somos - Full animal',
    ];
    return view('contenidos/quienes_somos_view', $data);
  }

  public function comercializacion()
  {
    $data = [
      'title' => 'Comercializacion - Full animal',
    ];
    return view('contenidos/comercializacion_view', $data);
  }

  public function contacto()
  {
    $data = [
      'title' => 'Contacto - Full animal',
    ];
    return view('contenidos/contactos_view', $data);
  }

  public function terminos()
  {
    $data = [
      'title' => 'Términos y Usos - Full animal',
    ];
    return view('contenidos/terminos_view', $data);
  }

  public function login()
  {
    $data = [
      'title' => 'Iniciar Sesion - Full animal',
    ];
    return view('contenidos/login_view', $data);
  }

  public function productos()
  {
    $categoriaModel = new Categoria_Model();
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

    $modelo = new Producto_Model();

    $idMarca = $this->request->getGet('marca_producto') ?? 0;
    $categoriasId = $this->request->getGet('categoria_producto') ?? [];
    $minPrice = $this->request->getGet('min_price') ?? "";
    $maxPrice = $this->request->getGet('max_price') ?? "";
    $nombre = $this->request->getGet("nombre") ?? "";
    $ordenarPor = $this->request->getGet("ordenar_por") ?? 'nombre_asc';

    $filtros = [
      'estado_producto' => true,
      'id_marca' => $idMarca,
      'categorias_id' => $categoriasId,
      'min_price' => $minPrice,
      'max_price' => $maxPrice,
      'nombre' => $nombre,
      'ordenar_por' => $ordenarPor,
      'cantidad_stock' => 0,
    ];

    $data = [
      'title' => 'Catalogo - Full animal',
      'marcas' => $opcionesMarcas,
      'categorias' => $opcionesCategorias,
      'productos' => $modelo->getProductosFiltrados($filtros),
      'categorias_seleccionadas' => $categoriasId,
      'marca' => $idMarca,
      'minPrice' => $minPrice,
      'maxPrice' => $maxPrice,
      'nombre' => $nombre,
      'ordenar_por' => $ordenarPor,
    ];

    return view('contenidos/catalogo_view', $data);
  }
}
