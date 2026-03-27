<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class MarcasSeeder extends Seeder
{
    public function run()
    {
        //Variables - constantes
        $now = date("Y-m-d H:i:s");

        //Arreglo con los datos semilla
        $data =[
            ["marca"=>"Toyota", "create_at"=>$now],
            ["marca"=>"Honda", "create_at"=>$now],
            ["marca"=>"Ford", "create_at"=>$now],
            ["marca"=>"Chevrolet", "create_at"=>$now],
            ["marca"=>"Nissan", "create_at"=>$now],
            ["marca"=>"Kia", "create_at"=>$now],
            ["marca"=>"Hyundai", "create_at"=>$now]

        ];

        //Enviar los datos a la tabla
        $this->db->table("marcas")->insertBatch($data);
    }
}
