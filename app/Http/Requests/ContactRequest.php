<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
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
            "subject"=> "required|min:6",
            "message"=> "required|min:6",
        ];
    }

    public function messages(): array{
        return [
            "subject.required"=> "Konu Alanı Zorunludur",
            "subject.min"=> "Konu Alanı Minumum 6 karakterden oluşmalıdır",
            "message.required"=> "Mesaj Alanı Zorunludur",
            "message.min"=> "Mesaj Alanı Minumum 6 karakterden oluşmalıdır",
        ];
    }
}
