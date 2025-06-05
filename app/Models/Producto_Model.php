<?php

namespace App\Models;

use CodeIgniter\Model;

class Producto_Model extends Model
{
    protected $table = 'productos'; // nombre de tu tabla
    protected $primaryKey = 'id_producto';

    protected $useAutoIncrement = true;

    protected $returnType     = 'array';

    protected $allowedFields = ['id_producto', 'nombre_producto', 'descripcion_producto', 'id_marca_producto', 'id_categoria_producto', 'id_subcategoria_producto', 'stock_producto', 'precio_producto', 'imagen_producto', 'estado_producto'];

    public function obtener_con_todo()
    {
        return $this->baseQuery()->findAll();
    }

    // En tu modelo ProductoModel
    public function baseQuery()
    {
        return $this->join('marcas', 'marcas.id_marca = productos.id_marca_producto')
            ->join('categorias', 'categorias.id_categoria = productos.id_categoria_producto')
            ->join('subcategorias', 'subcategorias.id_subcategoria = productos.id_subcategoria_producto');
    }

    public function getProductosFiltrados($filtros = [])
    {
        $query = $this->baseQuery();
        $query->where('productos.stock_producto >', 0);

        if (!empty($filtros['estado_producto'])) {
            $query->where('productos.estado_producto', $filtros['estado_producto']);
        }

        if (!empty($filtros['id_marca'])) {
            $query->where('productos.id_marca_producto', $filtros['id_marca']);
        }

        if (!empty($filtros['id_categoria'])) {
            $query->where('productos.id_categoria_producto', $filtros['id_categoria']);
        }

        if (!empty($filtros['min_price'])) {
            $query->where('productos.precio_producto >', $filtros['min_price']);
        }

        if (!empty($filtros['max_price'])) {
            $query->where('productos.precio_producto <', $filtros['max_price']);
        }

        if (!empty($filtros['nombre'])) {
            $query->like('productos.nombre', $filtros['nombre']);
        }


        return $query->findAll();
    }
}
