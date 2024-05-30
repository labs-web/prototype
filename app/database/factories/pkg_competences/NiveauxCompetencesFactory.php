<?php

namespace Database\Factories\pkg_competences;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\pkg_competences\NiveauCompetence>
 */
class NiveauxCompetencesFactory extends Factory
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
        ];
    }
}
