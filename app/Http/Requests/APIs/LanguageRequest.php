<?php

namespace App\Http\Requests\APIs;

use Illuminate\Foundation\Http\FormRequest;

class LanguageRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        if(request()->isMethod('post')){

            return [
                'code' => ['required','unique:languages'],
                'name' => ['required','unique:languages'],
            ];
        }elseif(request()->isMethod('put')){
            return [
                'code' => ['required'],
                'name' => ['required'],
            ];
        }
    }

    public function attributes(): array
    {
        return [
            'code' => 'language code',
            'name' => 'language name',
        ];
    }
}
