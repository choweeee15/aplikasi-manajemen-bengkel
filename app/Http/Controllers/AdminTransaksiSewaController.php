<?php

namespace App\Http\Controllers;

use App\Models\TransaksiSewa;
use App\Models\Penyewa;
use App\Models\Booth;
use Illuminate\Http\Request;

class AdminTransaksiSewaController extends Controller
{
    public function index(Request $r)
    {
        $q = TransaksiSewa::with(['penyewa','booth']);

        if ($email = $r->query('email')) {
            $penyewa = Penyewa::where('email',$email)->first();
            $q->when($penyewa, fn($x)=>$x->where('penyewa_id',$penyewa->id));
            if (!$penyewa) $q->whereRaw('1=0');
        }
        if ($booth = $r->query('booth')) {
            $q->whereHas('booth', fn($x)=>$x->where('nama_booth','like',"%$booth%"));
        }
        if ($status = $r->query('status')) {
            $q->where('status',$status);
        }

        $rows = $q->orderByDesc('id')->paginate(10)->withQueryString();

        $rekap = [
            'total'    => TransaksiSewa::count(),
            'menunggu' => TransaksiSewa::where('status','menunggu')->count(),
            'disetujui'=> TransaksiSewa::where('status','disetujui')->count(),
            'ditolak'  => TransaksiSewa::where('status','ditolak')->count(),
        ];

        return view('admin_transaksi_sewa_index', compact('rows','rekap','email','booth','status'));
    }
}
