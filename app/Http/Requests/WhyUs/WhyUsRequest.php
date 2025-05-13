<?php

namespace App\Http\Requests\WhyUs;

use Illuminate\Foundation\Http\FormRequest;

class WhyUsRequest extends FormRequest
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
                \CodeZero\UniqueTranslation\UniqueTranslationRule::for('why_us')->ignore($this->id)
            ],
            'description'   => 'required|array',
            'description.*' => 'required|string|max:1000',
            'position'      => 'required',
            'image'         => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
            'active'        => 'required|in:0,1',
        ];
    }
}
