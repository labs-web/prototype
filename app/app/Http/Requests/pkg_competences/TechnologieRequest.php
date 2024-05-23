<?php
namespace App\Http\Requests\pkg_competences;

use Illuminate\Foundation\Http\FormRequest;

class TechnologieRequest extends FormRequest
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
            'nom' => 'required|max:40',
            'description' => 'nullable|max:255',
            'categorie_technologies_id' => 'required|not_in:null',
            'competence_id' => 'required|not_in:null',
        ];
    }


    public function messages(): array
    {
        return [
            'nom.required' => __('pkg_competences/technologie/validation.nomRequired'),
            'nom.max' => __('pkg_competences/technologie/validation.nomMax'),
            'description.max' => __('pkg_competences/technologie/validation.descriptionMax'),
            'categorie_technologies_id.required' => __('pkg_competences/technologie/validation.categorieTechnologiesRequired'),
            'categorie_technologies_id.not_in' => __('pkg_competences/technologie/validation.categorieTechnologiesNotIn'),
            'competence_id.required' => __('pkg_competences/technologie/validation.competenceRequired'),
            'competence_id.not_in' => __('pkg_competences/technologie/validation.competenceNotIn'),
        ];
    }
}