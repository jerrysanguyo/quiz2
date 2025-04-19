<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AnswerRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }
    
    public function rules(): array
    {
        return [
            'question_id' => 'required|numeric|exists:questions,id',
            'answer' => 'required|string',
            'time_spent' => 'required|numeric',
        ];
    }
}
