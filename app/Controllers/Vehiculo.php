<?php

namespace App\Controllers;
use App\Controllers\BaseController;
use App\Models\VehiculoModel;

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

    //El controlador "Servirá" resultados asincronos, por lo tanto se requiere:
    //1. Codigo servidor  https://developer.mozilla.org/es/docs/Web/HTTP/Reference/Status 
    //2. Reultado en formato JSON
    public function getVehiculos()
    {
        //Se requiere el modelo
        $vehiculo = new VehiculoModel();
        return $this->response->setJSON($vehiculo->obtenerVehiculos());
    }
}

?>