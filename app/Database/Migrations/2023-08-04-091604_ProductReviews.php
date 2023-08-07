<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class ProductReviews extends Migration
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
            'review' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
        ]);
 
        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('user_id', 'users', 'id', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('product_id', 'products', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('product_reviews');
    }

    public function down()
    {
        $this->forge->dropTable('product_reviews');
    }
}
