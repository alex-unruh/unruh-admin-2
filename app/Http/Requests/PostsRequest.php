<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class PostsRequest extends FormRequest
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
            'title' => 'required|string|between:5,191',
            'slug'  => ['required', 'string', 'between:5,191', Rule::unique('posts', 'slug')->ignore($this->id)],
            'excerpt' => 'nullable|string|min:10',
            'gallery_id' => 'nullable|exists:galleries,id',
            'meta_description' => 'nullable|string|between:5,191',
            'content' => 'required|string|min:10',
            'image' => 'nullable|string|between:5,191',
            'categories' => 'sometimes|array'
        ];
    }
}
