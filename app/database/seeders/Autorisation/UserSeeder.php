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
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'ProjectLeader',
            'email' => 'ProjectLeader@example.com',
            'password' => Hash::make('ProjectLeader1234'),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }
}
