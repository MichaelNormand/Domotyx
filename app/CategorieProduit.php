<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Class CategorieProduit: Classe permettant de modéliser de manière objet la table categorie_produit dans la base de données.
 * @package App
 */
class CategorieProduit extends Model {
    /**
     * @var string Champ contenant le nom de la table de la classe.
     */
    protected $table = "categorie_produit";

    /**
     * Méthode permettant d'obtenir la catégorie d'une ligne de la table categorie_produit.
     * @return BelongsTo
     */
    public function categorie() : BelongsTo {
        return $this->belongsTo( "App\Categorie", "categorie_id", "id" );
    }

    /**
     * Méthode perettant d'obtenir le produit d'une ligne de la table categorie_produit.
     * @return BelongsTo
     */
    public function produit() : BelongsTo {
        return $this->belongsTo( "App\Produit", "produit_id", "id" );
    }
}
