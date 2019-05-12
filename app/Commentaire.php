<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Class Commentaire: Classe permettant de modéliser de manière objet la table commentaires dans la base de données.
 * @package App
 */
class Commentaire extends Model
{
    protected $fillable = [ "prenom", "nom", "courriel", "commentaire", "date" ];
}
