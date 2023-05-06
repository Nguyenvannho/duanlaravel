<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreRegisterRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'password' => 'required|min:5|',
            'confirmpassword' => 'required|min:5|',
        ];
    }
    public function messages()
    {
        return  [
                'password.required' => 'Vui lòng không được để trống',
                'password.min'      => 'Vui lòng nhập trên :min kí tự',
                'confirmpassword.required' => 'Vui lòng không được để trống',
                'confirmpassword.min'      => 'Vui lòng nhập trên :min kí tự',
                
            ];
    }
    
}
