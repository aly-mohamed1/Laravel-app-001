<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreReactionRequest extends FormRequest
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
            'user_id' => 'required|exists:users,id',
            'reaction_type_id' => 'required|exists:reaction_types,id',
            'reactable_id' => 'required|integer',
            'reactable_type' => ['required',Rule::in(['post', 'comment', 'reply'])],
            // We use 'Rule' because these data comes from the fronend so, we
            // put somenthing like restrictions that only those are accepted
        ];
    }
}
