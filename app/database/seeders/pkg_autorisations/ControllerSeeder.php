<?php

namespace Database\Seeders\pkg_autorisations;

use App\Models\pkg_autorisations\Controller;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class ControllerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();
        Controller::truncate();
        Schema::enableForeignKeyConstraints();

        $csvFile = fopen(base_path("database/data/pkg_autorisations/controllers.csv"), "r");
        $firstline = true;
        $i = 0;
        while (($data = fgetcsv($csvFile)) !== FALSE) {
            if (!$firstline) {
                Controller::create([
                    "nom"=>$data['0']
                ]);
            }
            $firstline = false;
        }

        fclose($csvFile);
    }
}
