<?php

namespace App\Http\Requests\Patient;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class storeRequest extends FormRequest
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
            'name_en'=>['required','string','between:3,255'],
            'name_ar'=>['required','string','between:3,255'],
            'gender'=>['required','in:M,F'],
            'age'=>['required','integer','between:1,99'],
            'address'=>['required'],
            'viste_type'=>['nullable', 'integer', Rule::in([0, 1])],
            'phone'=>['required','integer','unique:patients,phone','digits:11']
        ];
    }
}
