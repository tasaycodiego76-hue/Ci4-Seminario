<?php
namespace App\Controllers;
use App\Controllers\BaseController;
use App\Models\MarcaModel;
use CodeIgniter\HTTP\RedirectResponse;

class Marca extends BaseController
{
    public function getMarcas()
    {
        $marca = new MarcaModel();
        return $this->response->setJSON($marca->findAll());
    }
}