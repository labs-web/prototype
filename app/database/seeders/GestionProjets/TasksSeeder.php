<?php

namespace Database\Seeders\GestionProjets;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\GestionProjets\Task;

class TasksSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tasksData = [
            [
                'nom' => 'Portfolio tache',
                'description' => 'Développement d\'un site web mettant en valeur nos compétences.',
                'date_debut' => now()->addDays(2),
                'date_de_fin' => now()->addDays(20),
                'project_id' => 1
            ],
            [
                'nom' => 'Arbre des compétences tache',
                'description' => 'évaluation des compétences.',
                'date_debut' => now()->addDays(),
                'date_de_fin' => now()->addDays(35),
                'project_id' => 2
            ],
            [
                'nom' => 'CNMH tache',
                'description' => 'Diagramme de cas d\'utilisation.',
                'date_debut' => now()->addDays(2),
                'date_de_fin' => now()->addDays(25),
                'project_id' => 3
            ]
        ];

        foreach ($tasksData as $taskData) {
            Task::create($taskData);
        }
    }
}
