<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TestQuestionRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'question_title' =>'unique:test_questions,question_title|max:100|min:5' ,
        ];
    }
}
