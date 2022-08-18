<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AtmLokasi extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_atm_lokasi' => [
                'type' => 'int',
                'auto_increment' => true,
                'constraint' => '11'
            ],
            'kd_client_region_3' => [
                'type' => 'varchar',
                'constraint' => '50'
            ],
            'kd_pengelola_region_3' => [
                'type' => 'varchar',
                'constraint' => '50'
            ],
            'id_atm_kategori' => [
                'type' => 'int',
                'constraint' => '11',
                'unsigned' => TRUE,
            ],
            'id_atm_subkategori' => [
                'type' => 'int',
                'constraint' => '11',
                'unsigned' => TRUE,
            ],
            'id_atm_ring' => [
                'type' => 'int',
                'constraint' => '11',
                'unsigned' => TRUE,
            ],
            'nama_atm_lokasi' => [
                'type' => 'varchar',
                'constraint' => '255'
            ],
            'alamat_atm_lokasi' => [
                'type' => 'text',
            ],
            'lat_atm_lokasi' => [
                'type' => 'float',
                'constraint' => '10.6'

            ],
            'lng_atm_lokasi' => [
                'type' => 'float',
                'constraint' => '10.6'
            ],
            'created_atm_lokasi' => [
                'type' => 'datetime',
            ],
            'updated_atm_lokasi' => [
                'type' => 'datetime',
            ],
            'deleted_atm_lokasi' => [
                'type' => 'datetime',
            ]
        ]);

        $this->forge->addPrimaryKey('id_atm_lokasi');
        $this->forge->addForeignKey('kd_client_region_3', 'client_region_3', 'kd_client_region_3');
        $this->forge->addForeignKey('kd_pengelola_region_3', 'pengelola_region_3', 'kd_pengelola_region_3');
        $this->forge->addForeignKey('id_atm_kategori', 'atm_kategori', 'id_atm_kategori');
        $this->forge->addForeignKey('id_atm_subkategori', 'atm_subkategori', 'id_atm_subkategori');
        $this->forge->addForeignKey('id_atm_ring', 'atm_ring', 'id_atm_ring');

        $this->forge->createTable('atm_lokasi');
    }

    public function down()
    {
        $this->forge->dropTable('atm_lokasi');
    }
}
