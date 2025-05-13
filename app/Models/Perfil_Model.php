<?php

namespace App\Models;

use CodeIgniter\Model;

class Mensaje_Model extends Model
{
    protected $table = 'perfiles'; // nombre de tu tabla
    protected $primaryKey = 'id_perfil';

    protected $useAutoIncrement = true;

    protected $returnType     = 'array';

    protected $allowedFields = ['descripcion_perfil'];
}