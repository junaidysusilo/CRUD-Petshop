<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EditDaftarProdukRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'nama' => 'required|string',
            'harga' => 'required',
        ];
    }
    public function messages()
    {
        return [
            'nama.required' => 'Nama tidak boleh kosong',
            'nama.string' => 'Nama hanya bisa teks',
            'harga.required' => 'Harga tidak boleh kosong'
        ];
    }
}
