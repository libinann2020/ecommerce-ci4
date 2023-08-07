<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class ProductRatings extends Migration
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
            'user_id' => [
                'type' => 'INT',
                'constraint' => 10,
            ],
            'product_id' => [
                'type' => 'INT',
                'constraint' => '10',
            ],
            'rate' => [
                'type' => 'ENUM',
                'constraint' => ['1', '2', '3', '4', '5'],
                'default' => '1',
            ],
        ]);
 
        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('user_id', 'users', 'id', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('product_id', 'products', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('product_ratings');
    }

    public function down()
    {
        $this->forge->dropTable('product_ratings');
    }
}
