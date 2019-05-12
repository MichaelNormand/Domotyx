<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ModificationProduitRequest extends FormRequest
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
            "nom" => "required|max:100",
            "prix" => "required|numeric|max:10000.00|min:0.00",
            "description" => "required",
            "actif" => "nullable",
            "afficherRabais" => "nullable",
            "rabais" => "nullable|numeric|max:10000.00|min:0.00",
            "image_produit" => "nullable|mimes:jpeg,jpg,svg,png"
        ];
    }

    public function messages()
    {
        return [
            "nom.required" => "Veuillez entrez un nom de produit.",
            "nom.max" => "Le nom entré est trop long.",
            "prix.required" => "Veuillez entrer un prix.",
            "prix.numeric" => "Veuillez entrer une valeur numérique pour le prix.",
            "prix.max" => "Votre prix dépasse le 10 000$.",
            "prix.min" => "Votre prix ne peut pas être en dessous de 0$.",
            "description.required" => "Veuillez entrer une description de produit."
        ];
    }
}
