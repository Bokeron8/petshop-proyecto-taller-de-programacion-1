<?php

namespace App\Controllers;

use App\Models\Producto_Model;
use App\Models\Categoria_Model;
use App\Models\Subcategoria_Model;
use App\Models\Marca_Model;

class ProductoController extends BaseController
{
    public function form_gestionar_producto()
    {
        $categoriaModel = new Categoria_Model();
        $subcategoriaModel = new Subcategoria_Model();
        $marcaModel = new Marca_Model();

        // Obtener los datos como array asociativo para el dropdown
        $categorias = $categoriaModel->findAll();
        $subcategorias = $subcategoriaModel->findAll();
        $marcas = $marcaModel->findAll();

        // Armar opciones para el dropdown
        $opcionesCategorias = ['0' => 'Seleccionar categoría'];
        foreach ($categorias as $cat) {
            $opcionesCategorias[$cat['id_categoria']] = $cat['descripcion_categoria'];
        }

        $opcionesSubcategorias = ['0' => 'Seleccionar subcategoría'];
        foreach ($subcategorias as $sub) {
            $opcionesSubcategorias[$sub['id_subcategoria']] = $sub['descripcion_subcategoria'];
        }

        $opcionesMarcas = ['0' => 'Seleccionar marca'];
        foreach ($marcas as $marca) {
            $opcionesMarcas[$marca['id_marca']] = $marca['descripcion_marca'];
        }

        // Pasar los datos a la vista
        return view('Backend/gestionar_view', [
        'categorias' => $opcionesCategorias,
        'subcategorias' => $opcionesSubcategorias,
        'marcas' => $opcionesMarcas,
        'title' => 'Gestion-Productos'
        ]);

    }

    public function registrarProducto()
    {
        $validation = \Config\Services::validation();
        $request = \Config\Services::request();

        $model = new Producto_Model();


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