<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tiket extends Model
{
    protected $table = 'tiket';
    protected $fillable = ['nama_tiket','harga','stok'];

    public function pembelian()
    {
        return $this->hasMany(PembelianTiket::class, 'tiket_id');
    }
}
