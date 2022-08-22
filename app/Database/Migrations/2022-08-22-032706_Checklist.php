<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Checklist extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_checklist' => [
                'type' => 'int',
                'auto_increment' => true,
                'constraint' => '11',
                'unsigned' => TRUE,
            ],
            'id_atm_kunjungan' => [
                'type' => 'int',
                'constraint' => '11',
                'unsigned' => TRUE,
            ],
            'nama_checklist' => [
                'type' => 'varchar',
                'constraint' => '50'
            ],
            'status_foto_checklist' => [
                'type' => 'enum',
                'constraint' => ['yes', 'no']
            ],
            'noted_checklist' => [
                'type' => 'text',
            ],
            'created_checklist' => [
                'type' => 'datetime',
            ],
            'updated_checklist' => [
                'type' => 'datetime',
            ],
            'deleted_checklist' => [
                'type' => 'datetime',
            ]
        ]);

        $this->forge->addPrimaryKey('id_checklist');
        $this->forge->addForeignKey('id_atm_kunjungan', 'atm_kunjungan', 'id_atm_kunjungan');

        $this->forge->createTable('checklist');
    }

    public function down()
    {
        $this->forge->dropTable('checklist');
    }
}
