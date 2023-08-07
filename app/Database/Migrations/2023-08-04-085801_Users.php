<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Users extends Migration
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
            'username' => [
                'type' => 'VARCHAR',
                'constraint' => 120,
            ],
            'email' => [
                'type' => 'VARCHAR',
                'constraint' => 120,
            ],
            'password' => [
                'type' => 'VARCHAR',
                'constraint' => '120',
            ],
            'user_type' => [
                'type' => 'ENUM',
                'constraint' => ['user', 'admin'],
                'default' => 'user',
            ],
            'profile' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
                'default' => 'profile.jpg',
            ],
        ]);
 
        $this->forge->addKey('id', true);
        $this->forge->createTable('users');
    }

    public function down()
    {
        $this->forge->dropTable('users');
    }
}
