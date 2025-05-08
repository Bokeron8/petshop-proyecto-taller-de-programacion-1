<?php

namespace App\Models;

use CodeIgniter\Model;

class MensajeModel extends Model
{
    protected $table = 'mensajes'; // nombre de tu tabla
    protected $primaryKey = 'id_mensaje';

    protected $allowedFields = ['nombre_mensaje', 'email_mensaje', 'mensaje'];
}