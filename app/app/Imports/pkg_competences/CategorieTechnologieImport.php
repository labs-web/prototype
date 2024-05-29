<?php

namespace App\Imports\pkg_competences;

use App\Models\pkg_competences\CategorieTechnologie;
use Carbon\Carbon;
use Maatwebsite\Excel\Concerns\ToModel;
use Illuminate\Support\Facades\Validator;
use App\Models\pkg_competences\Technologie;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class CategorieTechnologieImport implements ToModel, WithHeadingRow
{
    // Implement the model() method to import CategorieTechnologies
    public function model(array $row)
    {

        // CategorieTechnologie doesn't exist, proceed with importing it
        return new CategorieTechnologie([
            'nom' => $row["nom"],
            'description' => $row["description"],
        ]);
    }

}