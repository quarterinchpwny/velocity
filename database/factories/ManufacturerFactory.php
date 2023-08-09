<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ManufacturerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'code' => $this->faker->word(),
            'manufacturer_name' => $this->faker->word(),
            'manufacturer_details' => $this->faker->sentence(),
        ];
    }
}
