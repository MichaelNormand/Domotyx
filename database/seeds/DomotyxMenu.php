<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DomotyxMenu extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("menu")->insert([
            ["id" => 1, "titre" => "Accueil", "layout" => "pages.accueil", "ordre" => 1, "parent_id" => null],
        ]);
    }
}
