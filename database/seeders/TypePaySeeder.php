<?php

namespace Database\Seeders;

use App\Models\TypePay;
use Illuminate\Database\Seeder;

class TypePaySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        TypePay::factory()->create(); 
        TypePay::factory()->efectivo()->create();
        TypePay::factory()->online()->create(); 
         
        
    }
}
