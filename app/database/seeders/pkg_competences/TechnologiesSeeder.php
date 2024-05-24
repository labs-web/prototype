<?php

namespace Database\Seeders\pkg_competences;

use App\Models\pkg_competences\Technologie;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;
use App\Models\pkg_notifications\Notification;

class TechnologiesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // TODO fix-seeder

        // SQLSTATE[23000]: Integrity constraint violation: 1452 Cannot add or update a child row: a foreign key constraint fails (`prtotype`.`technologies`, CONSTRAINT `technologies_competence_id_foreign` FOREIGN KEY (`competence_id`) REFERENCES `competences` (`id`) ON DELETE CASCADE) (Connection: mysql, SQL: insert into `technologies` (`nom`, `description`, `categorie_technologies_id`, `competence_id`, `updated_at`, `created_at`) values (html, est le langage de balisage standard utilisé pour créer des pages web. Il fournit la structure de base d'un site web, qui est ensuite améliorée et modifiée par d'autres technologies comme CSS et JavaScript., 1, 1, 2024-05-22 10:32:52, 2024-05-22 10:32:52))


        Schema::disableForeignKeyConstraints();
        Technologie::truncate();
        Schema::enableForeignKeyConstraints();

        $csvFile = fopen(base_path("database/data/pkg_competences/Technologies.csv"), "r");
        $firstline = true;
        $i = 0;
        while (($data = fgetcsv($csvFile)) !== FALSE) {
            if (!$firstline) {
                Technologie::create([
                    "nom" => $data['0'],
                    "description" => $data['1'],
                    "categorie_technologies_id" => $data['2'],
                    "competence_id" => $data['3'],
                ]);
            }
            $firstline = false;
        }

        fclose($csvFile);
    }
}