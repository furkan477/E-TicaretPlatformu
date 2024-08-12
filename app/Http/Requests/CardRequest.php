<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CardRequest extends FormRequest
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
        return [
            "quantity"=> "required|integer|min:1|max:7",
        ];
    }

    public function messages(): array
    {
        return [
            "quantity.integer"=> "Adet Alanı Sayı İçerir",
            "quantity.max"=> "Adet Alanı En fazla 7 adet seçilebilir",
            "quantity.min"=> "Adet Alanı En az 1 adet seçilebilir",
        ];
    }
}
