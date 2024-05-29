<?php

namespace Database\Seeders\pkg_notifications;

use App\Models\pkg_rh\Personne;
use Illuminate\Database\Seeder;
use App\Models\GestionProjets\Projet;
use Illuminate\Support\Facades\Schema;
use App\Models\pkg_notifications\Notification;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class NotificationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        // // TODO fix-seeder : NotificationSeeder

        // //  SQLSTATE[HY000]: General error: 1364 Field 'type' doesn't have a default value (Connection: mysql, SQL: insert into `personnes` (`id`, `nom`, `prenom`, `updated_at`, `created_at`) values (1, madani, ali, 2024-05-22 10:33:48, 2024-05-22 10:33:48))


        // Schema::disableForeignKeyConstraints();
        // Notification::truncate();
        // Schema::enableForeignKeyConstraints();

        // $csvFile = fopen(base_path("database/data/pkg_notifications/notifications.csv"), "r");
        // $firstline = true;
        // $i = 0;
        // while (($data = fgetcsv($csvFile)) !== FALSE) {
        //     if (!$firstline) {
        //         $isVue = filter_var($data['2'], FILTER_VALIDATE_BOOLEAN);

        //         Notification::create([
        //             "title" => $data['0'],
        //             "message" => $data['1'],
        //             "isVue" => $isVue,
        //             "apprenant_id" => $data['3'],
        //         ]);
        //     }
        //     $firstline = false;
        // }

        // fclose($csvFile);
    }
}
