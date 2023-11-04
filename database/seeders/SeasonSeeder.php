<?php

namespace Database\Seeders;

use App\Models\Season;
use Illuminate\Database\Seeder;

class SeasonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Season::factory()->create(); 
        Season::factory()->verano()->create();
        Season::factory()->otoño()->create(); 
        Season::factory()->invierno()->create(); 
         
        
    }
}
