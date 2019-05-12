<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Class Panier: Classe permettant de modéliser de manière objet la table paniers dans la base de données.
 * @package App
 */
class Panier extends Model {
    /**
     * Méthode permettant d'obtenir l'utilisateur d'un panier.
     * @return BelongsTo
     */
    public function utilisateur() : BelongsTo {
        return $this->belongsTo( "App\Utilisateur", "utilisateur_id", "id" );
    }

    /**
     * Méthode permettant d'obtenir le produit d'une ligne du panier.
     * @return BelongsTo
     */
    public function produits() : BelongsTo {
        return $this->belongsTo( "App\Produit", "produit_id", "id" );
    }
}
