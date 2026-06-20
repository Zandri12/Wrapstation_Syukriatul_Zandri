<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTransactionsTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'transaction_id' => [
                'type'           => 'INT',
                'auto_increment' => true,
            ],
            'user_id' => [
                'type'       => 'INT',
            ],
            'product_id' => [
                'type'       => 'INT',
            ],
            'payment_method' => [
                'type'       => 'VARCHAR',
                'constraint' => '50',
            ],
            'qty' => [
                'type'       => 'INT',
            ],
        ]);
        $this->forge->addKey('transaction_id', true);
        $this->forge->addForeignKey('user_id', 'users', 'user_id', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('product_id', 'products', 'product_id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('transactions');
    }

    public function down()
    {
        $this->forge->dropTable('transactions');
    }
}
