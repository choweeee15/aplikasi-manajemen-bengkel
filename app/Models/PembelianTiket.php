<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PembelianTiket extends Model
{
    public $timestamps = false;
    protected $table = 'pembelian_tiket';
    protected $fillable = [
        'pengunjung_id','tiket_id','jumlah','total_harga','qr_code','status_bayar','created_at',
    ];

    public function pengunjung()
    {
        return $this->belongsTo(Pengunjung::class);
    }

    public function tiket()
    {
        return $this->belongsTo(Tiket::class);
    }
}
