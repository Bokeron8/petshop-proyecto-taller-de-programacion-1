<?php

namespace App\Models;

use CodeIgniter\Model;

class Mensaje_Model extends Model
{
    protected $table = 'mensajes'; // nombre de tu tabla
    protected $primaryKey = 'id_mensaje';

    protected $useAutoIncrement = true;

    protected $returnType     = 'array';

    protected $allowedFields = ['nombre_mensaje', 'email_mensaje', 'mensaje', 'fecha_mensaje', 'estado_mensaje'];
}
