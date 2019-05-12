<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * Class Achat: Classe permettant de modéliser de manière objet la table achats dans la base de données.
 * @package App
 */
class Achat extends Model {
    /**
     * Méthode permettant d'obtenir les lignes de la table achat_utilisateur.
     * @return HasMany
     */
    public function achat_utilisateur() : HasMany {
        return $this->hasMany( "App\AchatUtilisateur", "achat_id", "id" );
    }

    /**
     * Méthode permettant d'obtenir le produit liés à un achat.
     * @return BelongsTo
     */
    public function produit() : BelongsTo {
        return $this->belongsTo( "App\Produit", "produit_id", "id" );
    }

    /**
     * Méthode permettant d'obtenir les utilisateurs liés à un achat.
     * @return BelongsToMany
     */
    public function utilisateur() : BelongsToMany {
        return $this->belongsToMany( "App\Utilisateur", "achat_utilisateur", "achat_id", "utilisateur_id", "id", "id" );
    }
}
