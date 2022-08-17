<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AtmKategori extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_atm_kategori' => [
                'type' => 'int',
                'auto_increment' => true,
                'constraint' => '11',
                'unsigned' => TRUE,
            ],
            'nama_atm_kategori' => [
                'type' => 'varchar',
                'constraint' => '255'
            ],
            'noted_atm_kategori' => [
                'type' => 'text',
            ],
            'created_atm_kategori' => [
                'type' => 'datetime',
            ],
            'updated_atm_kategori' => [
                'type' => 'datetime',
            ],
            'deleted_atm_kategori' => [
                'type' => 'datetime',
            ]
        ]);

        $this->forge->addPrimaryKey('id_atm_kategori');
        // $this->forge->addForeignKey('kd_atm_kategori', 'atm_kategori', 'kd_atm_kategori');

        $this->forge->createTable('atm_kategori');
    }

    public function down()
    {
        $this->forge->dropTable('atm_kategori');
    }
}
