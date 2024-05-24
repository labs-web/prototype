<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Symfony\Component\Uid\NilUuid;

use Database\Seeders\pkg_competences\{
    CompetenceSeeder,
    NiveauCompetencesSeeder,
    CategorieTechnologiesSeeder,
    TechnologiesSeeder,
};


class CompetencesSeeder extends Seeder
{

    public function run(): void
    {
        $this->call(CompetencesSeeder::Classes());
    }

    public static function Classes(): array
    {
        return [
            NiveauCompetencesSeeder::class,
            CompetenceSeeder::class,
            CategorieTechnologiesSeeder::class,
            TechnologiesSeeder::class,
        ];
    }
}