<?php

namespace Database\Seeders\pkg_rh;

use App\Models\pkg_rh\Personne;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class PersonneSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       


        Schema::disableForeignKeyConstraints();
        Personne::truncate();
        Schema::enableForeignKeyConstraints();

        $csvFile = fopen(base_path("database/data/pkg_rh/Personnes.csv"), "r");
        $firstline = true;
        $i = 0;
        while (($data = fgetcsv($csvFile)) !== FALSE) {
            if (!$firstline) {

                Personne::create([
                    "nom" => $data['0'],
                    "prenom" => $data['1'],
                    "type" => $data['2'],
                    "groupe_id" => $data['3'],
                ]);
            }
            $firstline = false;
        }

        fclose($csvFile);
    }
}
