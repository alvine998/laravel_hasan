<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ppcrequest extends FormRequest
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
            'id_kustomer' => 'required',
            'id_komponen'=>'required',
            'tanggal_produksi' => 'required|date',
            'plan' => 'required|integer',
            'actual' => 'required|integer',
        ];
    }
}
