<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreFormRequest extends FormRequest
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
            'title' => 'required|string|max:255',
            'fields' => 'required|array',
            'fields.*.type' => 'required|string',
            'fields.*.name' => 'required|string',
            'fields.*.label' => 'required|string',
            'fields.*.required' => 'required|boolean',
        ];
    }
}
