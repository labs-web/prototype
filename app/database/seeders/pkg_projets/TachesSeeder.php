<?php

namespace Database\Seeders\pkg_projets;

use App\Models\pkg_projets\Tache;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TachesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $csvFile = fopen(base_path("database/data/pkg_projets/Taches.csv"), "r");
        $firstline = true;
        $i = 0;
        while (($data = fgetcsv($csvFile)) !== FALSE) {
            if (!$firstline) {
                $personne_id = isset($data[5]) ? $data[5] : NULL;
                Tache::create([
                    "nom" => $data[0],
                    "description" => $data[1],
                    "priorité" => $data[2],
                    "dateDebut" => Carbon::parse($data[3]),
                    "dateEchéance" => Carbon::parse($data[4]),
                    "personne_id" => $data[5],
                    "projets_id" => $data[6],
                    "status_tache_id" => $data[7],
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ]);
            }
            $firstline = false;
        }
        fclose($csvFile);
    }
}
