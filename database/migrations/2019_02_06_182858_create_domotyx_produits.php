<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDomotyxProduits extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produits', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->text("image_url")->nullable();
            $table->string("nom", 100);
            $table->float("prix");
            $table->float("rabais")->nullable();
            $table->longText("description");
            $table->boolean("actif")->nullable();
            $table->integer("utilisateur_id")->unsigned();
            $table->timestamps();
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
        Schema::dropIfExists('produits');
    }
}
