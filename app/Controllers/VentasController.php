<?php

namespace App\Controllers;

class VentasController extends BaseController
{
  public function listarVentas()
  {
    $ventaModel = new \App\Models\Venta_Model();
    $usuarioModel = new \App\Models\Usuarios_Model();

    $usuario = session()->get('usuario');
    $esAdmin = ($usuario['perfil_id'] == 2);

    $ordenarPor = $this->request->getGet('ordenar_por') ?? 'fecha_desc';

    // Definir orden
    switch ($ordenarPor) {
      case 'fecha_asc':
        $orderBy = ['venta.venta_id', 'ASC'];
        break;
      case 'total_desc':
        $orderBy = ['venta.venta_total', 'DESC'];
        break;
      case 'total_asc':
        $orderBy = ['venta.venta_total', 'ASC'];
        break;
      default:
        $orderBy = ['venta.venta_id', 'DESC'];
        break;
    }

    if ($esAdmin) {
      $ventas = $ventaModel
        ->select('venta.*, usuarios.nombre_usuario, usuarios.apellido_usuario')
        ->join('usuarios', 'usuarios.id_usuario = venta.id_cliente')
        ->orderBy($orderBy[0], $orderBy[1])
        ->findAll();
    } else {
      $ventas = $ventaModel
        ->select('venta.*, usuarios.nombre_usuario, usuarios.apellido_usuario')
        ->join('usuarios', 'usuarios.id_usuario = venta.id_cliente')
        ->where('id_cliente', $usuario['id_usuario'])
        ->orderBy($orderBy[0], $orderBy[1])
        ->findAll();
    }

    return view('Backend/listar_ventas_view', [
      'ventas' => $ventas,
      'esAdmin' => $esAdmin,
      'ordenarPor' => $ordenarPor,
      'title' => 'Listar - Full Animal'
    ]);
  }

  public function detalle($id)
  {
    $ventaModel = new \App\Models\Venta_Model();
    $detalleModel = new \App\Models\Detalle_Model();
    $productoModel = new \App\Models\Producto_Model();
    $usuario = session()->get('usuario');

    $venta = $ventaModel
      ->select('venta.*, usuarios.nombre_usuario, usuarios.apellido_usuario, usuarios.dni_usuario, usuarios.domicilio_usuario, usuarios.telefono_usuario')
      ->join('usuarios', 'usuarios.id_usuario = venta.id_cliente')
      ->where('venta_id', $id)
      ->first();

    if (!$venta) {
      return redirect()->to('/ventas')->with('error', 'Venta no encontrada.');
    }

    // Evitar que un usuario vea una venta ajena
    if ($usuario['perfil_id'] != 2 && $venta['id_cliente'] != $usuario['id_usuario']) {
      return redirect()->to('/ventas')->with('error', 'No tienes permiso para ver esta venta.');
    }

    $detalles = $detalleModel
      ->select('detalle_venta.*, productos.nombre_producto')
      ->join('productos', 'productos.id_producto = detalle_venta.id_producto')
      ->where('id_venta', $id)
      ->findAll();

    return view('Backend/detalle_venta_view', [
      'venta' => $venta,
      'detalles' => $detalles,
      'title' => 'Detalle - Full Animal'
    ]);
  }
}
