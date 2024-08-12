<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminProductRequest extends FormRequest
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
            "name"=> "required|min:6|max:100",
            "description"=> "required|min:12|max:200",
            "price"=> "required|integer",
            "category_id"=> "required",
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            "status"=> "required",
        ];
    }

    public function messages(): array{
        return [
            "name.required"=> "Ürün Adı Zorunludur.",
            "name.min"=> "Ürün Adı Minumum 6 karakterden Oluşmalıdır.",
            "name.max"=> "Ürün Adı Maximum 100 karakterden Oluşmalıdır.",
            "description.required"=> "Ürün Açıklaması Zorunludur.",
            "description.min"=> "Ürün Açıklaması Minumum 6 karakterden Oluşmalıdır.",
            "description.max"=> "Ürün Açıklaması Maximum 200 karakterden Oluşmalıdır.",
            "price.required"=> "Ürün Fiyatı Zorunludur.",
            "image.required"=> "Ürün Resmi Zorunludur.",
            "price.integer"=> "Ürün Fiyatı Sayılardan Oluşmalıdır.",
            "category_id.required"=> "Ürün Kategorisi Zorunludur.",
            "status.required"=> "Ürün Durumu Zorunludur.",
        ];
    }
}
