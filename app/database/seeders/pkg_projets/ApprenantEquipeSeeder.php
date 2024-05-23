<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;


class ApprenantEquipeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Schema::disableForeignKeyConstraints();
        DB::table('apprenant_equipe')->truncate();
        Schema::enableForeignKeyConstraints();

        $csvFile = fopen(base_path("database/data/pkg_projets/apprenantEquipe.csv"), "r");
        $firstline = true;

        while (($data = fgetcsv($csvFile)) !== false) {
            if (!$firstline) {
                // Create a new record in the apprenant_equipe table
                DB::table('apprenant_equipe')->insert([
                    'apprenant_id' => $data[0],
                    'equipe_id' => $data[1],
                    'created_at' => $data[2],
                    'updated_at' => $data[3],
                ]);
            }
            $firstline = false;
        }

        fclose($csvFile);
    }
}
