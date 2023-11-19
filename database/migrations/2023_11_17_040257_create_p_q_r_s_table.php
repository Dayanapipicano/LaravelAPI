<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePQRSTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('p_q_r_s', function (Blueprint $table) {
            $table->id();
            $table->text("reason");
            $table->unsignedBigInteger("idUser")->nullable();
            $table->foreign("idUser")->references("id")->on("users")->onDelete("cascade");
            
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
        Schema::dropIfExists('p_q_r_s');
    }
}
