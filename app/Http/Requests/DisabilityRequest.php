<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DisabilityRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => 'string|required|max:255|unique:disabilities,name,' . $this->route('disability')?->id . ',id',
            'remarks' => 'string|required|max:255',
        ];
    }
}
