<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {

        return [
            'name' => 'required|string|max:255|unique:categories,name,' . $this->route('category') . ',id',
            'slug' => 'nullable|string|max:255|unique:categories,slug,' . $this->route('category') . ',id',
            'status' => 'required|in:0,1',
        ];
    }

    /**
     * Get the custom validation messages.
     *
     * @return array<string, mixed>
     */
    public function messages(): array
    {
        return [
            'name.required' => 'The category name is required.',
            'name.unique' => 'The category name has already been taken.',
            'slug.unique' => 'The category slug has already been taken.',
            'status.required' => 'The status field is required.',
            'status.in' => 'The status field must be either 0 or 1.',
        ];
    }
}
