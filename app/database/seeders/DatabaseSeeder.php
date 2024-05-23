<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use Database\Seeders\{
    UserSeeder ,
    CompetencesSeeder,
    NotificationsSeeder,
    AutorisationsSeeder,
    RHSeeder ,
    ProjetsSeeder,
    RealisationProjetSeeder,
    PostsSeeder,
};


class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call(RHSeeder::class);
        $this->call(AutorisationsSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(CompetencesSeeder::class);
        $this->call(NotificationsSeeder::class);
        $this->call(ProjetsSeeder::class);
        $this->call(RealisationProjetSeeder::class);
        $this->call(PostsSeeder::class);
    }
}