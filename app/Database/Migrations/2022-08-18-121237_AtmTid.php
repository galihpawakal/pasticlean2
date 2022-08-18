<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AtmTid extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_atm_tid' => [
                'type' => 'int',
                'auto_increment' => true,
                'constraint' => '11',
                'unsigned' => TRUE,
            ],
            'id_atm_lokasi' => [
                'type' => 'int',
                'constraint' => '11',
            ],
            'noted_atm_tid' => [
                'type' => 'text',
            ],
            'created_atm_tid' => [
                'type' => 'datetime',
            ],
            'updated_atm_tid' => [
                'type' => 'datetime',
            ],
            'deleted_atm_tid' => [
                'type' => 'datetime',
            ]
        ]);

        $this->forge->addPrimaryKey('id_atm_tid');
        $this->forge->addForeignKey('id_atm_lokasi', 'atm_lokasi', 'id_atm_lokasi');

        $this->forge->createTable('atm_tid');
    }

    public function down()
    {
        $this->forge->dropTable('atm_tid');
    }
}
