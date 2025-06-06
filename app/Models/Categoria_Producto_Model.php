<?php

namespace App\Models;

use CodeIgniter\Model;

class Categoria_Producto_Model extends Model
{
  protected $table = 'categorias_productos'; // nombre de tu tabla
  protected $primaryKey = 'id_categorias_producto';

  protected $useAutoIncrement = true;

  protected $returnType     = 'array';

  protected $allowedFields = ['id_producto_categorias_productos', 'id_categoria_categorias_productos'];
}
