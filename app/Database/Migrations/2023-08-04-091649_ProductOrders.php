<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class ProductOrders extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'constraint' => 10,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'payment_id' => [
                'type' => 'int',
                'constraint' => 10,
            ],
        ]);
 
        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('payment_id', 'order_payments', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('product_orders');
    }

    public function down()
    {
        $this->forge->dropTable('product_orders');
    }
}
