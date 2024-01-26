<?php

namespace Database\Seeders;

use App\Models\Credit;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CreditSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::where('email', 'kocakarabartu@gmail.com')->first();
        Credit::create([
            'user_id' => $user->id,
            'price' => "10050",
            'amount' => rand(1, 50),
        ]);

        Credit::factory(2)->create();

    }
}
