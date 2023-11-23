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
            'name' => 'DIOR Sauvage',
            'description' => substr($this->faker->paragraph, 0, 100),
            'idSeason' => 1,
            'concentration' => $this->faker->randomFloat(2, 10, 1000),
            'price' => $this->faker->randomFloat(2, 10, 1000),
            'image' => function () {
                // Verificar si la carpeta product existe, si no, crearla
                $productDirectory = storage_path('app/public/product');
                if (!file_exists($productDirectory)) {
                    mkdir($productDirectory, 0755, true);
                }
        
                // Generar un nombre de archivo único basado en la marca de tiempo y la extensión original
                $imageName = time() . '.' . $this->faker->fileExtension;
        
                // Utilizar el método storeAs para almacenar la imagen en la carpeta product
                $this->faker->image($productDirectory, 400, 300, null, false);
        
                // Devolver el nombre de la imagen generada
                return $imageName;
            },
        ];
    }
}
