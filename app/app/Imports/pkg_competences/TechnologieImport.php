<?php

namespace App\Imports\pkg_competences;

use Carbon\Carbon;
use Maatwebsite\Excel\Concerns\ToModel;
use Illuminate\Support\Facades\Validator;
use App\Models\pkg_competences\Technologie;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class TechnologieImport implements ToModel, WithHeadingRow
{
    // Implement the method to check if a task already exists in the application
    private function taskExists(array $row): bool
    {
        // Logic to check if a task with the same attributes exists in the database
        // For example, you can check if a task with the same name and dates already exists
        $existingTask = Technologie::where('nom', $row['nom'])
            ->exists();
        return $existingTask;
    }

    // Implement the model() method to import tasks
    public function model(array $row)
    {
        // Check if the task already exists in the application
        if ($this->taskExists($row)) {
            // Task already exists, skip importing it
            return null;
        }

        // Task doesn't exist, proceed with importing it
        return new Technologie([
            'nom' => $row["nom"],
            'description' => $row["description"],
            'categorie_technologies_id' => $row["categorie_technologies_id"],
            'competence_id' => $row["competence_id"],

        ]);
    }

    // Implement the validate() method to validate row data (as shown in your original code)
    // ...
}