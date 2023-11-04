<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PqrFactory extends Factory
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
            'reason'=>$this->faker->paragraph(),
            'idUser'=>$this->faker->randomElement([1245,8564])
        
        ];
    }
}
