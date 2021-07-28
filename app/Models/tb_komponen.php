<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tb_komponen extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_komponen';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id_komponen',
        'id_mesin',
        'nama_komponen',
    ];

    public function tb_mesins()
    {
        return $this->belongsTo(tb_mesin::class,'id_mesin','id_mesin');
    }

    public function tb_kustomers()
    {
        return $this->hasMany(tb_kustomer::class,'id_kustomer','id_kustomer');
    }
    public function tb_waktus()
    {
        return $this->hasOne(tb_waktu::class,'id','id');
    }
    public function tb_perencanaans()
    {
        return $this->hasMany(tb_perencanaan::class,'id_perencanaan','id_perencanaan');
    }
    public function tb_laporans()
    {
        return $this->hasOne(tb_laporan::class,'id','id');
    }
}

