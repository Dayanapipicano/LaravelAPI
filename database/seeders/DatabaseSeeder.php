<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Database\Seeders\ProductoSedder;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        
        $this->call(SeasonSeeder::class);
       /*  $this->call(ProductoSedder::class);  */
        $this->call(RolesAndPermissionsSeeder::class);        
    }

    
}
