<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class GalleriesRequest extends FormRequest
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
			'name'                  => 'required|string|between:2,191',
			'slug'                  => ['required', 'string', 'between:2,191', Rule::unique('galleries')->ignore($this->id)],
			'gallery.*.path'        => 'nullable|string|max:191',
			'gallery.*.title'       => 'nullable|string|max:191',
			'gallery.*.description' => 'nullable|string|max:191',
			'gallery.*.link'        => 'nullable|string|max:191',
		];
	}
}
