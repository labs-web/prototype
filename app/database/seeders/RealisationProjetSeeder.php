<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Symfony\Component\Uid\NilUuid;

use Database\Seeders\pkg_realisation_projet\{
    NatureLivrableSeeder
};


class RealisationProjetSeeder extends Seeder
{

    public function run(): void
    {
        $this->call(RealisationProjetSeeder::Classes());
    }

    public static function Classes(): array
    {
        return [
            NatureLivrableSeeder::class,
        ];
    }
}
