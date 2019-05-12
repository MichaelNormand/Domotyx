<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UtilisateurConnexionRequest extends FormRequest
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
            "identifiant" => "required|max:100",
            "mot_de_passe" => "required"
        ];
    }

    public function messages()
    {
        return [
            "mot_de_passe.required" => "Veuillez entrer votre mot de passe.",
            "identifiant.required" => "Veuillez entrer un identifiant existant.",
            "identifiant.max" => "Le nombre de caractère de votre identifiant est trop long."
        ];
    }
}
