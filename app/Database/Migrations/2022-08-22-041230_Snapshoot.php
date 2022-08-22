<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Snapshoot extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_snapshoot' => [
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
            'nama_snapshoot' => [
                'type' => 'varchar',
                'constraint' => '50',
            ],
            'noted_snapshoot' => [
                'type' => 'text',
            ],
            'created_snapshoot' => [
                'type' => 'datetime',
            ],
            'updated_snapshoot' => [
                'type' => 'datetime',
            ],
            'deleted_snapshoot' => [
                'type' => 'datetime',
            ]
        ]);

        $this->forge->addPrimaryKey('id_snapshoot');
        $this->forge->addForeignKey('id_atm_kunjungan', 'atm_kunjungan', 'id_atm_kunjungan');

        $this->forge->createTable('snapshoot');
    }

    public function down()
    {
        $this->forge->dropTable('snapshoot');
    }
}
