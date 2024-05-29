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

        Schema::disableForeignKeyConstraints();
        Notification::truncate();
        Schema::enableForeignKeyConstraints();

        $csvFile = fopen(base_path("database/data/pkg_notifications/notifications.csv"), "r");
        $firstline = true;
        $i = 0;
        while (($data = fgetcsv($csvFile)) !== FALSE) {
            if (!$firstline) {
                $isVue = filter_var($data['2'], FILTER_VALIDATE_BOOLEAN);

                Notification::create([
                    "title" => $data['0'],
                    "message" => $data['1'],
                    "isVue" => $isVue,
                    "apprenant_id" => $data['3'],
                ]);
            }
            $firstline = false;
        }

        fclose($csvFile);
    }
}