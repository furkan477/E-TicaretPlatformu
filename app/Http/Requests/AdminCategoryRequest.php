<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminCategoryRequest extends FormRequest
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
            "name"=> "required|min:3|string",
            "category_id"=> "required",
            "status"=> "required",
        ];
    }

    public function messages(): array{
        return [
            "name.required"=> "Kategori Adı Zorunludur",
            "name.min"=> "Kategori Adı Alanı Minumum ^karakterden oluşmalıdır",
            "name.string"=> "Kategori Adı Alanı karakterden oluşmalıdır",
            "category_id.required"=> "Kategori Seçilmesi Zorunludur",
            "status.required"=> "Kategeori Durumu Zorunludur",
        ];
    }
}
