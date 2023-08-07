<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class ProductOrderDetails extends Migration
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
            'order_id' => [
                'type' => 'int',
                'constraint' => 10,
            ],
            'product_id' => [
                'type' => 'int',
                'constraint' => 10,
            ],
            'user_id' => [
                'type' => 'int',
                'constraint' => 10,
            ],
            'qty' => [
                'type' => 'DOUBLE',
                'constraint' => '8,2',
            ],
        ]);
 
        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('order_id', 'product_orders', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('product_order_details');
    }

    public function down()
    {
        $this->forge->dropTable('product_order_details');
    }
}
