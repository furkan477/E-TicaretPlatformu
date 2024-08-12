<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterFormRequest extends FormRequest
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
            "name"=> "required|string|min:4|max:32",
            "email"=> "required|min:6|email|max:50",
            "password"=> "required|min:6|max:24",
        ];
    }

    public function messages(): array{
        return [
            "name.required"=> "İsim Alanı Zorunludur",
            "name.string"=> "İsim Alanı Sayı İçermiyor",
            "name.min"=> "İsim Alanı Minumum 4 karakter İçerir",
            "name.max"=> "İsim Alanı Maximum 32 Karakter İçerir",
            "email.required"=> "E-posta Alanı Zorunludur",
            "email.min"=> "E-posta Alanı Minumum 6 karakter İçerir",
            "email.email"=> "E-posta Onaylanmadı Tekrar Deneyiniz",
            "email.max"=> "E-posta Alanı Maximum 6 karakter İçerir",
            "password.required"=> "Şifre Alanı Zorunludur",
            "password.min"=> "Şifre Alanı Minumum 6 karakter İçerir",
            "password.max"=> "Şifre Maximum 6 karakter İçerir",
        ];
    }
}
