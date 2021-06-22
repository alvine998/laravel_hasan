<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\tb_pengguna;


class penggunaseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tb_pengguna = [
            [
                'id_pengguna'=>'12345',
                'nama_pengguna'=>'hasan',
                'alamat'=>'bojong',
                'username' => 'admin',
                'password'=> bcrypt('admin'),
                'roles'=>'Admin',
            ],
            
        ];

        foreach ($tb_pengguna as $key => $value) {
            tb_pengguna::create($value);
        }
    }
}
