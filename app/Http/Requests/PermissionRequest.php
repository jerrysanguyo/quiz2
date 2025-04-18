<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PermissionRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }
    
    public function rules(): array
    {
        return [
            'name' => 'string|required|max:255|unique:permissions,name,' . $this->route('permission')?->id . ',id',
            'guard_name' => 'string|required|max:255',
        ];
    }
}
