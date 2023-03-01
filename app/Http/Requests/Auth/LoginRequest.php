<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;
use App\Http\Requests\Auth\LoginRequest;

class LoginRequest extends FormRequest
{
    public function rules()
    {
        return [
            'email' => ['required' , 'email'],
            'password' => ['required']
        ];
    }
}
