<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\tb_mesin;


class mesinseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tb_mesin = [
            [
                'id_mesin'=>'12345',
                'nama_mesin'=>'CLIP-13',
            ],
            
        ];

        foreach ($tb_mesin as $key => $value) {
            tb_mesin::create($value);
        }
    }
}
