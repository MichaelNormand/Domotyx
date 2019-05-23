<?php

namespace App\Policies;

use App\Utilisateur;
use Illuminate\Auth\Access\HandlesAuthorization;

class UtilisateurPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function edition( Utilisateur $utilisateur ) {
        return $this->checkAdministration($utilisateur);
    }

    public function suppression( Utilisateur $utilisateur ) {
        return $this->checkAdministration($utilisateur);
    }

    public function gestion( Utilisateur $utilisateur ) {
        return $this->checkAdministration($utilisateur);
    }

    private function checkAdministration( Utilisateur $utilisateur ) {
        if ($utilisateur->est_administrateur) {
            return true;
        } else {
            return false;
        }
    }
}
