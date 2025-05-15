<?php

namespace App\Controllers;

use App\Models\Usuarios_Model;

class Usuario extends BaseController
{
  public function login()
  {
    $model = new Usuarios_Model();

    // Obtener datos POST
    $data = [
      'email' => $this->request->getPost('email'),
      'password'  => $this->request->getPost('password'),
    ];

    // Insertar en la base de datos
    $user = $model->where('email_usuario', $data['email'])->first();
    if ($user['contraseña_usuario'] == $data['password']) {
      return redirect()->to('/')->with('success', 'Mensaje enviado correctamente.');
    } else {
      return redirect()->back()->with('error', 'Hubo un error al enviar el mensaje.');
    }
  }

  public function register()
  {
    $model = new Usuarios_Model();

    // Obtener datos POST
    $data = [
      'nombre_usuario' => $this->request->getPost('name'),
      'apellido_usuario' => $this->request->getPost('surname'),

      'email_usuario' => $this->request->getPost('email'),
      'contraseña_usuario'  => $this->request->getPost('password'),
      'perfil_id' => 1,
    ];


    $user = $model->where('email_usuario', $data['email_usuario'])->first();

    if ($user) {
      return redirect()->back()->with('error', 'Ese correo ya esta en uso.');
    } else {
      if ($model->insert($data)) {
        return redirect()->to('/')->with('success', 'Mensaje enviado correctamente.');
      }
    }
  }
}