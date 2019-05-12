<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CommentairesRequest extends FormRequest
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
            "nom" => "nullable|max:150",
            "prenom" => "nullable|max:150",
            "courriel" => "required|max:250",
            "commentaire" => "required"
        ];
    }
}
