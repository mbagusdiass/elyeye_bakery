<?php

namespace App\Http\Requests\Post;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|',
            'desc' => 'required|string|',
            'price' => 'required|integer',
            'discount' => 'nullable|integer',
            'category' => 'required|string',
            'img' => 'required|image|mimes:jpg,jpeg,png',
        ];
    }
}
