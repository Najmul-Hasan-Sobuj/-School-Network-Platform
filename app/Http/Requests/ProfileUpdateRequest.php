<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProfileUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        // If authorization logic is required, you can handle it here. For now, we return true.
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
            'name' => ['string', 'max:100'],
            'email' => ['email', 'max:100', Rule::unique(User::class)->ignore($this->user()->id)],
            'gender' => ['required', Rule::in(['M', 'F'])],
            'address' => ['string', 'max:255', 'nullable'],
            'country' => ['string', 'max:100', 'nullable'],
            'dob' => ['date', 'nullable'],
            'phone' => ['string', 'max:15', 'nullable'],
        ];
    }
}
