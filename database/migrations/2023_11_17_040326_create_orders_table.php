<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
           /*  $table->date("dateOrder"); */
            $table->unsignedBigInteger("idShoppingCart")->nullable();
            $table->foreign("idShoppingCart")->references("id")->on("type_pays")->onDelete("cascade");
            $table->unsignedBigInteger("idTypePay")->nullable();
            $table->foreign("idTypePay")->references("id")->on("")->onDelete("cascade");
            
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
        Schema::dropIfExists('orders');
    }
}
