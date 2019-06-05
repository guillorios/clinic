<?php

namespace App\Http\Requests\User;

use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Http\FormRequest;

class ChangePasswordRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        $auth = $this->user();
        return $this->user()->can('update_password', $auth);


    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'old_password' => [
                'required',
                function ($attribute, $value, $fail){
                    if(!Hash::check($value, $this->user()->password)){
                        $fail('Tu contraseña actual no coincide');
                    }
                }
            ],
            'password' => 'required|string|min:6|confirmed'
        ];
    }

    public function messages()
    {
        return [
            'old_password.required' => 'Este campo es requerido.',
            'password.required' => 'Este campo es requerido.',
            'password.string' => 'Esta contraseña no es correcta.',
            'password.max' => 'La contraseña debe tener al menos 6 caracteres.',
            'password.confirmed' => 'Las contraseñas no coinciden.',
        ];
    }
}
