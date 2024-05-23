<?php

namespace Database\Seeders\pkg_rh;

use App\Models\pkg_rh\Groupe;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class PersonneSeeder extends Seeder
{

    public function run(): void
    {

        Schema::disableForeignKeyConstraints();
        Groupe::truncate();
        Schema::enableForeignKeyConstraints();

        $csvFile = fopen(base_path("database/data/pkg_rh/Personnes.csv"), "r");
        $firstline = true;

        while (($data = fgetcsv($csvFile)) !== FALSE) {
            if (!$firstline) {
                Groupe::create([
                    "nom" => $data['0'],
                    "prenom" => $data['1'],
                    "type" => $data['2']
                ]);
            }
            $firstline = false;
        }

        fclose($csvFile);
    }
}
