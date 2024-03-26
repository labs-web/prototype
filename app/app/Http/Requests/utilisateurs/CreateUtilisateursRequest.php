<?php

namespace App\Http\Requests\utilisateurs;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;


class CreateUtilisateursRequest extends FormRequest
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
        return  [
             'prenom' => ['required', 'string', 'max:25'],
             'nom' => ['required', 'string', 'max:25'],
             'email' => ['required', 'string', 'lowercase', 'email', 'max:255'],
             'password' => ['required', 'confirmed', Password::defaults()],
     ];   
    }

}
