<?php

namespace Database\Seeders\pkg_realisation_projet;

use App\Models\pkg_realisation_projet\Message;
use Illuminate\Database\Seeder;

class MessageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $csvFile = fopen(base_path('database/data/pkg_realisation_projet/messages.csv'), 'r');
        // if ($csvFile === false) {
        //     throw new \Exception('Could not open the CSV file.');
        // }

        // try {
        //     $firstline = true;
        //     while (($data = fgetcsv($csvFile, 1000, ",")) !== false) {
        //         if (!$firstline) {
        //             Message::create([
        //                 'titre' => $data[0],
        //                 'description' => $data[1],
        //                 'projet_id' => $data[2],
        //                 'tache_id' => $data[3],
        //                 'isLue' => filter_var($data[4], FILTER_VALIDATE_BOOLEAN),
        //             ]);
        //         }
        //         $firstline = false;
        //     }
        // } finally {
        //     fclose($csvFile);
        // }
    }
}
