<?php

use Illuminate\Database\Seeder;

class DomotyxCategories extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("categories")->insert([
            ["id" => 1, "nom" => "Any", "image_url" => null],
            ["id" => 2, "nom" => "Lite Modules", "image_url" => "medias/commun/lite_module.jpg"],
            ["id" => 3, "nom" => "Room Module", "image_url" => "medias/commun/room_module.jpg"]
        ]);
    }
}
