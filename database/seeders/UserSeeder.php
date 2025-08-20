<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'name' => 'Customer Service A',
            'email' => 'cs1@example.com',
            'password' => Hash::make('password'), // default password
            'role' => 'cs',
        ]);

        User::create([
            'name' => 'Pemohon Budi',
            'email' => 'budi@example.com',
            'password' => Hash::make('password'),
            'role' => 'pemohon',
        ]);

        User::create([
            'name' => 'Customer Service B',
            'email' => 'cs2@example.com',
            'password' => Hash::make('password'),
            'role' => 'cs',
        ]);

        User::create([
            'name' => 'Pemohon Sari',
            'email' => 'sari@example.com',
            'password' => Hash::make('password'),
            'role' => 'pemohon',
        ]);
    }
}
