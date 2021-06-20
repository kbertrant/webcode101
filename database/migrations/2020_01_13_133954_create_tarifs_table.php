<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTarifsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tarifs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('res_id');
            $table->unsignedBigInteger('post_id');
            $table->string('tarif_jour')->nullable();
            $table->string('tarif_soir')->nullable();
            $table->string('tarif_nuit')->nullable();            
            $table->timestamps();

            $table->foreign('res_id')->references('id')->on('residences');
            $table->foreign('post_id')->references('id')->on('postes');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tarifs');
    }
}
