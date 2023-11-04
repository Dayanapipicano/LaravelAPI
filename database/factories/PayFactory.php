<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PayFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            //
            'idOrder'=>$this->faker->randomElemennt([4551,4858]),
            'idTypePay'=>$this->faker->randomElement([5524,4585])
        ];
    }
}
