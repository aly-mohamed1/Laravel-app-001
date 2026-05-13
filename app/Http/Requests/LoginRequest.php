<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
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
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            //'email' => 'required|email|exists:users,email',
            // THAT CHECKS IF THE EMAIL IS EXISTED IN THE DATABASE

            'email' => 'required|email',
            // THAT FOR POSTING AN EMAIL IS A MUST
            'password' => 'required|between:8,16'
        ];
    }
}
