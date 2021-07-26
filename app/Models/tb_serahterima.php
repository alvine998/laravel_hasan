<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tb_serahterima extends Model
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
        'id_kustomer',
        'id_komponen',
        'tanggal_produksi',
        'jumlah_komponen',
        'status',
    ];

    public function tb_kustomers()
    {
        return $this-> belongsTo(tb_kustomer::class,'id_kustomer','id_kustomer');
    }
    
    public function tb_komponens()
    {
        return $this->belongsTo(tb_komponen::class,'id_komponen','id_komponen');
    }
   
}
