<?php

namespace App\Http\Requests\pkg_realisation_projet;

use Illuminate\Foundation\Http\FormRequest;

class NatureLivrableRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;  // Adjust based on your authorization logic
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'nom' => 'required|max:255',  // Adjusted max length to 255
            'description' => 'nullable|max:255',
        ];
    }

    /**
     * Get the custom messages for validation errors.
     *
     * @return array
     */
    public function messages(): array
    {
        return [
            'nom.required' => __('pkg_realisation_projet/nature_livrable/validation.nomRequired'),
            'nom.max' => __('pkg_realisation_projet/nature_livrable/validation.nomMax'),
            'description.max' => __('pkg_realisation_projet/nature_livrable/validation.descriptionMax'),
        ];
    }
}

