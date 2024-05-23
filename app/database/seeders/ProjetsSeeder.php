<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Symfony\Component\Uid\NilUuid;

use Database\Seeders\pkg_projets\{
    StatutTacheSeeder,
    EquipeSeeder,
    TachesSeeder,
    ProjetSeeder
};


class ProjetsSeeder extends Seeder
{

    public function run(): void
    {
        $this->call(ProjetsSeeder::Classes());
    }

    public static function Classes(): array
    {
        return [
            EquipeSeeder::class,
            ProjetSeeder::class,
            TachesSeeder::class,
            StatutTacheSeeder::class,
        ];
    }
}


