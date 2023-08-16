<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateStudentsRequest extends FormRequest
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
           'txtfullname' => 'required',
           'txtgender' => 'required',
           'txtemail' => [
                'required',
                Rule::unique('students','emailaddress')->ignore($this->txtid,'idstudents'),
                'email'
           ],
           'txtphone' => 'required|numeric',
           'txtaddress' => 'required'
        ];
    }

    public function messages(): array
{
    return [
        'txtfullname.required' => ':attribute tidak boleh kosong!'
    ];
}
public function attributes(): array
{
    return [
        'txtfullname' => 'Full name'
    ];
}
}
