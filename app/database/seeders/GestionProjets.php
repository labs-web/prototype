<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Symfony\Component\Uid\NilUuid;

use Database\Seeders\GestionProjets\{
    ProjetsSeeder,
};


class GestionProjets extends Seeder
{

    public function run(): void
    {
        $this->call(GestionProjets::Classes());
    }

    public static function Classes(): array
    {
        return  [
            ProjetsSeeder::class,
        ];
    }
}

