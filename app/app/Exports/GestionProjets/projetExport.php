<?php

namespace App\Exports\GestionProjets;

use App\Models\GestionProjets\Projet;
use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class ProjetExport implements FromCollection, WithHeadings, ShouldAutoSize, WithStyles
{
    protected $data;

    public function __construct($data)
    {
        $this->data = $data;
    }

    public function headings(): array
    {
        return [
            'nom',
            'description',
            'date_debut',
            'date_de_fin',
        ];
    }

    public function collection()
    {
        return $this->data->map(function ($project) {
            return [
                'nom' => $project->nom, 
                'description' => $project->description,
                'date_debut' => $project->date_debut,
                'date_de_fin' => $project->date_de_fin,
            ];
        });
    }


    public function styles(Worksheet $sheet)
    {
        return [
            // Style the first row as bold text.
            1 => ['font' => ['bold' => true]],
        ];
    }
}