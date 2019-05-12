<?php

use Illuminate\Database\Seeder;

class DomotyxPaniers extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("paniers")->insert([
            ["utilisateur_id" => 1, "produit_id" => 1, "quantite" => 1],
            ["utilisateur_id" => 1, "produit_id" => 2, "quantite" => 2]
        ]);
    }
}
