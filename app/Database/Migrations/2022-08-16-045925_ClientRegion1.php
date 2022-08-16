<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class ClientRegion1 extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'kd_client_region_1' => [
                'type' => 'varchar',
                'constraint' => '50'
            ],
            'kd_client' => [
                'type' => 'varchar',
                'constraint' => '50'
            ],
            'nama_client_region_1' => [
                'type' => 'varchar',
                'constraint' => '255'
            ],
            'telegram_client_region_1' => [
                'type' => 'varchar',
                'constraint' => '255'
            ],
            'noted_client_region_1' => [
                'type' => 'text',
            ],
            'created_client_region_1' => [
                'type' => 'datetime',
            ],
            'updated_client_region_1' => [
                'type' => 'datetime',
            ],
            'deleted_client_region_1' => [
                'type' => 'datetime',
            ]
        ]);

        $this->forge->addPrimaryKey('kd_client_region_1');
        $this->forge->addForeignKey('kd_client', 'client', 'kd_client');

        $this->forge->createTable('client_region_1');
    }

    public function down()
    {
        $this->forge->dropTable('client_region_1');
    }
}
