<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class wakturequest extends FormRequest
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
            'id_mesin' => 'required|',
            'waktu_standar' => 'required|max:25',
            'jumlah_standar' => 'required|integer',
        ];
    }
}
