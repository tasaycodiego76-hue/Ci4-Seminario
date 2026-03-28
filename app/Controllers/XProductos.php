<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ProductoModel;

class XProductos extends BaseController 
{
    public function index()
    {
        $data = [
            'header' => view('Partials/header'),
            'footer' => view('Partials/footer'),
        ];
        return view("Modulos/XProductos/index", $data); 
    }
    public function getProductos()
    {
        $producto = new ProductoModel();
        return $this->response->setJSON($producto->findAll());
    }

    public function registrarProducto()
    {
        $producto = new ProductoModel();
        $data = $this->request->getJSON();

        if ($producto->insert($data)) {
            return $this->response->setJSON([
                "success" => true,
                "message" => "Producto registrado correctamente"
            ]);
        }

        return $this->response->setJSON([
            "success" => false,
            "message" => "Error al registrar producto"
        ]);
    }
}