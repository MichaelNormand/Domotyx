<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProduitRequest extends FormRequest
{
    /**
     * Méthode permettant d'autoriser la requête.
     * @return bool
     */
    public function authorize() {
        return true;
    }

    /**
     * Fonction contenant toutes les règles de validation de l'item.
     * @return array
     */
    public function rules() {
        return [
            "nom" => "required|max:100",
            "prix" => "numeric|required|min:0.00|max:10000",
            "description" => "required|max:2147483647",
            "image_produit" => "required",
            "image_produit.*" => "mimes:jpeg,jpg,svg,png",
            "categories" => "required",
            "categories.*" => "exists:categories,nom"
        ];
    }

    /**
     * Méthode contenant tous les messages spéciaux de validation.
     * @return array
     */
    public function messages() {
        return [
            "image_produit.required" => "Le produit doit avoir une image.",
            "image_produit.*.mimes" => "L'image du produit doit être une extension JPEG, JPG, PNG ou SVG.",
            "categories.required" => "Vous devez choisir au minimum une catégorie valide.",
            "categories.*.exists" => "La ou les catégories sélectionnées sont invalides",
            "prix.max" => "Le prix maximal du produit doit être de 10 000 $.",
            "prix.min" => "Le prix minimal du produit doit être de 0.00 $.",
            "prix.required" => "Le produit doit avoir un prix."
        ];
    }
}
