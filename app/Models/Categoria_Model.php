<?php

namespace App\Models;

use CodeIgniter\Model;

class Categoria_Model extends Model
{
    protected $table = 'categorias'; // nombre de tu tabla
    protected $primaryKey = 'id_categoria';

    protected $useAutoIncrement = true;

    protected $returnType     = 'array';

    protected $allowedFields = ['descripcion_categoria'];
}