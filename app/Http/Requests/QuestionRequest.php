<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class QuestionRequest extends FormRequest
{ 
    public function authorize(): bool
    {
        return true;
    }
    
    public function rules(): array
    {
        return [
            'name' => 'string|required|max:1000',
            'answer' => 'string|required|max:255',
            'choices1' => 'string|required|max:255',
            'choices2' => 'string|required|max:255',
            'choices3' => 'string|required|max:255',
        ];
    }
}
