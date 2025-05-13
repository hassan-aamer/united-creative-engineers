<?php

namespace App\Http\Requests\Packages;

use Illuminate\Foundation\Http\FormRequest;

class PackageRequest extends FormRequest
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
            'PackageDetails' => 'nullable|array',
            'title'          => 'required|array',
            'title.*'       => [
                'required',
                'string',
                'max:255',
                \CodeZero\UniqueTranslation\UniqueTranslationRule::for('packages')->ignore($this->id)
            ],
            'position'       => 'required',
            'active'         => 'required|in:0,1',
        ];
    }
}
