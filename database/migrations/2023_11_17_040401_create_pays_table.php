<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pays', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("idOrder")->nullable();
            $table->foreign("idOrder")->references("id")->on("orders")->onDelete("cascade");
            
            $table->unsignedBigInteger("idTypePay")->nullable();
            $table->foreign("idTypePay")->references("id")->on("type_pays")->onDelete("cascade");
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pays');
    }
}
