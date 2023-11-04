<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
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
            'name'=>'DIOR Sauvage',
            'description' => substr($this->faker->paragraph, 0, 100), // Limita la descripción a 255 caracteres
            'idSeason'=> 1 ,

            "image"=>$this->faker->randomElement(['img13e2131e2qr1132','pngewf34493r3w9']),
            'concentration' => $this->faker->randomFloat(2, 10, 1000), 
            'price' => $this->faker->randomFloat(2, 10, 1000), // Precio aleatorio con 2 decimales entre 10 y 1000
            
            
        ];
    }
}
