<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ScoreRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }
    
    public function rules(): array
    {
        return [
            'score'   => ['required', 'numeric', 'between:0,100'],
            'remarks' => ['required', 'in:excel,ppt'],
        ];
    }
}
