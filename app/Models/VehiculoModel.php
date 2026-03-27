<?php

namespace App\Models;
use CodeIgniter\Model;
class VehiculoModel extends Model
{

    protected $table = "vehiculos";
    protected $primaryKey = "id";
    protected $returnType = "array";
    protected $allowedFields = ["idmarca", "modelo", "anio", "color", "precio"];

    //Campos de auditoria => ¿cunado se creó?, ¿cuando se modificó?
    protected $useTimestamps = true;
    protected $createdField = "create_at"; //Campo tabla vehiculos
    protected $updatedField = "update_at"; //Campo tabla vehiculos

    //Metodos integrados;
    //findAll()  :Obtener todos los registros
    //find()     :Obtener un registro
    //insert()   :agregar un nuevo registro
    //delete()   :eliminacion fisica registro
    //update()   :actualización

    //¿Y que sucede si necsito un método personalizado? Ejemplo: CONSULTA MULTITABLA
    //QUERY BUILDER = Constructor de consultas
    public function obtenerVehiculos()
    {
        return $this->select("vehiculos.*, marcas.marca")
            ->join("marcas", "marcas.id = vehiculos.idmarca")
            ->findAll();
    }
    public function obtenerVehiculoSQL(){

    $sql = "
    SELECT
    vehiculos.*,
    marcas.marca
    FROM vehiculos
    INNER JOIN marcas ON marcas.id = vehiculos.idmarca    
    ";
    return $this->db->query($sql)->getResultArray();
    }
}