<?php

namespace App\Imports\pkg_competences;

use Carbon\Carbon;
use App\Models\pkg_competences\NiveauCompetence;
use Maatwebsite\Excel\Concerns\ToModel;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class NiveauxCompetencesImport implements ToModel, WithHeadingRow
{
    // Implement the method to check if a niveaux CompetencesExists already exists in the application
    private function niveauxCompetencesExists(array $row): bool
    {
        // Logic to check if a niveaux CompetencesExists with the same attributes exists in the database
        // For example, you can check if a niveaux CompetencesExists with the same name and dates already exists
        $existingTask = NiveauCompetence::where('nom', $row['nom'])
            ->exists();
        return $existingTask;
    }

    // Implement the model() method to import niveaux CompetencesExists
    public function model(array $row)
    {
        // Check if the niveaux Competences already exists in the application
        if ($this->niveauxCompetencesExists($row)) {
            // niveaux CompetencesExists already exists, skip importing it
            return null;
        }

        // niveaux CompetencesExists doesn't exist, proceed with importing it
        return new NiveauCompetence([
            'nom' => $row["nom"],
            'description' => $row["description"],
           
        ]);
    }
}