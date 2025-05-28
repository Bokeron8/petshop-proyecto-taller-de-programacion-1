<?php

namespace App\Models;

use CodeIgniter\Model;

class Marca_Model extends Model
{
    protected $table = 'marcas'; // nombre de tu tabla
    protected $primaryKey = 'id_marca';

    protected $useAutoIncrement = true;

    protected $returnType     = 'array';

    protected $allowedFields = ['descripcion_marca'];
}