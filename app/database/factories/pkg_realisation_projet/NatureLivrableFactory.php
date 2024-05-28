<?php

namespace Database\Factories\pkg_realisation_projet;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\pkg_realisation_projet\NatureLivrable>
 */
class NatureLivrableFactory extends Factory
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
