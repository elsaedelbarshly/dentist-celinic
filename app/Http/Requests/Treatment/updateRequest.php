<?php

namespace App\Http\Requests\Treatment;

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
            'service_id' => ['nullable','integer','exists:services,id'],
            'doctor_id'=> ['nullable','integer','exists:doctors,id'],
            'patient_id'=> ['nullable','integer','exists:patients,id'],
            'today'=> ['required',],
            'total'=> ['required',],
            'paid_up'=> ['required',],
            'rest'=> ['required',],
            'notes'=> ['required',],
            'next_visit'=> ['required',]
        ];
    }
}
