<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'username' => 'admin',
            'full_name' => 'Administrator',
            'email' => 'administrator@gmail.com',
            'role' => 'admin',
            'password' => Hash::make('admin1234'), // jangan lupa ubah di production
        ]);

        User::create([
            'username' => 'pic1',
            'full_name' => 'PIC Gudang A',
            'email' => 'pic1@gmail.com',
            'role' => 'pic',
            'password' => Hash::make('admin1234'),
        ]);
    }
}
