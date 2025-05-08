<?php

namespace App\Controllers;

use App\Models\MensajeModel;

class Mensaje extends BaseController
{
    public function enviar()
    {
        $model = new MensajeModel();

        // Obtener datos POST
        $data = [
            'nombre_mensaje' => $this->request->getPost('nombre'),
            'email_mensaje'  => $this->request->getPost('email'),
            'mensaje'        => $this->request->getPost('mensaje'),
        ];

        // Insertar en la base de datos
        if ($model->insert($data)) {
            return redirect()->to('/')->with('success', 'Mensaje enviado correctamente.');
        } else {
            return redirect()->back()->with('error', 'Hubo un error al enviar el mensaje.');
        }
    }
}