<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AtmAudit extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_atm_audit' => [
                'type' => 'int',
                'unsigned' => TRUE,
                'auto_increment' => true,
                'constraint' => '11',
            ],
            'id_atm_lokasi' => [
                'type' => 'int',
                'unsigned' => TRUE,
                'constraint' => '11',
            ],
            'pelapor_atm_audit' => [
                'type' => 'varchar',
                'constraint' => '50',
            ],
            'foto_atm_audit' => [
                'type' => 'varchar',
                'constraint' => '50',
            ],
            'status_atm_audit' => [
                'type' => 'enum',
                'constraint' => ['created', 'process', 'success', 'passed'],
            ],
            'noted_atm_audit' => [
                'type' => 'text',
            ],
            'created_atm_audit' => [
                'type' => 'datetime',
            ],
            'updated_atm_audit' => [
                'type' => 'datetime',
            ],
            'deleted_atm_audit' => [
                'type' => 'datetime',
            ]
        ]);

        $this->forge->addPrimaryKey('id_atm_audit');
        $this->forge->addForeignKey('id_atm_lokasi', 'atm_lokasi', 'id_atm_lokasi');


        $this->forge->createTable('atm_audit');
    }

    public function down()
    {
        $this->forge->dropTable('atm_audit');
    }
}
