<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Illuminate\Database\Seeder;
use Symfony\Component\Uid\NilUuid;

use Database\Seeders\{
    UserSeeder ,
    CompetencesSeeder, 
    NotificationsSeeder,
    AutorisationsSeeder,
    RHSeeder ,
    GestionProjetsSeeder,
    ProjetsSeeder,
    RealisationProjetSeeder,
    PostsSeeder,
};





class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call(UserSeeder::class);
        $this->call(CompetencesSeeder::class);
        $this->call(NotificationsSeeder::class);
        $this->call(AutorisationsSeeder::class);
        $this->call(RHSeeder::class);
        $this->call(GestionProjetsSeeder::class);
        $this->call(ProjetsSeeder::class);
        $this->call(RealisationProjetSeeder::class);
        $this->call(PostsSeeder::class);
       
    
       
    }
}
