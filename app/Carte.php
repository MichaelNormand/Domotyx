<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * Class Carte: Classe permettant de modéliser de manière objet la table cartes dans la base de données.
 * @package App
 */
class Carte extends Model {
    /**
     * Méthode permettant d'obtenir les lignes de la table carte_utilisateur ayant une certaine carte.
     * @return HasMany
     */
    public function carte_utilisateur() : HasMany {
        return $this->hasMany( "App\CarteUtilisateur", "carte_id", "id" );
    }

    /**
     * Méthode permettant d'obtenir les utilisateurs ayant une certaine carte.
     * @return BelongsToMany
     */
    public function utilisateurs() : BelongsToMany {
        return $this->belongsToMany( "App\Utilisateur", "carte_utilisateur", "carte_id", "utilisateur_id", "id", "id" );
    }
}
