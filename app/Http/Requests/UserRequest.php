<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }
    
    public function rules(): array
    {
        return [
            'first_name' => 'required|string|max:255',
            'middle_name'   => 'nullable|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $this->route('user')?->id . ',id',
            'password'         => 'required|string',
            'password_confirmation' => 'required|string|same:password',
        ];
    }
}
