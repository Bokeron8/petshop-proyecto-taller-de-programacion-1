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

        $data = ['id' => $id, 'qty' => 1, 'price' => $price, 'name' => $name];
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
    public function eliminarProducto()
    {
        $cart = \Config\Services::cart();

        $cart->remove('4166b0e7fc8446e81e16883e9a812db8');
    }
    public function vaciarCarrito()
    {
        $cart = \Config\Services::cart();

        $cart->destroy();
    }
}