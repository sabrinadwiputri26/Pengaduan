<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Administrator',
            'email' => 'sabrina@gmail.com',
            'password' => Hash::make('123456'),
            'role' => 'admin',
        ]);
        User::create([
            'name' => 'petugas',
            'email' => 'petugas@gmail.com',
            'password' => Hash::make('1234567'),
            'role' => 'petugas',
        ]);
    }
}
