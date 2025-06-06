<?php

namespace App\Models;

use CodeIgniter\Model;

class Producto_Model extends Model
{
    protected $table = 'productos'; // nombre de tu tabla
    protected $primaryKey = 'id_producto';

    protected $useAutoIncrement = true;

    protected $returnType     = 'array';

    protected $allowedFields = ['nombre_producto', 'descripcion_producto', 'id_marca_producto', 'stock_producto', 'precio_producto', 'imagen_producto', 'estado_producto'];

    public function obtener_con_todo()
    {
        return $this->baseQuery()->get()->getResultArray();
    }

    // En tu modelo ProductoModel
    public function baseQuery()
    {
        return $this->join('marcas', 'marcas.id_marca = productos.id_marca_producto')
            ->join('categorias_productos', 'categorias_productos.id_producto_categorias_productos = productos.id_producto')
            ->join('categorias', 'categorias.id_categoria = categorias_productos.id_categoria_categorias_productos')
            ->select('
                productos.*,
                marcas.descripcion_marca AS descripcion_marca,
                GROUP_CONCAT(categorias.descripcion_categoria SEPARATOR ", ") AS descripcion_categoria')
            ->groupBy('productos.id_producto');
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

        if (!empty($filtros['categorias_id'])) {
            $query->whereIn('categorias_productos.id_categoria_categorias_productos', $filtros['categorias_id']);
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


        return $query->get()->getResultArray();
    }
}
