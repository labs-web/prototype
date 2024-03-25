<?php

namespace Database\Seeders\Autorisation;

use Carbon\Carbon;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the databaase seeds.
     */
    public function run(): void
    {
        User::create([
            'prenom' => 'hamid',
            'nom' => 'achaou',
            'email' => 'hamidachaou@example.com',
            'password' => Hash::make('hamidachaou1234'),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }
}
