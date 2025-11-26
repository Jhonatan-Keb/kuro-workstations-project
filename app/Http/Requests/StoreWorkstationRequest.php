<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreWorkstationRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true; // Todos los usuarios autenticados pueden crear
    }

    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'cpu' => ['required', 'string', 'max:255'],
            'ram' => ['required', 'integer', 'min:4', 'max:512'],
            'gpu' => ['required', 'string', 'max:255'],
            'os'  => ['required', 'string'],
        ];
    }
}
