<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StudentCreationRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => 'required|string',
            'birth_date' => 'required|string',
            'postal_code' => 'required|string'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Name is Empty',
            'name.string' => 'Name must be string',
            'birth_date.required' => 'Birth Date is Empty',
            'postal_code.required' => 'Postal Code is Empty'
        ];
    }
}
