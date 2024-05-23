<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Symfony\Component\Uid\NilUuid;

use Database\Seeders\pkg_rh\{
    GroupeSeeder,
    PersonneSeeder,
};


class RhSeeder extends Seeder
{

    public function run(): void
    {
        $this->call(RhSeeder::Classes());
    }

    public static function Classes(): array
    {
        return [
            GroupeSeeder::class,
            PersonneSeeder::class,
        ];
    }
}
