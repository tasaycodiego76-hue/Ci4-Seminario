<?php
namespace App\Controllers;
use App\Controllers\BaseController;
use App\Models\MarcaModel;
use CodeIgniter\HTTP\RedirectResponse;

class Vehiculo extends BaseController
{
    public function getMarcas()
    {
        $marca = new MarcaModel();
        return $this->response->setJSON($marca->findAll());
    }
}