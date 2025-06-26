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
                'estado_mensaje' => 0
            ];
            // Guardar en base de datos
            if ($model->insert($data)) {
                return redirect()->to('/contacto')->with('success', 'Mensaje enviado correctamente.');
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


    public function verMensajes()
    {
        $mensajeModel = new \App\Models\Mensaje_Model();

        $fechaInicio = $this->request->getGet('fecha_inicio');
        $fechaFin    = $this->request->getGet('fecha_fin');
        $builder = $mensajeModel;
        $estado = $this->request->getGet('estado');

        if ($fechaInicio) {
            $builder = $builder->where('fecha_mensaje >=', $fechaInicio);
        }
        if ($fechaFin) {
            $builder = $builder->where('fecha_mensaje <=', $fechaFin);
        }

        if ($estado === 'leidos') {
            $builder = $builder->where('estado_mensaje', 1);
        } elseif ($estado === 'no-leidos') {
            $builder = $builder->where('estado_mensaje', 0);
        }

        $mensajes = $builder->findAll();

        return view('Backend/mensajes_view', [
            'title' => 'Consultas - Full Animal',
            'mensajes' => $mensajes,
            'fecha_inicio' => $fechaInicio,
            'fecha_fin' => $fechaFin,
            'estado' => $estado
        ]);
    }

    public function marcarLeido($id)
    {
        $mensajeModel = new \App\Models\Mensaje_Model();
        $mensajeModel->update($id, ['estado_mensaje' => 1]);

        return redirect()->back()->with('mensaje', 'Mensaje marcado como leído.');
    }

    public function marcarNoLeido($id)
    {
        $mensajeModel = new \App\Models\Mensaje_Model();
        $mensajeModel->update($id, ['estado_mensaje' => 0]);

        return redirect()->back()->with('mensaje', 'Mensaje marcado como no leído.');
    }
}
