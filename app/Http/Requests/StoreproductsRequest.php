<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreproductsRequest extends FormRequest
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
            'txtcode' => 'required',
            'txtnama' => 'required|unique:products,nama',
            'txtkategori' => 'required',
            'txtharga' => 'required|numeric',
            'txtimage' => 'required'
        ];
    }

    public function messages(): array
    {
        return [
            'txtcode.required' => ':attribute tidak boleh kosong!',
            'txtcode.unique' => ':attribute data sudah ada!',
            'txtnama.required' => ':attribute tidak boleh kosong!',
            'txtkategori.required' => ':attribute tidak boleh kosong!',
            'txtharga.required' => ':attribute tidak boleh kosong!',
            'txtimage.required' => ':attribute tidak boleh kosong!'
        ];
    }
    public function attributes(): array
    {
        return [
            'txtcode' => 'Code',
            'txtnama' => 'Nama',
            'txtkategori' => 'gender',
            'txtharga' => 'email',
            'txtimage' => 'image'
        ];
    }
}
