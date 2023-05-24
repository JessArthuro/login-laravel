<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Factory as ValidationFactory;

class LoginRequest extends FormRequest
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
      'username' => 'required',
      'password' => 'required'
    ];
  }

  public function getCredentials()
  {
    $username = $this->get('username');

    // esta condicional es para validar si el valor ingresado no es un correo electronico
    if ($this->isEmail($username)) {
      // devolvemos de nuevo la solicitud si se ingreso un email
      return [
        'email' => $username,
        'password' => $this->get('password')
      ];
    }

    return $this->only('username', 'password');
  }

  public function isEmail($value)
  {
    $factory = $this->container->make(ValidationFactory::class);

    return !$factory->make(['username' => $value], ['username' => 'email'])->fails();
  }
}