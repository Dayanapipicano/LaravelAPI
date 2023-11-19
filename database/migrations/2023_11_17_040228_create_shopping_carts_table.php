<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShoppingCartsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shopping_carts', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("idUser")->nullable();
            $table->foreign("idUser")->references("id")->on("users")->onDelete("cascade");
            $table->unsignedBigInteger("idProduct")->nullable();
            $table->foreign("idProduct")->references("id")->on("products")->onDelete("cascade");
            $table->integer("product_quantity");
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
        Schema::dropIfExists('shopping_carts');
    }
}
