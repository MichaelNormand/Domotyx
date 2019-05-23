<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DomotyxUtilisateurs extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("utilisateurs")->insert([
            ["id" => 1, "prenom" => "Michael", "nom" => "Normand", "adresse" => "997 route Therrien", "ville" => "Sainte-Clotilde-de-Horton", "code_postal" => "J0A 1H0", "province" => "Quebec", "pays" => "Canada", "courriel" => "normand.michael@carrefour.cegepvicto.ca", "telephone" => "+1(819) 352-1016", "identifiant" => "michael_normand", "mot_de_passe" => Hash::make("NORM76090004"), "image_profil" => "medias/commun/images_profil/image_profil.jpg", "est_administrateur" => true, "est_actif" => true],
            ["id" => 4, "prenom" => "Administrateur", "nom" => "Domotyx", "adresse" => "1010 boulevard de l'Électronique", "ville" => "Silicon Valley", "code_postal" => "G1Q OQP", "province" => "Californie", "pays" => "États-Unis", "courriel" => "admin@domotyx.org", "telephone" => "+1(819) 352-1016", "identifiant" => "admin", "mot_de_passe" => Hash::make("AdminDomotyx123"), "image_profil" => null, "est_administrateur" => true, "est_actif" => true]
        ]);
    }
}
