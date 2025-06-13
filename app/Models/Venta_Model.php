<?php

namespace App\Models;

use CodeIgniter\Model;


class Venta_Model extends Model
{
    protected $table            = 'venta';
    protected $primaryKey       = 'venta_id';
    protected $allowedFields    = [
        'id_cliente',
        'venta_fecha',
        'venta_total',
        'venta_forma_pago',
        'venta_forma_entrega'
    ];

    protected $useAutoIncrement = true;
    protected $useTimestamps    = false;
    protected $returnType       = 'array';
}
