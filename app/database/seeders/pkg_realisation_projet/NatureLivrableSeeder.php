<?php

namespace Database\Seeders\pkg_realisation_projet;


use Illuminate\Database\Seeder;
use App\Models\GestionProjets\Projet;
use App\Models\pkg_realisation_projet\NatureLivrable;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\Schema;


class NatureLivrableSeeder extends Seeder
{
    public function run(): void
    {

        Schema::disableForeignKeyConstraints();
        NatureLivrable::truncate();
        Schema::enableForeignKeyConstraints();

        $csvFile = fopen(base_path("database/data/pkg_realisation_projet/NatureLivrable.csv"), "r");
        $firstline = true;
        $i = 0;
        while (($data = fgetcsv($csvFile)) !== FALSE) {
            if (!$firstline) {
                NatureLivrable::create([
                    "nom"=>$data['0'],
                    "description" =>$data['1']
                ]);
            }
            $firstline = false;
        }

        fclose($csvFile);

    }
}
