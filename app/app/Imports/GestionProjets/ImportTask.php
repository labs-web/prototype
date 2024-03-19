<?php

namespace App\Imports\GestionProjets;

use App\Models\GestionProjets\Task;
use App\Models\GestionProjets\Projet;
use Illuminate\Validation\Rule;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use DateTime;

class ImportTask implements ToModel, WithHeadingRow
{
    public function model(array $row)
    {
        $project = Projet::where('nom', $row['nom_de_projet'])->first();

        if (!$project) {
            return null;
        }

        if (Task::where([
            'nom' => $row['nom'],
            'project_id' => $project->id,
        ])->exists()) {
            return null;
        }

        $dateDebut = $this->convertToValidDate($row['date_debut']);
        $dateDeFin = $this->convertToValidDate($row['date_de_fin']);

        return new Task([
            'nom' => $row['nom'],
            'description' => $row['description'],
            'date_debut' => $dateDebut,
            'date_de_fin' => $dateDeFin,
            'project_id' => $project->id,
        ]);
    }

    private function convertToValidDate($numericDate)
    {
        $unixTimestamp = ($numericDate - 25569) * 86400;
        return date('Y-m-d', $unixTimestamp);
    }
}
