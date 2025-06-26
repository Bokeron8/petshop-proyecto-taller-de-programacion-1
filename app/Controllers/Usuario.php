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
      'email_login' => [
        'label' => 'Correo electrónico',
        'rules' => 'required|valid_email',
        'errors' => [
          'required' => 'El {field} es obligatorio.',
          'valid_email' => 'El {field} no es válido.'
        ]
      ],
      'password_login' => [
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
      'email' => $this->request->getPost('email_login'),
      'password' => $this->request->getPost('password_login'),
    ];

    $user = $model->where('email_usuario', $data['email'])->first();

    if (!$user || !password_verify($data['password'], $user['contraseña_usuario'])) {
      // Agregar error manualmente
      $validation->setError('password_login', 'Email o contraseña incorrectos.');

      return redirect()->back()
        ->withInput()
        ->with('validation', $validation);
    }
    elseif($user['estado_usuario'] == 0){
      return redirect()->to('login')
                ->with('error', 'Tu cuenta ha sido suspendida');
    }

    $session = session();
    $session->set('usuario', [
      'id_usuario' => $user['id_usuario'],
      'nombre_usuario' => $user['nombre_usuario'],
      'apellido_usuario' => $user['apellido_usuario'],
      'perfil_id' => $user['perfil_id'],
      'email_usuario' => $user['email_usuario'],
      'estado_usuario' => $user['estado_usuario']
    ]);


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

  public function logout()
  {
    session()->destroy();
    return redirect()->to('/');
  }

  public function listarUsuarios()
  {
      $estado = $this->request->getGet('estado');
      $usuarioModel = new \App\Models\Usuarios_Model();

      $builder = $usuarioModel->select('usuarios.*, perfiles.descripcion_perfil')
          ->join('perfiles', 'usuarios.perfil_id = perfiles.id_perfil', 'left');

      if ($estado !== null && $estado !== '') {
          $builder->where('usuarios.estado_usuario', $estado);
      }

      $data = [
          'usuarios' => $builder->findAll(),
          'estadoFiltro' => $estado ?? '',
          'title' => 'Usuarios - Ful Animal'
      ];

      return view('Backend/listar_usuarios_view', $data);
  }

  public function eliminarUsuario($id)
  {
      $usuarioModel = new \App\Models\Usuarios_Model();

      $usuario = $usuarioModel->find($id);

      if ($usuario) {
          $usuarioModel->update($id, ['estado_usuario' => 0]); // Baja lógica
          return redirect()->back()->with('success', 'Usuario eliminado correctamente.');
      }

      return redirect()->back()->with('error', 'Usuario no encontrado.');
  }

  public function activarUsuario($id)
  {
      $usuarioModel = new \App\Models\Usuarios_Model();

      $usuario = $usuarioModel->find($id);

      if ($usuario) {
          $usuarioModel->update($id, ['estado_usuario' => 1]); // Subida lógica
          return redirect()->back()->with('success', 'Usuario activado correctamente.');
      }

      return redirect()->back()->with('error', 'Usuario no encontrado.');
  }


}