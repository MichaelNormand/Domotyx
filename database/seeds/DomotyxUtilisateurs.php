<?php

use Illuminate\Database\Seeder;
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
            ["id" => 2, "prenom" => "Alexandre", "nom" => "Lemarier", "adresse" => "53 rue Bernier", "ville" => "Victoriaville", "code_postal" => "G6P 2P3", "province" => "Quebec", "pays" => "Canada", "courriel" => "lemarier.alexandre@carrefour.cegepvicto.ca", "telephone" => "+1(819) 460-2532", "identifiant" => "alexandre_lemarier", "mot_de_passe" => Hash::make("PENIS6969"), "image_profil" => null, "est_administrateur" => true, "est_actif" => true],
            ["id" => 3, "prenom" => "Jimmy", "nom" => "Pellerin", "adresse" => "276A rue Saint-Jean-Baptiste", "ville" => "Princeville", "code_postal" => "G6L 5A7", "province" => "Quebec", "pays" => "Canada", "courriel" => "pellerin.jimmy@carrefour.cegepvicto.ca", "telephone" => "+1(819) 990-1620", "identifiant" => "jimmy_pellerin", "mot_de_passe" => Hash::make("PENIS6969"), "image_profil" => null, "est_administrateur" => false, "est_actif" => true]
        ]);
    }
}
