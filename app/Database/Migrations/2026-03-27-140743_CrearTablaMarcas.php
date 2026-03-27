<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CrearTablaMarcas extends Migration
{
    public function up()
    {
        //Campos se definen
        $this->forge->addField([
            "id" => [
                "type" => "INT",
                "constraint" => 11,
                "unsigned" => true,
                "auto_increment" => true,
            ],
            "marca" => [
                "type" => "VARCHAR",
                "constraint" => 50,
                "null" => false,
            ],
            "create_at" => [
                "type" => "DATETIME",
                "null" => true,
            ],
            "update_at" => [
                "type" => "DATETIME",
                "null" => true,
            ]
        ]);

        //Se Definen las restricciones
        $this->forge->addPrimaryKey("id");
        $this->forge->addUniqueKey("marca");

        //Se construye las tablas
        $this->forge->createTable("marcas");
    }

    public function down()
    {
        $this->forge->dropTable("marcas");
    }
}