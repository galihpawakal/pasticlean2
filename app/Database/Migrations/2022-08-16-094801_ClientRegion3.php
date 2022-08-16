<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class ClientRegion3 extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'kd_client_region_3' => [
                'type' => 'varchar',
                'constraint' => '50'
            ],
            'kd_client_region_2' => [
                'type' => 'varchar',
                'constraint' => '50'
            ],
            'nama_client_region_3' => [
                'type' => 'varchar',
                'constraint' => '255'
            ],
            'telegram_client_region_3' => [
                'type' => 'varchar',
                'constraint' => '255'
            ],
            'noted_client_region_3' => [
                'type' => 'text',
            ],
            'created_client_region_3' => [
                'type' => 'datetime',
            ],
            'updated_client_region_3' => [
                'type' => 'datetime',
            ],
            'deleted_client_region_3' => [
                'type' => 'datetime',
            ]
        ]);

        $this->forge->addPrimaryKey('kd_client_region_3');
        $this->forge->addForeignKey('kd_client_region_2', 'client_region_2', 'kd_client_region_2');

        $this->forge->createTable('client_region_3');
    }

    public function down()
    {
        $this->forge->dropTable('client_region_3');
    }
}
