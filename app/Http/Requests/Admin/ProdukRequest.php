<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class ProdukRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
              'nama'=>'required|max:25',
              'users_id'=>'required|exists:users,id',
              'kategori_id'=>'required|exists:kategori,id',
              'harga'=>'required|integer',
              'deskripsi'=>'required'

            ];
    }
}
