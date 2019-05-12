<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDomotyxPaniers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('paniers', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->integer("utilisateur_id")->unsigned()->nullable();
            $table->integer("produit_id")->unsigned()->nullable();
            $table->integer("quantite");
            $table->timestamps();
            $table->foreign("produit_id")->references('id')->on('produits');
            $table->foreign("utilisateur_id")->references('id')->on('utilisateurs');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('paniers');
    }
}
