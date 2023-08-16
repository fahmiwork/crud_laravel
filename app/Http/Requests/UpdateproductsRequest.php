<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateproductsRequest extends FormRequest
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
            'txtnama' => 'required',
            'txtkategori' => 'required',
            'txtharga' => 'required|numeric'
        ];
    }

    public function messages(): array
    {
        return [
            'txtnama.required' => ':attribute tidak boleh kosong!',
            'txtcode.required' => ':attribute tidak boleh kosong!',
            'txtkategori.required' => ':attribute tidak boleh kosong!',
            'txtharga.required' => ':attribute tidak boleh kosong!'

        ];
    }
    public function attributes(): array
    {
        return [
            'txtnama' => 'Nama',
            'txtcode' => 'code',
            'txtkategori' => 'Kategori',
            'txtharga' => 'Harga',
            'txtimage' => 'image'
        ];
    }
}
