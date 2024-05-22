<?php
// database/factories/pkg_realisation_projet/NatureLivrableFactory.php

namespace Database\Factories\pkg_realisation_projet;

use App\Models\pkg_realisation_projet\NatureLivrable;
use Illuminate\Database\Eloquent\Factories\Factory;

class NatureLivrableFactory extends Factory
{
    protected $model = NatureLivrable::class;

    public function definition()
    {
        return [
            'nom' => $this->faker->word,
            'description' => $this->faker->sentence,
        ];
    }
}
