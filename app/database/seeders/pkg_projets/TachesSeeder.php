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
                $personne_id = $data['4'] ? $data['4'] : NULL;
                Tache::create([
                    "nom"=>$data['0'],
                    "description"=>$data['1'],
                    "priorité"=>$data['2'],
                    "dateEchéance"=>$data['3'],
                    "personne_id"=>$personne_id,
                    "projets_id"=>$data['5'],
                    "status_tache_id"=>$data['6'],
                    'updated_at' => Carbon::now(),
                    'created_at' => Carbon::now()
                ]);
            }
            $firstline = false;
        }
    }
}