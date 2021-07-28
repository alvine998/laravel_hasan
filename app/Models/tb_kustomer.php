<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tb_kustomer extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_kustomer';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id_kustomer',
        'id_komponen',
        'nama_kustomer',
        'email_kustomer',
        'alamat_kustomer',
        'no_telp',
    ];

    public function tb_komponens()
    {
        return $this->hasOne(tb_komponen::class,'id_komponen','id_komponen');
    }
    public function tb_perencanaans()
    {
        return $this->hasMany(tb_perencanaan::class,'id_perencanaan','id_perencanaan');
    }
}
