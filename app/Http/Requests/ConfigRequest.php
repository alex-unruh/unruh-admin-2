<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class ConfigRequest extends FormRequest
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
            'titulo' => 'required|string|between:4,190',
            'meta_descricao' => 'required|string|between:4,190',
            'telefone' => 'nullable|string|between:12,15',
            'whatsapp' => 'nullable|string|between:12,15',
            'email'    => 'required|email',
            'facebook' => 'nullable|url',
            'instagram' => 'nullable|url',
            'twitter' => 'nullable|url',
            'imagem' => 'nullable|string|min:4'
        ];
    }
}
