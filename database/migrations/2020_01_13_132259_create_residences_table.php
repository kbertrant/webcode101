<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateResidencesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('residences', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('resp_id');
            $table->string('res_name');
            $table->string('res_phone');
            $table->string('facture_name')->nullable();
            $table->string('facture_email')->nullable();
            $table->string('facture_phone')->nullable();
            $table->string('res_adresse1')->nullable();
            $table->string('res_adresse2')->nullable();
            $table->string('res_ville')->nullable();
            $table->string('res_province')->nullable();
            $table->string('res_code_postal')->nullable();
            $table->string('res_temps_repas')->nullable()->default('30');
            $table->timestamps();

            $table->foreign('resp_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('residences');
    }
}
