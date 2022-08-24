<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class KunjunganAttach extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_kunjungan_attach' => [
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
            'petugas_kunjungan_attach' => [
                'type' => 'varchar',
                'constraint' => '50',
            ],
            'tgl_kunjungan_attach' => [
                'type' => 'date',
            ],
            'status_kunjungan_attach' => [
                'type' => 'enum',
                'constraint' => ['process', 'clean', 'passed'],
            ],
            'noted_kunjungan_attach' => [
                'type' => 'text',
            ],
            'created_kunjungan_attach' => [
                'type' => 'datetime',
            ],
            'updated_kunjungan_attach' => [
                'type' => 'datetime',
            ],
            'deleted_kunjungan_attach' => [
                'type' => 'datetime',
            ]
        ]);

        $this->forge->addPrimaryKey('id_kunjungan_attach');
        $this->forge->addForeignKey('id_atm_kunjungan', 'atm_kunjungan', 'id_atm_kunjungan');
        $this->forge->addForeignKey('id_atm_lokasi', 'atm_lokasi', 'id_atm_lokasi');


        $this->forge->createTable('kunjungan_attach');
    }

    public function down()
    {
        $this->forge->dropTable('kunjungan_attach');
    }
}
