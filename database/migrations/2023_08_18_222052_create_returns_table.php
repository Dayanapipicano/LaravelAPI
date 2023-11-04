<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReturnsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('returns', function (Blueprint $table) {
            $table->id();
            $table->text("reason");
            $table->unsignedBigInteger("idOrder")->nullable();
            $table->foreign("idOrder")->references("id")->on("orders")->onDelete("cascade");
            
            $table->unsignedBigInteger("idPqr")->nullable();
            $table->foreign("idPqr")->references("id")->on("p_q_r_s")->onDelete("cascade");
            
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
        Schema::dropIfExists('returns');
    }
}
