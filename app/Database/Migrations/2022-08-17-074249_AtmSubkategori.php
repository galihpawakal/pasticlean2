<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AtmSubkategori extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_atm_subkategori' => [
                'type' => 'int',
                'constraint' => '11',
                'auto_increment' => true,
                'unsigned' => TRUE,
            ],
            'nama_atm_subkategori' => [
                'type' => 'varchar',
                'constraint' => '255'
            ],
            'noted_atm_subkategori' => [
                'type' => 'text',
            ],
            'created_atm_subkategori' => [
                'type' => 'datetime',
            ],
            'updated_atm_subkategori' => [
                'type' => 'datetime',
            ],
            'deleted_atm_subkategori' => [
                'type' => 'datetime',
            ]
        ]);

        $this->forge->addPrimaryKey('id_atm_subkategori');
        // $this->forge->addForeignKey('kd_atm_subkategori', 'atm_subkategori', 'kd_atm_subkategori');

        $this->forge->createTable('atm_subkategori');
    }

    public function down()
    {
        $this->forge->dropTable('atm_subkategori');
    }
}
