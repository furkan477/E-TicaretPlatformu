<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddressRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }
    /**
     * Determine if the user is authorized to make this request.
     */
    public function rules(): array
    {
        return [
            "address_line1"=> "required|min:6|max:54",
            "address_line2"=> "nullable",
            "city"=> "required|min:4|max:24",
            "posta_code"=> "required|min:4|max:12",
            "country"=> "required|min:4|max:12",
        ];
    }

    public function messages(): array{
        return [
            "address_line1.required"=> "Adres 1 Alanı Zorunludur",
            "address_line1.min"=> "Adres 1 Alanı Minumum 6 karakter İçerir",
            "address_line1.max"=> "Adres 1 Alanı Maximum 54 Karakter İçerir",
            "city.min"=> "Şehir Alanı Minumum 4 karakter İçerir",
            "city.max"=> "Şehir Alanı Maximum 24 karakter İçerir",
            "city.required"=> "Şehir Alanı Zorunludur",
            "posta_code.min"=> "Posta Kodu Alanı Minumum 4 karakter İçerir",
            "posta_code.max"=> "Posta Kodu Alanı Maximum 12 karakter İçerir",
            "posta_code.required"=> "Posta Kodu Alanı Zorunludur",
            "country.required"=> "Ülke Alanı Zorunludur",
            "country.min"=> "Ülke Alanı Minumum 4 karakter İçerir",
            "country.max"=> "Ülke Alanı Maximum 12 karakter İçerir",
        ];
    }
}
