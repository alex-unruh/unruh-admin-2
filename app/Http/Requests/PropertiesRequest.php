<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PropertiesRequest extends FormRequest
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
            'type' => 'required|string|min:3',
            'purpose' => 'required|string|min:3',
            'uf' => 'required|string|size:2',
            'city' => 'required|string|min:3',
            'district' => 'nullable|string|min:5',
            'address' => 'nullable|string|min:5',
            'number' => 'nullable|string|min:1',
            'value' => 'nullable|string|min:1',
            'value_m2' => 'sometimes|boolean',
            'excerpt' => 'nullable|string|min:5',
            'gallery_id' => 'nullable|exists:galleries,id',
            'meta_description' => 'nullable|string|between:5,191',
            'content' => 'nullable|string|min:5',
            'image' => 'nullable|string|between:5,191',
            'categories' => 'sometimes|array',
            'details' => 'sometimes|array',
        ];
    }
}
