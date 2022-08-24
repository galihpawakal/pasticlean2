<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class KunjunganSnapshoot extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_kunjungan_snapshoot' => [
                'type' => 'int',
                'unsigned' => TRUE,
                'auto_increment' => true,
                'constraint' => '11',
            ],
            'id_kunjungan' => [
                'type' => 'int',
                'unsigned' => TRUE,
                'constraint' => '11',
            ],
            'id_snapshoot' => [
                'type' => 'int',
                'unsigned' => TRUE,
                'constraint' => '11',
            ],
            'foto_kunjungan_snapshoot' => [
                'type' => 'varchar',
                'constraint' => '50',
            ],
            'noted_kunjungan_snapshoot' => [
                'type' => 'text',
            ],
            'created_kunjungan_snapshoot' => [
                'type' => 'datetime',
            ],
            'updated_kunjungan_snapshoot' => [
                'type' => 'datetime',
            ],
            'deleted_kunjungan_snapshoot' => [
                'type' => 'datetime',
            ]
        ]);

        $this->forge->addPrimaryKey('id_kunjungan_snapshoot');
        $this->forge->addForeignKey('id_kunjungan', 'kunjungan', 'id_kunjungan');
        $this->forge->addForeignKey('id_snapshoot', 'snapshoot', 'id_snapshoot');


        $this->forge->createTable('kunjungan_snapshoot');
    }

    public function down()
    {
        $this->forge->dropTable('kunjungan_snapshoot');
    }
}
