<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(DomotyxCartes::class);
        $this->call(DomotyxCategories::class);
        $this->call(DomotyxUtilisateurs::class);
        $this->call(DomotyxProduits::class);
        $this->call(DomotyxCarteUtilisateur::class);
        $this->call(DomotyxCategorieProduit::class);
        $this->call(DomotyxPaniers::class);
        $this->call(DomotyxCommentaires::class);
        $this->call(DomotyxMenu::class);
        $this->call(DomotyxPays::class);
        $this->call(DomotyxPages::class);
    }
}
