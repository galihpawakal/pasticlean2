<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Client extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'kd_client' => [
                'type' => 'varchar',
                'constraint' => '50'
            ],
            'nama_client' => [
                'type' => 'varchar',
                'constraint' => '255'
            ],
            'pt_client' => [
                'type' => 'varchar',
                'constraint' => '255'
            ],
            'alamat_client' => [
                'type' => 'text',
            ],
            'logo_client' => [
                'type' => 'varchar',
                'constraint' => '255'
            ],
            'telegram_client' => [
                'type' => 'varchar',
                'constraint' => '255'
            ],
            'noted_client' => [
                'type' => 'text',
            ],
            'created_client datetime default current_timestamp',
            'updated_client' => [
                'type' => 'datetime',
            ],
            'deleted_client' => [
                'type' => 'datetime',
            ]
        ]);

        $this->forge->addPrimaryKey('kd_client');
        //  $this->forge->addForeignKey('id_var', 'variety', 'id_variety');

        $this->forge->createTable('client');
    }

    public function down()
    {
        $this->forge->dropTable('client');
    }
}
