<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateKategoriProductsRequest extends FormRequest
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
            'txtnama' => 'required'
        ];
    }
    public function messages(): array
    {
        return [
            'txtnama.required' => 'nama kategori tidak boleh kosong'
        ];
    }
    public function attributes(): array
    {
        return [
            'txtnama' => 'Nama Kategori'
        ];
    }
}
