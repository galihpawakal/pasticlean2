<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AtmProblem extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_atm_problem' => [
                'type' => 'int',
                'unsigned' => TRUE,
                'auto_increment' => true,
                'constraint' => '11',
            ],
            'id_atm_lokasi' => [
                'type' => 'int',
                'unsigned' => TRUE,
                'constraint' => '11',
            ],
            'pelapor_atm_problem' => [
                'type' => 'varchar',
                'constraint' => '50',
            ],
            'foto_atm_problem' => [
                'type' => 'varchar',
                'constraint' => '50',
            ],
            'status_atm_problem' => [
                'type' => 'enum',
                'constraint' => ['created', 'process', 'success', 'passed'],
            ],
            'noted_atm_problem' => [
                'type' => 'text',
            ],
            'created_atm_problem' => [
                'type' => 'datetime',
            ],
            'updated_atm_problem' => [
                'type' => 'datetime',
            ],
            'deleted_atm_problem' => [
                'type' => 'datetime',
            ]
        ]);

        $this->forge->addPrimaryKey('id_atm_problem');
        $this->forge->addForeignKey('id_atm_lokasi', 'atm_lokasi', 'id_atm_lokasi');


        $this->forge->createTable('atm_problem');
    }

    public function down()
    {
        $this->forge->dropTable('atm_problem');
    }
}
