<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Products extends Migration
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
            'name' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'price' => [
                'type' => 'DOUBLE',
                'constraint' => '8,2',
            ],
            'sale_price' => [
                'type' => 'DOUBLE',
                'constraint' => '8,2',
            ],
            'qty' => [
                'type' => 'DOUBLE',
                'constraint' => '8,2',
            ],
            'details' => [
                'type' => 'TEXT',
            ],
            'image' => [
                'type' => 'VARCHAR',
                'constraint' => '120',
            ],
        ]);
 
        $this->forge->addKey('id', true);
        $this->forge->createTable('products');
    }

    public function down()
    {
        $this->forge->dropTable('products');
    }
}
