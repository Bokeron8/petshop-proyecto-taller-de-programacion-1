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
        $modelo = new Producto_Model();

        $idMarca = $this->request->getGet('marca_producto') ?? 0;
        $idCategoria = $this->request->getGet('categoria_producto') ?? 0;
        $minPrice = $this->request->getGet('min_price') ?? 0;
        $maxPrice = $this->request->getGet('max_price') ?? 999999;

        // Puedes pasarlos a tu modelo
        $filtros = [
            'estado_producto' => true,
            'id_marca' => $idMarca,
            'id_categoria' => $idCategoria,
            'min_price' => $minPrice,
            'max_price' => $maxPrice
        ];
        $data = [
            'title' => 'Catalogo - Full animal',
            'marcas' => $opcionesMarcas,
            'categorias' => $opcionesCategorias,
            'subcategorias' => $opcionesSubcategorias,
            'productos' => $modelo->getProductosFiltrados($filtros),
            'categoria' => $idCategoria,
            'marca' => $idMarca,
            'minPrice' => $minPrice,
            'maxPrice' => $maxPrice
        ];
        return view('contenidos/catalogo_view', $data);
    }
}
