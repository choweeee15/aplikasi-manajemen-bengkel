<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Booth extends Model
{
    // MATIKAN TIMESTAMPS KARENA TABEL TIDAK PUNYA created_at/updated_at
    public $timestamps = false;

    protected $table = 'booths';

    protected $fillable = [
        'nama_booth',
        'deskripsi',
        'harga_sewa',
        'status',
    ];

    // Relasi-relasi (opsional, sesuaikan skema kamu)
    // public function transaksiSewa()
    // {
    //     return $this->hasMany(TransaksiSewa::class, 'booth_id');
    // }
}
