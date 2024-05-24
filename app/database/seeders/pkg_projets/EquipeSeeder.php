<?php

namespace Database\Seeders\pkg_projets;

use Log;
use Illuminate\Database\Seeder;
use App\Models\pkg_projets\Equipe;
use App\Models\pkg_projets\Projet;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;


class EquipeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();
        Equipe::truncate();
        Schema::enableForeignKeyConstraints();
        
        // if (Projet::count() == 0) {
        //     // Create a default projet with id 1
        //     Projet::create([
        //         'id' => 1,
        //         'nom' => 'Default Project',
        //         'description' => 'Default Project',
        //         'created_at' => now(),
        //         'updated_at' => now(),
        //     ]);
        // }

        $csvFile = fopen(base_path("database/data/pkg_projets/equipes.csv"), "r");
        $firstline = true;

        while (($data = fgetcsv($csvFile)) !== FALSE) {
            if (!$firstline) {
                // Check if the projet_id exists in the projets table
                if (Projet::find($data[2])) {
                    Equipe::create([
                        'nom' => $data[0],
                        'description' => $data[1],
                        'projet_id' => $data[2],
                        'created_at' => $data[3],
                        'updated_at' => $data[4],
                    ]);
                }
            }
            $firstline = false;
        }
        fclose($csvFile);
        
    }
}
