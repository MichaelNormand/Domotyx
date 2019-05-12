<?php

use Illuminate\Database\Seeder;

class DomotyxCartes extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("cartes")->insert([
            ["id" => 1, "numero" => "4506123456789012", "ccv" => "123", "date_expiration" => "2021/03/01", "prenom_titulaire" => "Michael", "nom_titulaire" => "Normand"],
            ["id" => 2, "numero" => "1234567890123456", "ccv" => "001", "date_expiration" => "2023/03/01", "prenom_titulaire" => "Michael", "nom_titulaire" => "Normand"]
        ]);
    }
}
