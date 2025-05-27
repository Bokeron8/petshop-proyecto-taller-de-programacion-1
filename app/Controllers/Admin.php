<?php

namespace App\Controllers;

class Admin extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Panel Admin - Full animal',
        ];
        return view('contenidos/inicio_view.php', $data);
    }

    public function gestionar_producto()
    {
        $data = [
            'title' => 'Gestionar productos - Full animal',
        ];
        return view('Backend/gestionar_view.php', $data);
    }
}