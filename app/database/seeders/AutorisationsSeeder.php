<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Symfony\Component\Uid\NilUuid;


use Database\Seeders\pkg_autorisations\{
    RoleSeeder,
    ControllerSeeder,
    ActionSeeder,


};


class AutorisationsSeeder extends Seeder
{

    public function run(): void
    {
        $this->call(AutorisationsSeeder::Classes());
    }

    public static function Classes(): array
    {
        return [
            RoleSeeder::class,
            ControllerSeeder::class,
            ActionSeeder::class,
            

        ];
    }
}
