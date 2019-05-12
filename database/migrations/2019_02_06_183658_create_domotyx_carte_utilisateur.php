<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDomotyxCarteUtilisateur extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('carte_utilisateur', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->integer("carte_id")->unsigned()->nullable();
            $table->integer("utilisateur_id")->unsigned()->nullable();
            $table->timestamps();
            $table->foreign("carte_id")->references("id")->on("cartes");
            $table->foreign("utilisateur_id")->references("id")->on("utilisateurs");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('carte_utilisateur');
    }
}
