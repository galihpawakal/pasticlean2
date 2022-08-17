<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AtmRing extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_atm_ring' => [
                'type' => 'int',
                'constraint' => '11',
                'auto_increment' => true,
                'unsigned' => TRUE,
            ],
            'nama_atm_ring' => [
                'type' => 'varchar',
                'constraint' => '255'
            ],
            'periode_atm_ring' => [
                'type' => 'enum',
                'constraint' => ['harian', 'mingguan', 'bulanan']
            ],
            'noted_atm_ring' => [
                'type' => 'text',
            ],
            'created_atm_ring' => [
                'type' => 'datetime',
            ],
            'updated_atm_ring' => [
                'type' => 'datetime',
            ],
            'deleted_atm_ring' => [
                'type' => 'datetime',
            ]
        ]);

        $this->forge->addPrimaryKey('id_atm_ring');
        // $this->forge->addForeignKey('kd_atm_ring', 'atm_atm_ring', 'kd_atm_ring');

        $this->forge->createTable('atm_ring');
    }

    public function down()
    {
        $this->forge->dropTable('atm_ring');
    }
}
