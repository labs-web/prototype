<?php
// database/factories/pkg_realisation_projet/LivrableFactory.php

namespace Database\Factories\pkg_realisation_projet;

use App\Models\pkg_realisation_projet\Livrable;
use Illuminate\Database\Eloquent\Factories\Factory;

class LivrableFactory extends Factory
{
    protected $model = Livrable::class;

    public function definition()
    {
        return [
            'titre' => $this->faker->sentence,
            'lien' => $this->faker->url,
            'description' => $this->faker->paragraph,
            'nature_livrable_id' => 1, // Remplacez cela par une valeur réelle ou utilisez une relation pour le récupérer dynamiquement
        ];
    }
}
