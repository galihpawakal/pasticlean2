<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class KunjunganChecklist extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_kunjungan_checklist' => [
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
            'id_checklist' => [
                'type' => 'int',
                'unsigned' => TRUE,
                'constraint' => '11',
            ],
            'status_kunjungan_checklist' => [
                'type' => 'enum',
                'constraint' => ['yes', 'no'],
            ],
            'foto_kunjungan_checklist' => [
                'type' => 'varchar',
                'constraint' => '50',
            ],
            'noted_kunjungan_checklist' => [
                'type' => 'text',
            ],
            'created_kunjungan_checklist' => [
                'type' => 'datetime',
            ],
            'updated_kunjungan_checklist' => [
                'type' => 'datetime',
            ],
            'deleted_kunjungan_checklist' => [
                'type' => 'datetime',
            ]
        ]);

        $this->forge->addPrimaryKey('id_kunjungan_checklist');
        $this->forge->addForeignKey('id_kunjungan', 'kunjungan', 'id_kunjungan');
        $this->forge->addForeignKey('id_checklist', 'checklist', 'id_checklist');


        $this->forge->createTable('kunjungan_checklist');
    }

    public function down()
    {
        $this->forge->dropTable('kunjungan_checklist');
    }
}
