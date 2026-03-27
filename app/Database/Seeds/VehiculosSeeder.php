<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class VehiculosSeeder extends Seeder
{
    public function run()
    {
        $now = date("Y-m-d H:i:s");

        $data = [
            ["idmarca" => 1, "modelo" => "Hilux", "anio" => "2022", "color" => "Blanco", "precio" => 10000, "create_at" => $now],
            ["idmarca" => 2, "modelo" => "Honda", "anio" => "2025", "color" => "Negro", "precio" => 50000, "create_at" => $now],
            ["idmarca" => 3, "modelo" => "Sportage", "anio" => "2023", "color" => "Gris", "precio" => 120000, "create_at" => $now]
        ];
        $this->db->table("vehiculos")->insertBatch($data);
    }
}
