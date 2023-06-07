<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
{
    // Create admin account
    User::create([
        'name' => 'Admin',
        'email' => 'admin@livre.com',
        'password' => bcrypt('password'),
        'role' => 'admin',
    ]);

    // Create CRM account
    User::create([
        'name' => 'CRM User',
        'email' => 'crm@livre.com',
        'password' => bcrypt('password'),
        'role' => 'crm',
    ]);

    // Create regular user account
    User::create([
        'name' => 'Regular User',
        'email' => 'user@livre.com',
        'password' => bcrypt('password'),
        'role' => 'user',
    ]);
}

}
