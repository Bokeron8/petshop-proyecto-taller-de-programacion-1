<?php

namespace App\Controllers;


use App\Models\Categoria_Model;

class CategoriaController extends BaseController
{


    public function obtener_categoria()
    {
        $model = new Categoria_Model();

        $lista_categorias = $model->findAll();

        $categorias = [0 => 'Seleccione una categoria'];

        foreach ($lista_categorias as $categoria) {
            $categorias[$categoria['id_categoria']] = $categoria['descripcion_categoria'];
        }

        return $categorias;
    }
}