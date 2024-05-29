<?php

namespace App\Imports\pkg_realisation_projet;

use App\Models\pkg_realisation_projet\Livrable;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class LivrableImport implements ToModel, WithHeadingRow
{
    private function livrableExists(array $row): bool
    {
        return Livrable::where('titre', $row['titre'])
                       ->orWhere('lien', $row['lien'])
                       ->exists();
    }

    public function model(array $row)
    {
        if ($this->livrableExists($row)) {
            return null;
        }

        return new Livrable([
            'titre' => $row['titre'],
            'lien' => $row['lien'],
            'description' => $row['description'],
            'nature_livrable_id' => $row['nature_livrable_id'],
            'projet_id' => $row['projet_id']
        ]);
    }
}
