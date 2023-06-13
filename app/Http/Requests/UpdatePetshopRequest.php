<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePetshopRequest extends FormRequest
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
            'nama_petshop' => 'required|string',
            'nama_pemilik' => 'required|string',
            'alamat' => 'required',
            'no_hp' => 'required'

        ];
    }
    public function messages()
    {
        return [
            'nama_petshop.required' => 'Nama Petshop tidak boleh kosong',
            'nama_petshop.string' => 'Nama Petshop hanya bisa teks',
            'alamat.required' => 'Alamat tidak boleh kosong',
            'no_hp.required' => 'No HP tidak boleh kosong',
            'nama_pemilik.required' => 'Nama Pemilik tidak boleh kosong',
            'nama_pemilik.required' => 'Harga Pemilik tidak boleh kosong'
        ];
    }
}
