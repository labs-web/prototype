<?php

namespace App\Imports\GestionProjets;

use App\Models\GestionProjets\Task;
use App\Models\GestionProjets\Projet; // Make sure to import the Projet model
use Illuminate\Validation\Rule;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ImportTask implements ToModel, WithHeadingRow
{
    public function model(array $row)
    {
        // Find the project by its name
        $project = Projet::where('nom', $row['nom_de_projet'])->first();

        if (!$project) {
            return null; 
        }

        $rules = [
            'nom' => 'required|string|max:255',
            'description' => 'required',
            'date_debut' => 'required',
            'date_de_fin' => 'required',
            'nom_de_projet' => 'required',
        ];

        $rules['nom'] = Rule::unique('tasks', 'nom')->where(function ($query) use ($project) {
            return $query->where('project_id', $project->id);
        });

        $validator = \Validator::make($row, $rules);

        if ($validator->fails()) {
            return null; 
        }

        
        $existingTask = Task::where([
            'nom' => $row['nom'],
            'project_id' => $project->id,
        ])->first();

        if ($existingTask) {
            return null; 
        }

        return new Task([
            'nom' => $row['nom'],
            'description' => $row['description'],
            'date_debut' => $row['date_debut'],
            'date_de_fin' => $row['date_de_fin'],
            'project_id' => $project->id,
        ]);
    }
}
