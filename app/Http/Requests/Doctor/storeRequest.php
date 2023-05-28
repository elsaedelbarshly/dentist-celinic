<?php

namespace App\Http\Requests\Doctor;

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
            'name_en' => ['required', 'string', 'between:3,255'],
            'name_ar' => ['required', 'string', 'between:3,255'],
            'email'=>['required','email','unique:doctors'],
            'phone'=>['required','regex:/01[0-2,5]{1}[0-9]{8}$/','unique:doctors'],
            'password'=>['required','confirmed','regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,20}$/'],
            'password_confirmation'=>['required'],
            'image' => ['required', 'max:1024', 'mimes:png,jpg,jpeg']
            // 'phone_type'=>['required']
        ];
    }
}
