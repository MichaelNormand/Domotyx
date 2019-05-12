<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDomotyxMenu extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('menu', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->string("titre", 40);
            $table->text("layout");
            $table->float("ordre");
            $table->integer("parent_id")->unsigned()->nullable();
            $table->boolean("pour_detaillants")->default(false);
            $table->timestamps();
            $table->foreign("parent_id")->references("id")->on("menu");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('menu');
    }
}
