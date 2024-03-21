<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Database\Seeders\Autorisation\{
    ControllerSeeder,
};

class AutorisationSeeder extends Seeder
{
    public function run(): void
    {
        $this->call(AutorisationSeeder::Classes());
    }

    public static function Classes(): array
    {
        return  [
            ControllerSeeder::class,
        ];
    }
}
