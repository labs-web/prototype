<?php

namespace Database\Factories\pkg_autorisations;

use App\Models\pkg_autorisations\Action;
use Illuminate\Database\Eloquent\Factories\Factory;

class ActionFactory extends Factory
{
    protected $model = Action::class;

    public function definition()
    {
        return [
            'nom' => $this->faker->word,
            // Define other attributes as needed
        ];
    }
}
