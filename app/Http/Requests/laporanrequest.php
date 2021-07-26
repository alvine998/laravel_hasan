<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class laporanrequest extends FormRequest
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
            'tanggal_produksi' => 'required|date',
            'qty_prod' => 'required|integer',
            'good' => 'required|integer',
            'not_good' => 'required|integer',
            'masalah' => 'required|string|in:TIDAK_ADA, MACHINE, MATERIAL, MAN, METHOD',
            'keterangan' => 'required|',
        ];
    }
}
