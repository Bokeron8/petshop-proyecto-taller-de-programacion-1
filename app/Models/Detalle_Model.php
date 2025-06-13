<?php

namespace App\Models;

use CodeIgniter\Model;

class Detalle_Model extends Model
{
    protected $table            = 'detalle_venta';
    protected $primaryKey       = 'id_venta';

    protected $allowedFields    = [
        'id_venta',
        'id_producto',
        'detalle_cantidad',
        'detalle_precio',
        'detalle_subtotal'
    ];

    protected $useTimestamps    = false;
    protected $returnType       = 'array';

}
