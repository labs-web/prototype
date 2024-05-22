<?php

namespace Database\Seeders\pkg_realisation_projet;

use App\Models\pkg_projets\Projet;
use App\Models\pkg_projets\Tache;
use App\Models\pkg_realisation_projet\Message;
use Illuminate\Database\Seeder;

class MessageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        //  SQLSTATE[23000]: Integrity constraint violation: 1062 Duplicate entry '1' for key 'projets.PRIMARY' (Connection: mysql, SQL: insert into `projets` (`id`, `nom`, `updated_at`, `created_at`) values (1, Portfolio, 2024-05-22 10:35:18, 2024-05-22 10:35:18))

        // Projet::create(['id' => 1, 'nom' => 'Portfolio']);
        // Projet::create(['id' => 2, 'nom' => 'Arbre des compétences']);
        // Projet::create(['id' => 3, 'nom' => 'CNMH']);


        // Tache::create(['id' => 1]);
        // Tache::create(['id' => 2]);
        // Tache::create(['id' => 3]);


        // $csvFile = fopen(base_path('database/data/pkg_realisation_projet/messages.csv'), 'r');
        // if ($csvFile === false) {
        //     throw new \Exception('Could not open the CSV file.');
        // }


        // $firstline = true;
        // while (($data = fgetcsv($csvFile, 1000, ",")) !== FALSE) {
        //     if (!$firstline) {

        //         Message::create([
        //             'titre' => $data[0],
        //             'description' => $data[1],
        //             'projet_id' => $data[2],
        //             'tach_id' => $data[3],
        //             'isLue' => filter_var($data[4], FILTER_VALIDATE_BOOLEAN),
        //         ]);
        //     }
        //     $firstline = false;
        // }


        // fclose($csvFile);
    }
}
