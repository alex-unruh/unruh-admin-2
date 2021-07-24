<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class UsersRequest extends FormRequest
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
      'name'     => 'required|string|between:3,100',
      'email'    => ['required', 'email', Rule::unique('users')->ignore($this->id)],
      'password' => 'nullable|confirmed|between:6,30',
      'status'   => ['required', Rule::in(['Ativo', 'Inativo'])],
      'profile'  => ['required', Rule::in(config('admin.user_profiles'))],
      'photo'    => 'nullable|string|between:4,200'
    ];
  }
}
