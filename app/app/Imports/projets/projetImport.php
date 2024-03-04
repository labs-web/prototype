<?php

namespace App\Imports\projets;

use Carbon\Carbon;
use App\Models\projets\Projet;
use Maatwebsite\Excel\Concerns\ToModel;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ProjetImport implements ToModel, WithHeadingRow
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {

        try {
            $this->validate($row);
            return new Projet([
                'nom' => $row["nom"],
                'description' => $row["description"],
                'date_debut' => isset($row["date_debut"]) ? Carbon::createFromFormat('Y-m-d', $row["date_debut"])->format('Y-m-d H:i:s') : null,
                'date_de_fin' => isset($row["date_de_fin"]) ? Carbon::createFromFormat('Y-m-d', $row["date_de_fin"])->format('Y-m-d H:i:s') : null
            ]);
        } catch (\InvalidArgumentException $e) {
            return redirect()->route('projet.index')->withError('Le symbole de séparation est introuvable. Pas assez de données disponibles pour satisfaire au format.');
        }
    }

    /**
     * Validate the row data.
     *
     * @param array $row
     * @throws \Illuminate\Validation\ValidationException
     */
    private function validate(array $row)
    {
        $validator = Validator::make($row, [
            'nom' => 'required|max:40',
            'description' => 'required',
            'date_debut' => 'required',
            'date_de_fin' => 'required',
        ]);

        if ($validator->fails()) {
            $errorMessage = 'Les données fournies ne sont pas valides. Veuillez vérifier les erreurs ci-dessous et réessayer.';

            // Store the error message in the session
            session()->flash('error', $errorMessage);

            // throw new \Illuminate\Validation\ValidationException($validator, response()->json(['message' => $errorMessage], 422));
            throw new \Illuminate\Validation\ValidationException($validator);
        }
    }



}