<?php

namespace Database\Seeders\pkg_projets;

use App\Models\pkg_projets\Equipe;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\Schema;


class EquipeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {


        // SQLSTATE[23000]: Integrity constraint violation: 1452 Cannot add or update a child row: a foreign key constraint fails (`prtotype`.`equipes`, CONSTRAINT `equipes_projet_id_foreign` FOREIGN KEY (`projet_id`) REFERENCES `projets` (`id`) ON DELETE CASCADE) (Connection: mysql, SQL: insert into `equipes` (`nom`, `description`, `projet_id`, `created_at`, `updated_at`) values (equipe 1, mission d'equipe 1, 1, 2022-01-01 00:00:00, 2022-01-01 00:00:00))



        // Schema::disableForeignKeyConstraints();
        // Equipe::truncate();
        // Schema::enableForeignKeyConstraints();

        // $csvFile = fopen(base_path("database/data/pkg_projets/equipes.csv"), "r");
        // $firstline = true;

        // while (($data = fgetcsv($csvFile)) !== FALSE) {
        //     if (!$firstline) {
        //         Equipe::create([
        //             'nom' => $data[0],
        //             'description' => $data[1],
        //             'projet_id' => $data[2],
        //             'created_at' => $data[3],
        //             'updated_at' => $data[4],
        //         ]);
        //     }
        //     $firstline = false;
        // }

        // fclose($csvFile);
    }
}
