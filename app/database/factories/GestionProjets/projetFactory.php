<?php

namespace Database\Factories\GestionProjets;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\projets\projet>
 */
class projetFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nom' => fake()->text(7),
            'description' => fake()->text(10),
            'date_debut' => fake()->date(),
            'date_de_fin' => fake()->date(),
        ];
    }
}
