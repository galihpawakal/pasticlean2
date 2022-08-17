<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class PengelolaRegion1 extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'kd_pengelola_region_1' => [
                'type' => 'varchar',
                'constraint' => '50'
            ],
            'kd_pengelola' => [
                'type' => 'varchar',
                'constraint' => '50'
            ],
            'nama_pengelola_region_1' => [
                'type' => 'varchar',
                'constraint' => '255'
            ],
            'telegram_pengelola_region_1' => [
                'type' => 'varchar',
                'constraint' => '255'
            ],
            'noted_pengelola_region_1' => [
                'type' => 'text',
            ],
            'created_pengelola_region_1' => [
                'type' => 'datetime',
            ],
            'updated_pengelola_region_1' => [
                'type' => 'datetime',
            ],
            'deleted_pengelola_region_1' => [
                'type' => 'datetime',
            ]
        ]);

        $this->forge->addPrimaryKey('kd_pengelola_region_1');
        $this->forge->addForeignKey('kd_pengelola', 'pengelola', 'kd_pengelola');

        $this->forge->createTable('pengelola_region_1');
    }

    public function down()
    {
        $this->forge->dropTable('pengelola_region_1');
    }
}
