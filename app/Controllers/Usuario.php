<?php

namespace App\Controllers;

use App\Models\Usuarios_Model;

class Usuario extends BaseController
{
  public function login()
  {
    $validation = \Config\Services::validation();
    $model = new Usuarios_Model();

    $rules = [
      'email' => [
        'label' => 'Correo electrónico',
        'rules' => 'required|valid_email',
        'errors' => [
          'required' => 'El {field} es obligatorio.',
          'valid_email' => 'El {field} no es válido.'
        ]
      ],
      'password' => [
        'label' => 'Contraseña',
        'rules' => 'required|min_length[6]',
        'errors' => [
          'required' => 'La {field} es obligatoria.',
          'min_length' => 'La {field} debe tener al menos {param} caracteres.'
        ]
      ]
    ];

    if (!$this->validate($rules)) {
      return redirect()->back()
        ->withInput()
        ->with('validation', $this->validator);
    }

    $data = [
      'email' => $this->request->getPost('email'),
      'password' => $this->request->getPost('password'),
    ];

    $user = $model->where('email_usuario', $data['email'])->first();

    if (!$user || !password_verify($data['password'], $user['contraseña_usuario'])) {
      // Agregar error manualmente
      $validation->setError('password', 'Email o contraseña incorrectos.');

      return redirect()->back()
        ->withInput()
        ->with('validation', $validation);
    }


    return redirect()->to('/')->with('success', 'Inicio de sesión exitoso.');
  }
  public function register()
  {
    $model = new Usuarios_Model();

    $rules = [
      'name' => [
        'label' => 'Nombre',
        'rules' => 'required|alpha_space|min_length[2]|max_length[50]',
        'errors' => [
          'required' => 'El {field} es obligatorio.',
          'alpha_space' => 'El {field} solo debe contener letras y espacios.',
          'min_length' => 'El {field} debe tener al menos {param} caracteres.',
          'max_length' => 'El {field} no debe exceder los {param} caracteres.'
        ]
      ],
      'surname' => [
        'label' => 'Apellido',
        'rules' => 'required|alpha_space|min_length[2]|max_length[50]',
        'errors' => [
          'required' => 'El {field} es obligatorio.',
          'alpha_space' => 'El {field} solo debe contener letras y espacios.',
          'min_length' => 'El {field} debe tener al menos {param} caracteres.',
          'max_length' => 'El {field} no debe exceder los {param} caracteres.'
        ]
      ],
      'email' => [
        'label' => 'Correo electrónico',
        'rules' => 'required|valid_email|is_unique[usuarios.email_usuario]',
        'errors' => [
          'required' => 'El {field} es obligatorio.',
          'valid_email' => 'El {field} no es válido.',
          'is_unique' => 'Ya existe un usuario registrado con ese {field}.'
        ]
      ],
      'password' => [
        'label' => 'Contraseña',
        'rules' => 'required|min_length[6]',
        'errors' => [
          'required' => 'La {field} es obligatoria.',
          'min_length' => 'La {field} debe tener al menos {param} caracteres.'
        ]
      ],
      'repeatPasswordInput' => [
        'label' => 'Confirmación de contraseña',
        'rules' => 'required|matches[password]',
        'errors' => [
          'required' => 'Debe repetir contraseña.',
          'matches' => 'Las contraseñas no coinciden.'
        ]
      ]
    ];

    if (!$this->validate($rules)) {
      return redirect()->back()
        ->withInput()
        ->with('validation', $this->validator)
        ->with('registering', true);
    }

    $data = [
      'nombre_usuario' => $this->request->getPost('name'),
      'apellido_usuario' => $this->request->getPost('surname'),
      'email_usuario' => $this->request->getPost('email'),
      'contraseña_usuario' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
      'perfil_id' => 1,
      'estado_usuario' => 1,
    ];

    if ($model->insert($data)) {
      return redirect()->to('/login')->with('success', 'Usuario registrado correctamente.');
    }

    return redirect()->back()->withInput()->with('error', 'Error al registrar el usuario.');
  }
}