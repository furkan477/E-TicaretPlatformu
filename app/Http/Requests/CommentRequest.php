<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CommentRequest extends FormRequest
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
            "comment"=> "required|min:6|max:255",
            "status" => "nullable"
        ];
    }

    public function messages(): array{
        return [
            "comment.required" => "Yorum Alanını Doldurunuz",
            "comment.min" => "Yorum Alanı Minumum 6 içerik içermelidir",
            "comment.max"=> "Yorum Alanı Maximum 255 içerik içermelidir",
        ];
    }
}
