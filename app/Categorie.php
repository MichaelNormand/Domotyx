<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * Class Categorie: Classe permettant de modéliser de manière objet la table categories dans la base de données.
 * @package App
 */
class Categorie extends Model {
    /**
     * Méthode permettant d'obtenir toutes les lignes d'une catégorie dans la table categorie_produit
     * @return HasMany
     */
    public function categorie_produit() : HasMany {
        return $this->hasMany( "App\CategorieProduit", "categorie_id", "id" );
    }

    /**
     * Méthode permettant d'obtenir tous les produits d'une catégorie.
     * @return BelongsToMany
     */
    public function produits() : BelongsToMany {
        return $this->belongsToMany( "App\Produit", "categorie_produit", "categorie_id", "produit_id", "id", "id" );
    }
}
