<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DomotyxPages extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("pages")->insert([
            ["id" => 1, "url" => "/", "titre" => "Page d'Accueil", "h1" => "LA PLATEFORME DE VENTE DE L'ENTREPRISE CONNECTÉE LA PLUS RÉPUTÉE AU MONDE!", "contenu" => "<p>Contenu</p>"],
        ]);
    }
}
