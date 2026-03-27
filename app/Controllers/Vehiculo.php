<?php

namespace App\Controllers;
use App\Controllers\BaseController;

class Vehiculo extends BaseController
{

    //retorna la vista para administrar vehiculos

    public function index()
    {
        $data = [
            'header' => view(name: 'Partials/header'),
            'footer' => view(name: 'Partials/footer'),
        ];
        return view("Modulos/vehiculos/index", $data);
    }
}

?>