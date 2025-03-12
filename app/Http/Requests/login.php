<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class login extends FormRequest
{
    public function authorize()
    {
        return false;
    }

    public function rules()
    {
        return [
            'email' => ['required', 'email', 'string'],
            'password' => ['required', 'password', 'string']
        ];
    }
}
