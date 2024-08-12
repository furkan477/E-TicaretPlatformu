<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OrderRequest extends FormRequest
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
            'status' => 'required',
            'quantity'=> 'required|integer',
            'total_price'=> 'required',
        ];
    }

    public function messages(): array
    {
        return [
            'status.required'=> 'Sipariş Durumu Alanı Boş Bırakılamaz',
            'quantity.required'=> 'Sipariş Adeti Alanı Boş Bırakılamaz',
            'total_price.required'=> 'Sipariş Fiyatı Alanı Boş Bırakılamaz',
            'quantity.integer'=> 'Sipariş Adeti Alanı Sayı İçermelidir Sadece',
        ];
    }

}
