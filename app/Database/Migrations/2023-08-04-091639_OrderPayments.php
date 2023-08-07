<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class OrderPayments extends Migration
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
            'payment_request_detail_id' => [
                'type' => 'int',
                'constraint' => 10,
            ],
        ]);
 
        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('payment_request_detail_id', 'payment_request_details', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('order_payments');
    }

    public function down()
    {
        $this->forge->dropTable('order_payments');
    }
}
