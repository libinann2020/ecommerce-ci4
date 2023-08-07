<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class UserDetails extends Migration
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
                'type' => 'int',
                'constraint' => 10,
            ],
            'country' => [
                'type' => 'VARCHAR',
                'null' => true,
                'constraint' => '120',
            ],
            'state' => [
                'type' => 'VARCHAR',
                'null' => true,
                'constraint' => '120',
            ],
            'district' => [
                'type' => 'VARCHAR',
                'null' => true,
                'constraint' => '120',
            ],
            'pincode' => [
                'type' => 'VARCHAR',
                'null' => true,
                'constraint' => '120',
            ],
            'mobile' => [
                'type' => 'VARCHAR',
                'null' => true,
                'constraint' => '15',
            ],
            'local_address' => [
                'type' => 'VARCHAR',
                'null' => true,
                'constraint' => '255',
            ],
            'permanent_address' => [
                'type' => 'VARCHAR',
                'null' => true,
                'constraint' => '255',
            ],
        ]);
 
        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('user_id', 'users', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('user_details');
    }

    public function down()
    {
        $this->forge->dropTable('user_details');
    }
}
