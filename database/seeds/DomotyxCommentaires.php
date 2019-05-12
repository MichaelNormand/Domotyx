<?php

use Illuminate\Database\Seeder;

class DomotyxCommentaires extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("commentaires")->insert([
            ["prenom" => "Toto", "nom" => "Lacasse", "courriel" => "toto@gmail.com", "url" => "/", "date" => new DateTime("2019-02-28"), "commentaire" => "Votre site est une vraie mine d'or."],
            ["prenom" => "Annie", "nom" => "Gagnon", "courriel" => "anniegagnon@gmail.com", "url" => "contact", "date" => new DateTime("2019-03-10"), "commentaire" => "Bonjour, j'aurais besoin de plus d'informations sur vos produits. Est-ce qu'un représentant pourrait me contacter? Merci!"],
            ["prenom" => "Luc", "nom" => "Courtois", "courriel" => "luc.courtois@hotmail.com", "url" => "/", "date" => new DateTime("2019-03-12"), "commentaire" => "Beau site !"]
        ]);
    }
}
