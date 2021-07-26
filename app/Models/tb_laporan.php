<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tb_laporan extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'id_komponen',
        'id_mesin',
        'tanggal_produksi',
        'qty_prod',
        'good',
        'not_good',
        'masalah',
        'keterangan',
        'status',
    ];

    public function tb_komponens()
    {
        return $this->belongsTo(tb_komponen::class,'id_komponen','id_komponen');
    }
    public function tb_mesins()
    {
        return $this->belongsTo(tb_mesin::class,'id_mesin','id_mesin');
    }
    
}
