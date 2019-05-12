<?php

use Illuminate\Database\Seeder;

class DomotyxCarteUtilisateur extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("carte_utilisateur")->insert([
            ["carte_id" => 1, "utilisateur_id" => 1],
            ["carte_id" => 2, "utilisateur_id" => 1]
        ]);
    }
}
