<?php

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

class AuthFilter implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {

        $usuario = session()->get('usuario');
        if (!$usuario) {
            return redirect()->to('login')
                ->with('error', 'Por favor inicia sesión primero');
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // No es necesario hacer nada después
    }
}