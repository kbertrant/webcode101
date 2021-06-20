<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddInfosUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('phone')->nullable();
            $table->string('cle101')->nullable();
            $table->boolean('first_auth')->nullable()->default(1);
            $table->string('photo')->default('default.png');          
            $table->string('status')->default('desactiver');
            $table->boolean('role_id')->default(0); 
            $table->string('role');

            $table->foreign('role_id')->references('id')->on('roles');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn([
                'phone','status','role_id','cle101'
            ]);
        });
    }
}
