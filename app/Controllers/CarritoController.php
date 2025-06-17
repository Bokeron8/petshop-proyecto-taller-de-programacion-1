<?php

namespace App\Controllers;

class CarritoController extends BaseController
{
    public function agregarProducto()
    {
        $cart = \Config\Services::cart();
        $id = $this->request->getPost('id');
        $name = $this->request->getPost('nombre');
        $price = $this->request->getPost('precio');
        $imagen = $this->request->getpost('imagen');

        $data = ['id' => $id, 'qty' => 1, 'price' => $price, 'name' => $name, 'options' => ['imagen' => $imagen]];
        // Insert an array of values
        $cart->insert($data);


        return $this->response->setJSON(['success' => true, 'message' => 'Producto agregado']);
    }

    public function verCarrito()
    {
        $cart = \Config\Services::cart();

        $data = ['carrito' => $cart->contents(), 'title' => 'Carrito - Full Animal'];
        return view('contenidos/carrito_view.php', $data);
    }


    public function eliminarProducto($rowid = null)
    {
        $cart = \Config\Services::cart();
        if ($rowid) {
            $cart->remove($rowid);
        }

        return redirect()->to('/carrito'); // o la ruta que uses
    }

    public function vaciarCarrito()
    {
        $cart = \Config\Services::cart();
        $cart->destroy();

        return redirect()->to('/productos'); // redirige a vista del carrito
    }

    public function reducirCantidad($rowid = null)
    {
        $cart = \Config\Services::cart();
        $item = $cart->getItem($rowid);

        if ($item) {
            $nuevaCantidad = $item['qty'] - 1;
            if ($nuevaCantidad > 0) {
                $cart->update([
                    'rowid' => $rowid,
                    'qty'   => $nuevaCantidad
                ]);
            } else {
                $cart->remove($rowid);
            }
        }

        return redirect()->to('/carrito'); // redirige a vista del carrito
    }

    public function finalizarCompra()
    {
        $cart = \Config\Services::cart();
        $productoModel = new \App\Models\Producto_Model();
        $usuarioModel = new \App\Models\Usuarios_Model();

        foreach ($cart->contents() as $item) {
            $producto = $productoModel->where('id_producto', $item['id'])->first();
            if (!$producto || $producto['stock_producto'] < $item['qty']) {
                return redirect()->to('/carrito')->with('error', 'Stock insuficiente del producto: ' . $item['name'] .
                    ' (stock actual: ' . $producto['stock_producto'] . ', cantidad deseada: ' . $item['qty'] . ')');
            }
        }
        $usuario = session()->get('usuario');
        if (!$usuario || !isset($usuario['id_usuario'])) {
            return redirect()->to('/')
                ->with('error', 'No iniciaste sesion');
        }
        $clienteId = $usuario['id_usuario'];
        $usuario = $usuarioModel->where('id_usuario', $clienteId)->first();

        return view('contenidos/checkout_view', ['usuario' => $usuario, 'title' => 'Checkout - Full Animal']);
    }


    public function procesarVenta()
    {
        $request = \Config\Services::request();
        $session = session();
        $cart = \Config\Services::cart();

        $usuarioModel     = new \App\Models\Usuarios_Model();
        $ventaModel       = new \App\Models\Venta_Model();
        $detalleModel     = new \App\Models\Detalle_Model();
        $productoModel    = new \App\Models\Producto_Model();

        $idUsuario = $session->get('usuario')['id_usuario'];

        // Validación de los datos
        $rules = [
            'dni'           => 'required|numeric|min_length[7]|max_length[8]',
            'telefono'      => 'required|numeric|exact_length[10]',
            'direccion'     => 'required|min_length[5]',
            'forma_pago'    => 'required',
            'forma_entrega' => 'required|in_list[0,1]',
            'confirmacion'  => 'required'
        ];

        if (!$this->validate($rules)) {
            return view('contenidos/checkout_view', [
                'usuario'    => $usuarioModel->find($idUsuario),
                'validation' => $this->validator,
                'title'      => 'Checkout - Full Animal'
            ]);
        }


        // ✅ Actualizar usuario
        $usuarioModel->update($idUsuario, [
            'dni_usuario'       => $request->getPost('dni'),
            'telefono_usuario'  => $request->getPost('telefono'),
            'domicilio_usuario' => $request->getPost('direccion')
        ]);

        // ✅ Crear la venta
        $ventaData = [
            'id_cliente'          => $idUsuario,
            'venta_fecha'         => date('Y-m-d'),
            'venta_total'         => $cart->total(),
            'venta_forma_pago'    => $request->getPost('forma_pago'),
            'venta_forma_entrega' => $request->getPost('forma_entrega'),
        ];

        $ventaModel->insert($ventaData);
        $idVenta = $ventaModel->insertID();

        // ✅ Guardar el detalle y descontar stock
        foreach ($cart->contents() as $item) {
            $detalleModel->insert([
                'id_venta'         => $idVenta,
                'id_producto'      => $item['id'],
                'detalle_cantidad' => $item['qty'],
                'detalle_precio'   => $item['price'],
                'detalle_subtotal' => $item['qty'] * $item['price']
            ]);

            // Descontar stock
            $productoModel->where('id_producto', $item['id'])
                ->set('stock_producto', 'stock_producto - ' . $item['qty'], false)
                ->update();
        }

        $cart->destroy(); // Vaciar carrito

        return redirect()->to('/ventas')->with('success', '¡Compra realizada con éxito!');
    }
}