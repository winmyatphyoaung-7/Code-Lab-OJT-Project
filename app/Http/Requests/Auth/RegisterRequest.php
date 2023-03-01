<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{
    
    public function rules()
    {
        return [
            'name' => ['required', 'string', 'max:18'],
            'email' => ['required', 'string', 'email', 'max:100', 'unique:users'],
            'phone' => ['required', 'max:15'],
            'address' => ['required', 'string'],
            'gender' => ['required'],
            'password' => ['required'],
            'password_confirm' => ['required', 'same:password']
        ];
    }
}
