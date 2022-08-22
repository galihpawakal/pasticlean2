<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Kunjungan extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_kunjungan' => [
                'type' => 'int',
                'unsigned' => TRUE,
                'auto_increment' => true,
                'constraint' => '11',
            ],
            'id_atm_kunjungan' => [
                'type' => 'int',
                'unsigned' => TRUE,
                'constraint' => '11',
            ],
            'id_atm_lokasi' => [
                'type' => 'int',
                'unsigned' => TRUE,
                'constraint' => '11',
            ],
            'petugas_kunjungan' => [
                'type' => 'varchar',
                'constraint' => '50',
            ],
            'tgl_kunjungan' => [
                'type' => 'date',
            ],
            'status_kunjungan' => [
                'type' => 'enum',
                'constraint' => ['process', 'clean', 'passed'],
            ],
            'noted_kunjungan' => [
                'type' => 'text',
            ],
            'created_kunjungan' => [
                'type' => 'datetime',
            ],
            'updated_kunjungan' => [
                'type' => 'datetime',
            ],
            'deleted_kunjungan' => [
                'type' => 'datetime',
            ]
        ]);

        $this->forge->addPrimaryKey('id_kunjungan');
        $this->forge->addForeignKey('id_atm_kunjungan', 'atm_kunjungan', 'id_atm_kunjungan');
        $this->forge->addForeignKey('id_atm_lokasi', 'atm_lokasi', 'id_atm_lokasi');


        $this->forge->createTable('kunjungan');
    }

    public function down()
    {
        $this->forge->dropTable('kunjungan');
    }
}
