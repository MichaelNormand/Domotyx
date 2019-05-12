<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDomotyxAchats extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('achats', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->integer("produit_id")->unsigned()->nullable();
            $table->dateTime("date");
            $table->integer("quantite");
            $table->timestamps();
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
        Schema::dropIfExists('achats');
    }
}
