<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class ModifyProductPriceColumn extends Migration
{
    public function up()
    {
        $this->forge->modifyColumn('products', [
            'price' => [
                'type' => 'DECIMAL',
                'constraint' => '15,2',
            ],
        ]);
    }

    public function down()
    {
        $this->forge->modifyColumn('products', [
            'price' => [
                'type' => 'DECIMAL',
                'constraint' => '10,2',
            ],
        ]);
    }
}
