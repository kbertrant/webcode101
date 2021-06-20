<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuartdetravailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quartdetravails', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('post_id');
            $table->unsignedBigInteger('res_id');
            $table->unsignedBigInteger('pro_id')->nullable();
            $table->string('titre')->nullable();
            $table->date('jour_debut');
            $table->date('jour_fin');
            $table->string('heure_debut');
            $table->string('heure_fin');
            $table->string('heure_sup')->nullable()->default('0');
            $table->string('quart_etat')->default('Disponible');
            $table->string('temps_repas')->nullable()->default('30');
            $table->string('commentaires')->nullable();
            $table->string('note')->nullable();
            $table->string('notif')->default('0');
            $table->string('mask_residence')->default('non');
            $table->string('facteur')->default('1');
            $table->string('departement')->nullable()->default('Non attribué');
            $table->timestamps();

            $table->foreign('res_id')->references('id')->on('residences');
            $table->foreign('pro_id')->references('id')->on('users');
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
        Schema::dropIfExists('quartdetravails');
    }
}
