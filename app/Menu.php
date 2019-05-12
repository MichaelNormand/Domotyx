<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Menu: Classe permettant de modéliser de manière objet la table menu dans la base de données.
 * @package App
 */
class Menu extends Model {
    /**
     * @var string Champ contenant le nom de la table de la classe.
     */
    protected $table = "menu";
}
