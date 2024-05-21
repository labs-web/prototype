<?php

namespace Database\Seeders\pkg_competences;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use Carbon\Carbon;
use App\Models\pkg_competences\Competence;

class CompetencesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $csvFile = fopen(base_path("database/data/pkg_competences/Competences.csv"), "r");
        if ($csvFile === false) {
            throw new \Exception("Could not open the CSV file.");
        }

        $firstline = true;
        while (($data = fgetcsv($csvFile)) !== FALSE) {
            if (!$firstline) {
                Competence::create([
                    "nom" => $data[0],
                    "description" => $data[1],
                    'updated_at' => Carbon::now(),
                    'created_at' => Carbon::now()
                ]);
            }
            $firstline = false;
        }

        fclose($csvFile);
    }
}
