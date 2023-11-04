<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class SeasonFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
            return [
                'name' => 'Primavera', // Comienza con Primavera
            ]; 
        }
    
        public function verano()
        {
            return $this->state([
                'name' => 'Verano',
            ]);
        }
    
        public function otoño()
        {
            return $this->state([
                'name' => 'Otoño',
            ]);
        }
    
        public function invierno()
        {
            return $this->state([
                'name' => 'Invierno',
            ]);
        }
    
}
