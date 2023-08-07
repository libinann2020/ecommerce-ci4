<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class PaymentRequestDetails extends Migration
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
            'phone' => [
                'type' => 'VARCHAR',
                'constraint' => 15,
            ],
            'buyer_name' => [
                'type' => 'VARCHAR',
                'constraint' => '120',
            ],
            'amount' => [
                'type' => 'DOUBLE',
                'constraint' => '8,2',
            ],
            'purpose' => [
                'type' => 'VARCHAR',
                'constraint' => 120,
            ],
            'payment_request_status' => [
                'type' => 'VARCHAR',
                'constraint' => '120',
            ],
            'payment_id' => [
                'type' => 'VARCHAR',
                'constraint' => 120,
            ],
            'payment_status' => [
                'type' => 'VARCHAR',
                'constraint' => '120',
            ],
        ]);
 
        $this->forge->addKey('id', true);
        $this->forge->createTable('payment_request_details');
    }

    public function down()
    {
        $this->forge->dropTable('payment_request_details');
    }
}
