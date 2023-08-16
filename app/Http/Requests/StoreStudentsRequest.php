<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreStudentsRequest extends FormRequest
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
           'txtid' => 'required|unique:students,idstudents|min:7|max:7',
           'txtfullname' => 'required',
           'txtgender' => 'required',
           'txtemail' => 'required|email|unique:students,emailaddress',
           'txtphone' => 'required|numeric',
           'txtaddress' => 'required'
        ];
    }

    public function messages(): array
{
    return [
        'txtid.required' => ':attribute tidak boleh kosong!',
        'txtid.unique' => ':attribute data sudah ada!',
        'txtfullname.required' => ':attribute tidak boleh kosong!',
        'txtgender.required' => ':attribute tidak boleh kosong!',
        'txtemail.required' => ':attribute tidak boleh kosong!',
        'txtphone.required' => ':attribute tidak boleh kosong!',
        'txtaddress.required' => ':attribute tidak boleh kosong!'
    ];
}
public function attributes(): array
{
    return [
        'txtid' => 'Id Student',
        'txtfullname' => 'Full name',
        'txtgender' => 'gender',
        'txtemail' => 'email',
        'txtphone' => 'phone',
        'txtaddress' => 'address'
    ];
}
}
