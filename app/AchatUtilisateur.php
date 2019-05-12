<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Class AchatUtilisateur: Classe permettant de modéliser de manière objet la table achat_utilisateur dans la base de données.
 * @package App
 */
class AchatUtilisateur extends Model {
    /**
     * @var string: Champ contenant le nom de la table dans la base de données.
     */
    protected $table = "achat_utilisateur";

    /**
     * Méthode permettant d'obtenir un achat dans un achat_utilisateur.
     * @return BelongsTo
     */
    public function achat() : BelongsTo {
        return $this->belongsTo( "App\Achat", "achat_id", "id" );
    }

    /**
     * Méthode permettant d'obtenir un utilisateur dans un achat_utilisateur
     * @return BelongsTo
     */
    public function utilisateur() : BelongsTo {
        return $this->belongsTo( "App\Utilisateur", "utilisateur_id", "id" );
    }
}
