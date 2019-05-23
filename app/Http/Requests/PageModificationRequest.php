<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PageModificationRequest extends FormRequest
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
            "page_id" => "required|exists:pages,id",
            "titre" => "required|max:100",
            "contenu" => "nullable"
        ];
    }
}
