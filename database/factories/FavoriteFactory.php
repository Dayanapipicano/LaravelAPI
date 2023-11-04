<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class FavoriteFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
           'idUser'=>$this->faker->randomElement([15451,45452]),
           'idProduct'=>$this->faker->random_int([1554,4585])
        ];
    }
}
