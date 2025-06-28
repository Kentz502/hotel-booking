<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => 'password',
            'role_id' => '1'
        ]);

        User::create([
            'name' => 'Customer',
            'email' => 'customer@gmail.com',
            'password' => 'password',
            'role_id' => '2'
        ]);
    }
}
