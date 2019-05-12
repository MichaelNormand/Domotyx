<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * Class Produit: Classe permettant de modéliser de manière objet la table produits dans la base de données.
 * @package App
 */
class Produit extends Model {

    /**
     * @var array Champ contenant les champs de la table qui peuvent être remplis.
     */
    protected $fillable = [ "nom", "prix", "description" ];

    /**
     * Méthode permettant d'obtenir les lignes des paniers contenant le produit.
     * @return HasMany
     */
    public function paniers() : HasMany {
        return $this->hasMany( "App\Panier", "produit_id", "id" );
    }

    /**
     * Méthode permettant d'obtenir les commentaires d'un produit.
     * @return HasMany
     */
    public function commentaires() : HasMany {
        return $this->hasMany( "App\Commentaire", "produit_id", "id" );
    }

    /**
     * Méthode permettant d'obtenir les achats d'un produit.
     * @return HasMany
     */
    public function achats() : HasMany {
        return $this->hasMany( "App\Achat", "produit_id", "id" );
    }

    /**
     * Méthode permettant d'obtenir les lignes de la table categorie_produit contenant le produit.
     * @return HasMany
     */
    public function categorie_produit() : HasMany {
        return $this->hasMany( "App\CategorieProduit", "produit_id", "id" );
    }

    /**
     * Méthode permettant d'obtenir les catégories d'un produit.
     * @return BelongsToMany
     */
    public function categories() : BelongsToMany {
        return $this->belongsToMany( "App\Categorie", "categorie_produit", "produit_id", "categorie_id", "id", "id" );
    }

    /**
     * Méthode permettant d'obtenir les utilisateurs ayant le produit dans leur panier.
     * @return BelongsToMany
     */
    public function utilisateurs() : BelongsToMany {
        return $this->belongsToMany( "App\Utilisateur", "paniers", "produit_id", "utilisateur_id", "id", "id" );
    }
}
