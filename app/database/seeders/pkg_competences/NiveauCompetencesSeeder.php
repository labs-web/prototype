<?php

namespace Database\Seeders\pkg_competences;

use App\Models\pkg_competences\NiveauCompetence;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class NiveauCompetencesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();
        NiveauCompetence::truncate();
        Schema::enableForeignKeyConstraints();

        $csvFile = fopen(base_path("database/data/pkg_competences/NiveauCompetences.csv"), "r");
        $firstline = true;
        $i = 0;
        while (($data = fgetcsv($csvFile)) !== FALSE) {
            if (!$firstline) {
                NiveauCompetence::create([
                    "nom"=>$data['0'],
                    "description" =>$data['1']
                ]);
            }
            $firstline = false;
        }

        fclose($csvFile);
    }
}
