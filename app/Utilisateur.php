<?php

namespace App;

use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

/**
 * Class Utilisateur: Classe permettant de modéliser de manière objet la table utilisateurs dans la base de données.
 * @package App
 */
class Utilisateur extends Authenticatable {

    use Notifiable;

    /**
     * Liste des champs qui ne doivent pas faire partie de la représentation JSON.
     *
     * @var array
     */
    protected $hidden = [
        'mot_de_passe',
        'remember_token',
    ];

    protected $fillable = [
        "identifiant",
        "mot_de_passe",
        "image_profil",
        "prenom",
        "nom",
        "courriel",
        "telephone",
        "adresse",
        "code_postal",
        "ville",
        "province",
        "pays",
        "est_detaillant",
        "est_administrateur",
        "est_actif"
    ];

    public function getAuthPassword() {
        return $this->mot_de_passe;
    }

    /**
     * Méthode permettant d'obtenir les lignes de panier d'un utilisateur.
     * @return HasMany
     */
    public function panier() : HasMany {
        return $this->hasMany( "App\Panier", "utilisateur_id", "id" );
    }

    /**
     * Méthode permettant d'obtenir les commentaires d'un utilisateur.
     * @return HasMany
     */
    public function commentaires() : HasMany {
        return $this->hasMany( "App\Commentaire", "utilisateur_id", "id" );
    }

    /**
     * Méthode permettant d'obtenir les lignes de la table achat_utilisateur d'un utilisateur
     * @return HasMany
     */
    public function achat_utilisateur() : HasMany {
        return $this->hasMany( "App\AchatUtilisateur", "utilisateur_id", "id" );
    }

    /**
     * Méthode permettant d'obtenir les lignes de la table carte_utilisateur d'un utilisateur.
     * @return HasMany
     */
    public function carte_utilisateur() : HasMany {
        return $this->hasMany( "App\CarteUtilisateur", "utilisateur_id", "id" );
    }

    /**
     * Méthode permettant d'obtenir les achats d'un utilisateur.
     * @return BelongsToMany
     */
    public function achats() : BelongsToMany {
        return $this->belongsToMany( "App\Achat", "achat_utilisateur", "utilisateur_id", "achat_id", "id", "id" );
    }

    /**
     * Méthode permettant d'obtenir les cartes d'un utilisateur.
     * @return BelongsToMany
     */
    public function cartes() : BelongsToMany {
        return $this->belongsToMany( "App\Carte", "carte_utilisateur", "utilisateur_id", "carte_id", "id", "id" );
    }

    /**
     * Méthode permettant d'obtenir les produits dans le panier de l'utilisateur.
     * @return BelongsToMany
     */
    public function produits() : BelongsToMany {
        return $this->belongsToMany( "App\Produit", "paniers", "utilisateur_id", "produit_id", "id", "id" );
    }
}
