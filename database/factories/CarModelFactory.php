<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class CarModelFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'code' => $this->faker->randomDigit(),
            'name' => $this->faker->name(),
            'daily_hire_rate' => $this->faker->randomDigit(),
        ];
    }
}
