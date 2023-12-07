<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class TypePayFactory extends Factory
{
    public function definition()
    {
            return [
                'name' => 'Tarjeta de credito', // Comienza con Primavera
            ]; 
        }
    
        public function efectivo()
        {
            return $this->state([
                'name' => 'Pago en efectivo',
            ]);
        }
    
        public function online()
        {
            return $this->state([
                'name' => 'Pago en linea',
            ]);
        }
    
  
}
