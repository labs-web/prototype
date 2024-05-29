<?php

namespace Database\Seeders\GestionProjets;


use Illuminate\Database\Seeder;
use App\Models\GestionProjets\Projet;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\Schema;


class ProjetsSeeder extends Seeder
{
    public function run(): void
    {

        Schema::disableForeignKeyConstraints();
        Projet::truncate();
        Schema::enableForeignKeyConstraints();

        $csvFile = fopen(base_path("database/data/projets.csv"), "r");
        $firstline = true;
        $i = 0;
        while (($data = fgetcsv($csvFile)) !== FALSE) {
            if (!$firstline) {
                Projet::create([
                    "nom" => $data['0'],
                    "description" => $data['1']
                ]);
            }
            $firstline = false;
        }

        fclose($csvFile);


    }
}
