<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDomotyxUtilisateurs extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('utilisateurs', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->string("image_profil", 200)->nullable();
            $table->string("identifiant", 100);
            $table->string("mot_de_passe", 60);
            $table->string("prenom", 100);
            $table->string("nom", 100);
            $table->string("courriel", 150);
            $table->string("telephone", 25)->nullable();
            $table->string("adresse", 200);
            $table->string("code_postal", 10);
            $table->string("ville", 100);
            $table->string("province", 100);
            $table->string("pays", 100);
            $table->boolean("est_administrateur")->nullable()->default(false);
            $table->boolean("est_actif")->nullable()->default(true);
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('utilisateurs');
    }
}
