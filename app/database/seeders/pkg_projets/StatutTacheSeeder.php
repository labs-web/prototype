<?php

namespace Database\Seeders\pkg_projets;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\pkg_projets\StatutTache;
use Illuminate\Support\Facades\Schema; 


class StatutTacheSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       

        Schema::disableForeignKeyConstraints();
        StatutTache::truncate();
        Schema::enableForeignKeyConstraints();

        $csvFile = fopen(base_path("database/data/pkg_projets/statut_taches.csv"), "r");
        $firstline = true;
        $i = 0;
        while (($data = fgetcsv($csvFile)) !== FALSE) {


            if (!$firstline) {
                StatutTache::create([

                    'nom' => $data[1],
                    'description' => $data[2],
                    'created_at' => $data[3],
                    'updated_at' => $data[4],
                    
                ]);
            }
            $firstline = false;
    }
}
}
