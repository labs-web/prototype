<?php

namespace Database\Factories\pkg_autorisations;

use App\Models\pkg_autorisations\Controller;
use Illuminate\Database\Eloquent\Factories\Factory;

class ControllerFactory extends Factory
{
    protected $model = Controller::class;

    public function definition()
    {
        return [
            'nom' => $this->faker->unique()->word,
          
        ];
    }
}
