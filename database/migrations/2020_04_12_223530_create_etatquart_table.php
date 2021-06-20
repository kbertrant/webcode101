<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEtatquartTable extends Migration
{
   /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dateetats', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('quart_id');
            $table->unsignedBigInteger('user_id');
            $table->string('etatquart')->nullable();
            $table->datetime('date_etat')->nullable();
            $table->timestamps();
            $table->foreign('quart_id')->references('id')->on('quartdetravails');
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dateetats');
    }
}
