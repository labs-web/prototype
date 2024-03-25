<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Database\Seeders\Autorisation\UserSeeder;
use Illuminate\Database\Seeder;
use Symfony\Component\Uid\NilUuid;

use Database\Seeders\GestionProjets\{
    ProjetsSeeder,
};

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $classes = [];
        $classes = array_merge(
            GestionProjets::Classes(),
            AutorisationSeeder::Classes()
        );
        $this->call($classes);
        $this->call(UserSeeder::class);
    }
}
