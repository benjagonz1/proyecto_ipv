<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class InspeccionFactory extends Factory
{
    public function definition()
    {
        return [
            'direccion' => $this->faker->address(),
            'estado' => 'Pendiente',
        ];
    }
}
