<?php

namespace app\Http\Requests\Api\Auth;

use Illuminate\Foundation\Http\FormRequest;

/**
 * @property string email
 * @property string password
 */
class LoginRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'email'=>['required','email'],
            'password'=>['required','string'],
        ];
    }
}
