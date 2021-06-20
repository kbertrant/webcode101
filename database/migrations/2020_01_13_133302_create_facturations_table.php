<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFacturationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('facturations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('quart_id');
            $table->string('heure_jour')->default('0');
            $table->string('supp_jour')->default('0');
            $table->string('heure_soir')->default('0');
            $table->string('supp_soir')->default('0');
            $table->string('heure_nuit')->default('0');
            $table->string('supp_nuit')->default('0');
            $table->string('facturation_residence')->nullable();
            $table->string('remuneration_pro')->nullable();            
            $table->timestamps();

            $table->foreign('quart_id')->references('id')->on('quartdetravails');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('facturations');
    }
}
