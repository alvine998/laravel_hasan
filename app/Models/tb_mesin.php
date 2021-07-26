<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tb_mesin extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_mesin';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id_mesin',
        'nama_mesin',
    ];

    public function tb_komponens()
    {
        return $this->hasOne(tb_komponen::class,'id_komponen','id_komponen');
    }

    public function tb_waktus()
    {
        return $this->hasOne(tb_waktu::class,'id','id');
    }
    
    public function tb_laporans()
    {
        return $this->hasOne(tb_waktu::class,'id','id');
    }
}

