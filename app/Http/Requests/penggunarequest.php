<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class penggunarequest extends FormRequest
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
            'nama_pengguna' => 'required|max:255',
            'alamat' => 'required|max:255',
            'username' => 'required|max:25',
            'password' => 'required|max:25',
            'roles' => 'required|max:25',
        
        ];
    }
}
