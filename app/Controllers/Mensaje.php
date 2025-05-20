<?php

namespace App\Controllers;

use App\Models\Mensaje_Model;

class Mensaje extends BaseController
{


    public function enviar()
    {
        $validation = \Config\Services::validation();
        $request = \Config\Services::request();

        $model = new Mensaje_Model();


        // Reglas de validación
        $validation->setRules([
            'nombre' => [
                'label' => 'Nombre',
                'rules' => 'required|min_length[3]|max_length[50]',
                'errors' => [
                    'required' => 'El {field} es obligatorio.',
                    'min_length' => 'El {field} debe tener al menos {param} caracteres.',
                    'max_length' => 'El {field} no puede superar los {param} caracteres.'
                ]
            ],
            'email' => [
                'label' => 'Correo electrónico',
                'rules' => 'required|valid_email|max_length[50]',
                'errors' => [
                    'required' => 'El {field} es obligatorio.',
                    'valid_email' => 'El {field} debe ser un correo electrónico válido.',
                    'max_length' => 'El {field} no puede superar los {param} caracteres.'
                ]
            ],
            'mensaje' => [
                'label' => 'Mensaje',
                'rules' => 'required|min_length[10]|max_length[500]',
                'errors' => [
                    'required' => 'Debes escribir un mensaje.',
                    'min_length' => 'El mensaje debe tener al menos {param} caracteres.',
                    'max_length' => 'El mensaje no puede tener más de {param} caracteres.'
                ]
            ],
        ]);

        // Validar los datos del formulario
        if ($validation->withRequest($request)->run()) {
            $data = [
                'nombre_mensaje' => $this->request->getPost('nombre'),
                'email_mensaje'  => $this->request->getPost('email'),
                'mensaje'        => $this->request->getPost('mensaje'),
            ];
            // Guardar en base de datos
            if ($model->insert($data)) {
                return redirect()->to('/')->with('success', 'Mensaje enviado correctamente.');
            } else {
                return redirect()->back()->withInput()->with('error', 'Hubo un error al enviar el mensaje.');
            }
        } else {
            $data = [
                'title' => 'Contacto - Full animal',
                'validation' => $validation,
            ];
            return view('contenidos/contactos_view', $data);
        }
    }
}