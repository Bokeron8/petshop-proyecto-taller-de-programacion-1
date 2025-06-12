<?php

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

class AdminFilter implements FilterInterface
{

    public function before(RequestInterface $request, $arguments = null)
    {

        $usuario = session()->get('usuario');
        // Verificar si el usuario tiene rol de administrador
        if ($usuario['perfil_id'] != 2) {
            return redirect()->to('/')
                ->with('error', 'No tienes permisos de administrador');
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // No necesitamos hacer nada después de la ejecución del controlador
    }
}