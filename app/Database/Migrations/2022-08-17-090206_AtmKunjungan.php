<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AtmKunjungan extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_atm_kunjungan' => [
                'type' => 'int',
                'constraint' => '11',
                'auto_increment' => true,
                'unsigned' => TRUE,
            ],
            'id_atm_ring' => [
                'type' => 'int',
                'constraint' => '11',
                'unsigned' => TRUE,
            ],
            'nama_atm_kunjungan' => [
                'type' => 'varchar',
                'constraint' => '255'
            ],
            'noted_atm_kunjungan' => [
                'type' => 'text',
            ],
            'created_atm_kunjungan' => [
                'type' => 'datetime',
            ],
            'updated_atm_kunjungan' => [
                'type' => 'datetime',
            ],
            'deleted_atm_kunjungan' => [
                'type' => 'datetime',
            ]
        ]);

        $this->forge->addPrimaryKey('id_atm_kunjungan');
        $this->forge->addForeignKey('id_atm_ring', 'atm_ring', 'id_atm_ring');

        $this->forge->createTable('atm_kunjungan');
    }

    public function down()
    {
        $this->forge->dropTable('atm_kunjungan');
    }
}
