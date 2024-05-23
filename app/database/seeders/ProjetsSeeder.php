<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Symfony\Component\Uid\NilUuid;

use Database\Seeders\pkg_projets\{
    ProjetSeeder,
    EquipeSeeder,
    TachesSeeder,
    StatutTacheSeeder,
    ApprenantEquipeSeeder,
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
            ProjetSeeder::class,
            EquipeSeeder::class,
            StatutTacheSeeder::class,
            TachesSeeder::class,
            ApprenantEquipeSeeder::class,

        ];
    }
}


