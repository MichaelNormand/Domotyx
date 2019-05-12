<?php

use Illuminate\Database\Seeder;

class DomotyxCategorieProduit extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("categorie_produit")->insert([
            ["categorie_id" => 2, "produit_id" => 1],
            ["categorie_id" => 2, "produit_id" => 2],
            ["categorie_id" => 3, "produit_id" => 1]
        ]);
    }
}
