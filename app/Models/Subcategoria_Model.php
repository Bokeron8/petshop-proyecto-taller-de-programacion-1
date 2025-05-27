<?php

namespace App\Models;

use CodeIgniter\Model;

class Subcategoria_Model extends Model
{
    protected $table = 'subcategorias'; // nombre de tu tabla
    protected $primaryKey = 'id_subcategoria';

    protected $useAutoIncrement = true;

    protected $returnType     = 'array';

    protected $allowedFields = ['id_subcategoria', 'descripcion_subcategoria'];
}