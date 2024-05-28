<?php

namespace App\Imports\pkg_realisation_projet;

use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use App\Models\pkg_realisation_projet\NatureLivrable;

class NatureLivrableImport implements ToModel, WithHeadingRow
{
    // Check if a NatureLivrable already exists in the application
    private function natureLivrableExists(array $row): bool
    {
        $existingNatureLivrable = NatureLivrable::where('nom', $row['nom'])
            ->exists();
        return $existingNatureLivrable;
    }

    // Import NatureLivrable if it does not already exist
    public function model(array $row)
    {
        if ($this->natureLivrableExists($row)) {
            // NatureLivrable already exists, skip importing it
            return null;
        }

        // NatureLivrable doesn't exist, proceed with importing it
        return new NatureLivrable([
            'nom' => $row['nom'],
            'description' => $row['description'],
        ]);
    }
}

