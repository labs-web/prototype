<?php

namespace Database\Seeders\pkg_realisation_projet;

use Illuminate\Database\Seeder;
use App\Models\pkg_realisation_projet\Livrable;
use App\Models\pkg_realisation_projet\NatureLivrable;
use Illuminate\Support\Facades\Schema;

class LivrableSeeder extends Seeder
{
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();
        Livrable::truncate();
        NatureLivrable::truncate();
        Schema::enableForeignKeyConstraints();

        // Seeding NatureLivrable from CSV
        $csvFileNature = fopen(base_path("database/data/pkg_realisation_projet/nature-livrable.csv"), "r");
        $firstline = true;
        while (($data = fgetcsv($csvFileNature, 1000, ",")) !== FALSE) {
            if (!$firstline) {
                NatureLivrable::create([
                    "nom" => $data[0],
                    "description" => $data[1]
                ]);
            }
            $firstline = false;
        }
        fclose($csvFileNature);

        // Seeding Livrable from CSV
        $csvFileLivrable = fopen(base_path("database/data/pkg_realisation_projet/livrable.csv"), "r");
        $firstline = true;
        while (($data = fgetcsv($csvFileLivrable, 1000, ",")) !== FALSE) {
            if (!$firstline) {
                Livrable::create([
                    "titre" => $data[0],
                    "description" => $data[1],
                    "lien" => $data[2],
                    "nature_livrable_id" => $data[3]
                ]);
            }
            $firstline = false;
        }
        fclose($csvFileLivrable);
    }
}
