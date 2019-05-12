<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDomotyxCategorieProduit extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categorie_produit', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->integer("categorie_id")->unsigned()->nullable();
            $table->integer("produit_id")->unsigned()->nullable();
            $table->timestamps();
            $table->foreign("categorie_id")->references("id")->on("categories");
            $table->foreign("produit_id")->references("id")->on("produits");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('categorie_produit');
    }
}
