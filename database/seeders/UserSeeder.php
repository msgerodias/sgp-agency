<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // Admin user
        User::create([
            'name' => 'System Admin - STE',
            'email' => 'adminste@sgp.com',
            'password' => Hash::make('p@ssw0rd'), // change for production
            'role' => 'admin',
        ]);

        User::create([
            'name' => 'System Admin - LORREZA',
            'email' => 'adminlorreza@sgp.com',
            'password' => Hash::make('sgp1@2025!'), // change for production
            'role' => 'admin',
        ]);

        User::create([
            'name' => 'System Admin 3',
            'email' => 'admin3@sgp.com',
            'password' => Hash::make('sgp2@2025!'), // change for production
            'role' => 'admin',
        ]);
    }
}
