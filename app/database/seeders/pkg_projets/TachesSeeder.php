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
        // SQLSTATE[23000]: Integrity constraint violation: 1452 Cannot add or update a child row: a foreign key constraint fails (`prtotype`.`taches`, CONSTRAINT `taches_apprenant_id_foreign` FOREIGN KEY (`apprenant_id`) REFERENCES `personnes` (`id`) ON DELETE CASCADE) (Connection: mysql, SQL: insert into `taches` (`nom`, `description`, `priorité`, `dateEchéance`, `apprenant_id`, `updated_at`, `created_at`) values (tache1, description1, 1, 2024/06/08, 1, 2024-05-22 10:34:30, 2024-05-22 10:34:30))
        
        // $csvFile = fopen(base_path("database/data/pkg_projets/Taches.csv"), "r");
        // $firstline = true;
        // $i = 0;
        // while (($data = fgetcsv($csvFile)) !== FALSE) {
        //     if (!$firstline) {
        //         $apprenant_id = $data['4'] ? $data['4'] : NULL;
        //         Tache::create([
        //             "nom"=>$data['0'],
        //             "description"=>$data['1'],
        //             "priorité"=>$data['2'],
        //             "dateEchéance"=>$data['3'],
        //             "apprenant_id"=>$apprenant_id,
        //             'updated_at' => Carbon::now(),
        //             'created_at' => Carbon::now()
        //         ]);
        //     }
        //     $firstline = false;
        // }
    }
}
