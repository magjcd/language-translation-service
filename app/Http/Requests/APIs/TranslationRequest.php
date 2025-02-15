<?php

namespace App\Http\Requests\APIs;

use Illuminate\Foundation\Http\FormRequest;

class TranslationRequest extends FormRequest
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
                'title' => ['required'],
                'details' => ['required'],
                'language_id' => ['required'],
                'tags' => ['required']
            ];
        }elseif(request()->isMethod('put')){
            return [
                'title' => ['required'],
                'details' => ['required'],
                'language_id' => ['required'],
                'tags' => ['required']
            ];
        }
    }
}
