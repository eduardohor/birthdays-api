<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
{
  /**
   * Determine if the user is authorized to make this request.
   */
  public function authorize(): bool
  {
    return true;
  }

  /**
   * Get the validation rules that apply to the request.
   *
   * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
   */
  public function rules(): array
  {
    return [
      'name' => 'required|string|min:5|max:255',
      'email' => 'required|email|unique:users|max:100',
      'password' => 'required|min:5|max:45',
      'telephone' => 'string|size:11',
      'is_admin' => 'boolean'
    ];
  }

  /**
   * Get the error messages for the defined validation rules.
   *
   * @return array<string, string>
   */
  public function messages(): array
  {
    return [
      'name.required' => 'O campo nome é obrigatório',
      'name.string' => 'O campo nome deve ser do tipo texto',
      'name.min' => 'O campo nome deve ter no mínimo 5 caracteres',
      'name.max' => 'O campo nome deve ter no máximo 255 caracteres',
      'email.required' => 'O campo e-mail é obrigatório',
      'email.email' => 'O campo deve ser do tipo e-mail',
      'email.unique' => 'O e-mail já existe na base de dados',
      'email.max' => 'O campo e-mail deve ter no máximo 100 caracteres',
      'password.required' => 'O campo password é obrigatório',
      'password.min' => 'O campo senha deve ter no mínimo 5 caracteres',
      'password.max' => 'O campo senha deve ter no máximo 45 caracteres',
      'telephone.string' => 'O campo telefone deve ser do tipo texto',
      'telephone.size' => 'O campo telefone deve conter 11 caracteres',
      'is_admin' => 'O campo administrador deve ser do tipo booleano'
    ];
  }
}
