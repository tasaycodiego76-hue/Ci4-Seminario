<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ClienteModel;
use CodeIgniter\HTTP\RedirectResponse;

class Cliente extends BaseController
{

    /**
     * Este meotod retorna la vista con los datos clientes
     * @return string
     */
    public function index(): string
    {
        $cliente = new ClienteModel();
        $data = [

            //$data es toda informacion que enviaremos a la vista
            'header' => view(name: 'Partials/header'),
            'clientes' => $cliente->findAll(),
            'footer' => view(name: 'Partials/footer'),
        ];

        return view("Modulos/clientes/index", $data);
    }

    /**
     * Retorna la vista para el registro de clientes
     * @return string
     */
    public function create(): string
    {

        $data = [
            'header' => view(name: 'Partials/header'),
            'footer' => view(name: 'Partials/footer'),
        ];

        return view('Modulos/clientes/registrar', $data);
    }

    /**
     * Retorna la vista para actualizar los datos de un cliente
     * @param int|null $id
     * @return string
     */

public function buscar(int $id = null)
{
    $cliente = new ClienteModel();
    $registro = $cliente->find($id);

    $data = [
        'header'   => view(name: 'Partials/header'),
        'registro' => $registro,
        'footer'   => view(name: 'Partials/footer'),
    ];

    return view('Modulos/clientes/actualizar', $data);
}

/**
 * Actualiza los datos de un cliente
 * @return RedirectResponse
 */
public function actualizar(): RedirectResponse
{
    $cliente = new ClienteModel();

    $cliente->update($this->request->getPost('idcliente'), [
        'apellidos' => $this->request->getPost('apellidos'),
        'nombres'   => $this->request->getPost('nombres'),
        'dni'       => $this->request->getPost('dni'),
        'telefono'  => $this->request->getPost('telefono'),
    ]);

    return redirect()->to('/clientes');
}


    /**
     * Almacena los datos en la tabla clientes
     * @return RedirectResponse
     */


    public function registrarCliente()
    {
        $cliente = new ClienteModel();

        $apellidos = $this->request->getPost('apellidos');
        $nombres = $this->request->getPost('nombres');
        $dni = $this->request->getPost('dni');
        $telefono = $this->request->getPost('telefono');

        $cliente->insert([
            'apellidos' => $apellidos,
            'nombres' => $nombres,
            'dni' => $dni,
            'telefono' => $telefono
        ]);

        return redirect()->to('/clientes');
    }

    /**
     * Summary of eliminar
     * @param mixed $id
     * @return RedirectResponse
     */
    public function eliminar($id = null)
    {
        $cliente = new ClienteModel();
        $cliente->delete($id);
        return redirect()->to('/clientes');
    }
}