<?php

namespace App\Http\Requests\Prescripton;

use Illuminate\Foundation\Http\FormRequest;

class updateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'medicien_name' => ['required','string','between:3,100'],
            'dosage' => ['required','integer','digits:1'],
            'patient_id' => ['required','integer','exists:patients,id']
        ];
    }
}
