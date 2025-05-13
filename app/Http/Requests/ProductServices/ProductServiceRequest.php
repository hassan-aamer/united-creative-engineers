<?php

namespace App\Http\Requests\ProductServices;

use Illuminate\Foundation\Http\FormRequest;

class ProductServiceRequest extends FormRequest
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
            'title'         => 'required|array',
            'title.*'       => [
                'required',
                'string',
                'max:255',
                \CodeZero\UniqueTranslation\UniqueTranslationRule::for('product_services')->ignore($this->id)
            ],
            'description'   => 'required|array',
            'description.*' => 'required|string|max:1000',
            'position'      => 'required',
            'active'        => 'required|in:0,1',
            'image'         => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
        ];
    }
}
