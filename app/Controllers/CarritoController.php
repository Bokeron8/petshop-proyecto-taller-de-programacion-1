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
}