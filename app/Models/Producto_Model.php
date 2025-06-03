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
        return $this->db->table('productos p')
            ->select('p.*, m.descripcion_marca, c.descripcion_categoria, s.descripcion_subcategoria')
            ->join('marcas m', 'p.id_marca_producto = m.id_marca')
            ->join('categorias c', 'p.id_categoria_producto = c.id_categoria')
            ->join('subcategorias s', 'p.id_subcategoria_producto = s.id_subcategoria')
            ->get()
            ->getResultArray();
    }

}