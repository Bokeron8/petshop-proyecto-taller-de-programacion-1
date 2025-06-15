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

        if ($esAdmin) {
            // Trae todas las ventas con JOIN a usuarios
            $ventas = $ventaModel
                ->select('venta.*, usuarios.nombre_usuario, usuarios.apellido_usuario')
                ->join('usuarios', 'usuarios.id_usuario = venta.id_cliente')
                ->findAll();
        } else {
            // Solo las ventas del usuario actual
            $ventas = $ventaModel
                ->select('venta.*, usuarios.nombre_usuario, usuarios.apellido_usuario')
                ->join('usuarios', 'usuarios.id_usuario = venta.id_cliente')
                ->where('id_cliente', $usuario['id_usuario'])
                ->findAll();
        }

        return view('Backend/listar_ventas_view', [
            'ventas' => $ventas,
            'esAdmin' => $esAdmin,
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

