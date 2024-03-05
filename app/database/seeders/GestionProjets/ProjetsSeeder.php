<?php

namespace Database\Seeders\GestionProjets;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\projets\projet;

class ProjetsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $projetsData = [
            [
                'nom' => 'Portfolio',
                'description' => 'Développement d\'un site web mettant en valeur nos compétences.',
                'date_debut' => now()->addDays(2),
                'date_de_fin' => now()->addDays(20),
            ],
            [
                'nom' => 'Arbre des compétences',
                'description' => 'Création d\'une application web pour l\'évaluation des compétences.',
                'date_debut' => now()->addDays(),
                'date_de_fin' => now()->addDays(35),
            ],
            [
                'nom' => '  CNMH',
                'description' => 'Création d\'une application web pour laa gestion des patients de centre cnmh.',
                'date_debut' => now()->addDays(2),
                'date_de_fin' => now()->addDays(25),
            ]
        ];

        foreach ($projetsData as $projetData) {
            Projet::create($projetData);
        }
    }
}
