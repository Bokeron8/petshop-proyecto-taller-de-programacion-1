<?php

namespace App\Models;

use CodeIgniter\Model;

class Mensaje_Model extends Model
{
    protected $table = 'usuarios'; // nombre de tu tabla
    protected $primaryKey = 'id_usuario';

    protected $useAutoIncrement = true;

    protected $returnType     = 'array';

    protected $allowedFields = ['descripcion_perfil', 'nombre_usuario', 'apellido_usuario', 'dni_usuario', 'domicilio_usuario', 'email_usuario', 'contraseña_usuario', 'estado_usuario', 'telefono_usuario', 'perfil_id'];
}