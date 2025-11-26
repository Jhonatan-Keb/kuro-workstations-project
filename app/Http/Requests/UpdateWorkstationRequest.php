<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateWorkstationRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true; // La Policy se encargará de ver SI pueden editar
    }

    public function rules(): array
    {
        $rules = [
            'name' => ['required', 'string', 'max:255'],
            'cpu' => ['required', 'string', 'max:255'],
            'ram' => ['required', 'integer'],
            'gpu' => ['required', 'string'],
            'os'  => ['required', 'string'],
        ];

        // Solo Admin y Technician pueden validar el campo 'status'
        if ($this->user()->role === 'admin' || $this->user()->role === 'technician') {
            $rules['status'] = ['required', 'in:pending,building,shipped,cancelled'];
        }

        return $rules;
    }
}
