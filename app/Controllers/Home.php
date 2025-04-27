<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Full animal',
        ];
        return view('contenidos/inicio_view.php', $data);
    }

    public function quienes_somos()
    {
        $data = [
            'title' => 'Quienes somos - Full animal',
        ];
        return view('contenidos/quienes_somos_view', $data);
    }

    public function comercializacion()
    {
        $data = [
            'title' => 'Comercializacion - Full animal',
        ];
        return view('contenidos/comercializacion_view', $data);
    }

    public function contacto()
    {
        $data = [
            'title' => 'Contacto - Full animal',
        ];
        return view('contenidos/contactos_view', $data);
    }

    public function terminos()
    {
        $data = [
            'title' => 'Términos y Usos - Full animal',
        ];
        return view('contenidos/terminos_view', $data);
    }
}