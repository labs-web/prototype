<?php

namespace Database\Seeders\pkg_projets;

use Illuminate\Database\Seeder;
use App\Models\pkg_projets\Projet;
use Illuminate\Support\Facades\Schema;

class ProjetSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();
        Projet::truncate();
        Schema::enableForeignKeyConstraints();

        $csvFile = fopen(base_path("database/data/pkg_projets/projets.csv"), "r");
        $firstline = true;

        while (($data = fgetcsv($csvFile)) !== FALSE) {
            if (!$firstline) {
                Projet::create([
                    'nom' => $data[0],
                    'description' => $data[1],
                    'created_at' => $data[2],
                    'updated_at' => $data[3],
                    'objectifs' => $data[4],
                    'date_debut' => $data[5],
                    'date_echeance' => $data[6],
                ]);
            }
            $firstline = false;
        }

        fclose($csvFile);
    }
}