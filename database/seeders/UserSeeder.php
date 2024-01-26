<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory(2)->create();

        User::insert([
           [
                'id' => Str::uuid()->toString(),
                'name' => 'admin bartu kocakara',
                'role' => 'admin',
                'email' => 'kocakarabartu@gmail.com',
                'password' => Hash::make('password')
           ],
           [
                'id' => Str::uuid()->toString(),
                'name' => 'bartu kocakara',
                'role' => 'user',
                'email' => 'kocakarabartuu@gmail.com',
                'password' => Hash::make('password')
        ],
        ]);
    }
}
