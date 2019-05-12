<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UtilisateurInscriptionRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            "identifiant" => "required|max:100|unique:utilisateurs,identifiant",
            "mot_de_passe" => "required|confirmed|min:6",
            "image_profil" => "mimes:jpeg,jpg,svg,png",
            "prenom" => "required|max:100",
            "nom" => "required|max:100",
            "email" => "required|email|max:150",
            "telephone" => "nullable|max:25|regex:/^[\D]*(\d*)[\D]*(\d{3})[\D]*(\d{3})[\D]*(\d{4})[\D]*$/",
            "adresse" => "required|max:200",
            "ville" => "required|max:100",
            "code_postal" => "required|max:10|regex:/^[A-Za-z\d][A-Za-z\d][A-Za-z][ -]?[A-Za-z\d][A-Za-z\d][A-Za-z\d]$/",
            "province" => "required|max:100",
            "pays" => "required|exists:pays,nom"
        ];
    }

    public function messages()
    {
        return [
            "identifiant.required" => "Veuillez entrer un identifiant valide.",
            "identifiant.max" => "Le nombre de caractère de votre identifiant dépasse le 100 caractères.",
            "identifiant.unique" => "L'identifiant choisi a déjà été choisi.",
            "mot_de_passe.required" => "Veuillez entrer un mot de passe valide.",
            "mot_de_passe.confirmed" => "Veuillez confirmer votre mot de passe.",
            "mot_de_passe.min" => "Veuillez entrer un mot de passe d'au moins :min caractères.",
            "image_profil.mimes" => "Le format choisi de l'image est invalide.",
            "prenom.required" => "Veuillez entrer votre prénom.",
            "prenom.max" => "Le prénom entré dépasse le :max caractères.",
            "nom.required" => "Veuillez entrer votre nom.",
            "nom.max" => "Votre nom dépasse le :max caractères.",
            "email.required" => "Veuillez entrer votre adresse email.",
            "email.email" => "Veuillez entrer une adresse email valide.",
            "email.max" => "Votre adresse email dépasse le :max caractères.",
            "telephone.max" => "Votre numéro de téléphone dépasse le :max caractères.",
            "telephone.regex" => "Veuillez entrer un numéro de téléphone valide.",
            "adresse.required" => "Veuillez entrer votre adresse.",
            "adresse.max" => "Votre adresse dépasse le :max caractères.",
            "ville.required" => "Veuillez entrer votre ville de résidence.",
            "ville.max" => "Votre ville de résidence dépasse le :max caractères.",
            "code_postal.required" => "Veuillez entrer votre code postal.",
            "code_postal.max" => "Votre code postal dépasse le :max caractères.",
            "code_postal.regex" => "Veuillez entrer un code postal valide.",
            "province.required" => "Veuillez entrer votre la province dans laquelle vous résidez.",
            "province.max" => "La province entrée dépasse le :max caractères.",
            "pays.required" => "Veuillez sélectionner votre pays.",
            "pays.exists" => "Le pays choisi est invalide."
        ];
    }
}
