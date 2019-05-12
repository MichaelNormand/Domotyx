<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Class CarteUtilisateur: Classe permettant de modéliser de manière objet la table carte_utilisateur dans la base de données.
 * @package App
 */
class CarteUtilisateur extends Model {
    /**
     * @var string Champ contenant le nom de la table de la classe.
     */
    protected $table = "carte_utilisateur";

    /**
     * Méthode permettant d'obtenir la carte d'une certaine ligne de la table.
     * @return BelongsTo
     */
    public function carte() : BelongsTo {
        return $this->belongsTo( "App\Carte", "carte_id", "id" );
    }

    /**
     * Méthode permettant d'obtenir l'utilisateur d'une certaine ligne de la table.
     * @return BelongsTo
     */
    public function utilisateur() : BelongsTo {
        return $this->belongsTo( "App\Utilisateur", "utilisateur_id", "id" );
    }
}
