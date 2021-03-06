<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class kustomerrequest extends FormRequest
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
            'id_komponen' => 'required|',
            'nama_kustomer' => 'required|max:255',
            'email_kustomer' => 'required|max:255',
            'alamat_kustomer' => 'required|max:255',
            'no_telp' => 'required|integer',
        ];
    }
}
