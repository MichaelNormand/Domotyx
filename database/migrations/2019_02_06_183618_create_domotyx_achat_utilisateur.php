<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDomotyxAchatUtilisateur extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('achat_utilisateur', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->integer("achat_id")->unsigned();
            $table->integer("utilisateur_id")->unsigned()->nullable();
            $table->timestamps();
            $table->foreign("achat_id")->references("id")->on("achats");
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
        Schema::dropIfExists('achat_utilisateur');
    }
}
