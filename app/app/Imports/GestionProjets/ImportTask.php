<?php

namespace App\Imports\GestionProjets;

use App\Models\GestionProjets\Task;
use Illuminate\Validation\Rule;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ImportTask implements ToModel, WithHeadingRow
{
    public function model(array $row)
    {
        $rules = [
            'nom' => 'required|string|max:255',
            'description' => 'required',
            'date_debut' => 'required',
            'date_de_fin' => 'required',
            'project_id' => 'required',
        ];

        $rules['nom'] = Rule::unique('tasks', 'nom')->where(function ($query) use ($row) {
            return $query->where('project_id', $row['project_id']);
        });

        $validator = \Validator::make($row, $rules);

        if ($validator->fails()) {
            return null;
        }

        $existingTask = Task::where([
            'nom' => $row['nom'],
            'project_id' => $row['project_id'],
        ])->first();

        if ($existingTask) {
            return null;
        }

        return new Task([
            'nom' => $row['nom'],
            'description' => $row['description'],
            'date_debut' => $row['date_debut'],
            'date_de_fin' => $row['date_de_fin'],
            'project_id' => $row['project_id'],
        ]);
    }
}

