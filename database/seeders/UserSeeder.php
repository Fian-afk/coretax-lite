<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\User::create([
            'username'=> 'admin',
            'email' => 'admin@example.com',
            'password' => bcrypt('password123'),
            'telp' => '081234567890',
            'role' => 'admin',
        ]);
    }
}
