<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return $this->user()->can('create', User::class);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'role' => 'required|numeric',
            'name' => 'required|string|max:255',
            'dob' => 'required',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed'
        ];
    }

    public function messages()
    {
        return [
            'role.required' => 'Este campo es requerido.',
            'role.numeric' => 'El valor no es correcto.',
            'name.required' => 'El campo de nombre es requerido.',
            'name.string' => 'El nombre no es correcto.',
            'name.max' => 'Solo se permiten 255 caracteres.',
            'dob.required' => 'Este campo es requerido.',
            'email.required' => 'Este campo es requerido.',
            'email.string' => 'Este email no es correcto.',
            'email.max' => 'Solo se permiten 255 caracteres.',
            'email.unique' => 'Este email ya está registrado.',
            'password.required' => 'Este campo es requerido.',
            'password.string' => 'Esta contraseña no es correcta.',
            'password.max' => 'La contraseña debe tener al menos 6 caracteres.',
            'password.confirmed' => 'Las contraseñas no coinciden.',
        ];
    }
}
