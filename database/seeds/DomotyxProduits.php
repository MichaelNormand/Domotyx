<?php

use Illuminate\Database\Seeder;

class DomotyxProduits extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        date_default_timezone_set("America/New_York");
        $date = now();
        DB::table('produits')->insert([
            ["id" => 1, "nom" => "Latching Switch", "prix" => 29.99, "description" => "Switch intelligente", "actif" => 1, "created_at" => "$date", "image_url" => "medias/commun/latching_switch.jpg", "utilisateur_id" => 1],
            ["id" => 2, "nom" => "Blind Opener", "prix" => 109.99, "description" => "Module permettant d'ouvrir des rideaux automatiquement.", "actif" => 1, "created_at" => "$date", "image_url" => "medias/commun/blind_module.jpg", "utilisateur_id" => 1],
            ["id" => 3, "nom" => "Bed Maker", "prix" => 299.99, "description" => "Module permettant de placer les draps sur un lit automatiquement.", "actif" => 1, "created_at" => "$date", "image_url" => "medias/commun/bed_maker.jpg", "utilisateur_id" => 1]
        ]);
    }
}
