<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfessionnelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('professionnels', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('post_id');
            $table->unsignedBigInteger('user_id');
            $table->string('num_pratique')->nullable();
            $table->string('dist_max');
            $table->string('annee_exp')->nullable();
            $table->string('langue')->nullable();
            $table->string('votre_cv')->nullable();
            $table->string('statut_employe')->nullable();
            $table->string('specimen_cheque')->nullable()->default('cheque.png');
            $table->string('diplome_recent')->nullable()->default('diplome.png');
            $table->string('carte_identite')->nullable()->default('cni.png');
            $table->string('condamnations')->nullable();
            $table->string('carte_rcr')->nullable()->default('default.jpg');
            $table->string('attestation_pdsb')->nullable()->default('default.jpg');
            $table->string('adresse1')->nullable();
            $table->string('adresse2')->nullable();
            $table->string('ville')->nullable();
            $table->string('province')->nullable();
            $table->string('code_postal')->nullable();
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users');
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
        Schema::dropIfExists('professionnels');
    }
}
