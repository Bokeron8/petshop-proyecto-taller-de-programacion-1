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
}