<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RoleRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }
    
    public function rules(): array
    {
        return [
            'name' => 'string|required|max:255|unique:roles,name,' . $this->route('role')?->id . ',id',
            'guard_name' => 'string|required|max:255',
        ];
    }
}
