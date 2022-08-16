<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Pengelola extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'kd_pengelola' => [
                'type' => 'varchar',
                'constraint' => '50'
            ],
            'nama_pengelola' => [
                'type' => 'varchar',
                'constraint' => '255'
            ],
            'pt_pengelola' => [
                'type' => 'varchar',
                'constraint' => '255'
            ],
            'alamat_pengelola' => [
                'type' => 'varchar',
                'constraint' => '255'
            ],
            'logo_pengelola' => [
                'type' => 'varchar',
                'constraint' => '255'
            ],
            'telegram_pengelola' => [
                'type' => 'varchar',
                'constraint' => '255'
            ],
            'noted_pengelola' => [
                'type' => 'text',
            ],
            'created_pengelola' => [
                'type' => 'datetime',
            ],
            'updated_pengelola' => [
                'type' => 'datetime',
            ],
            'deleted_pengelola' => [
                'type' => 'datetime',
            ]
        ]);

        $this->forge->addPrimaryKey('kd_pengelola');
        // $this->forge->addForeignKey('kd_pengelola', 'pengelola', 'kd_pengelola');

        $this->forge->createTable('pengelola');
    }

    public function down()
    {
        $this->forge->dropTable('pengelola');
    }
}
