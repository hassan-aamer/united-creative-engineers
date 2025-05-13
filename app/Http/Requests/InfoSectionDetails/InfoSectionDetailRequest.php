<?php

namespace App\Http\Requests\InfoSectionDetails;

use Illuminate\Foundation\Http\FormRequest;

class InfoSectionDetailRequest extends FormRequest
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
            'service_id'              => 'required|integer|exists:services,id',
            'infoOptions'                   => 'required|array',
            'title'                   => 'required|array',
            'title.*'       => [
                'required',
                'string',
                'max:255',
                \CodeZero\UniqueTranslation\UniqueTranslationRule::for('info_section_details')->ignore($this->id)
            ],
            'description'             => 'required|array',
            'description.*'           => 'required|string|max:1000',
            'content'                 => 'required|array',
            'content.*'               => 'required|string|max:1000',
            'position'                => 'required',
            'active'                  => 'required|in:0,1',
        ];
    }
}
