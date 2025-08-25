<?php

namespace App\Http\Controllers;

use App\Models\PembelianTiket;
use App\Models\Pengunjung;
use Illuminate\Http\Request;

class AdminPembelianTiketController extends Controller
{
    public function index(Request $request)
    {
        $q = PembelianTiket::with(['tiket','pengunjung']);

        $email = $request->query('email');
        if ($email) {
            $pengunjung = Pengunjung::where('email',$email)->first();
            $q->when($pengunjung, fn($x) => $x->where('pengunjung_id',$pengunjung->id));
            if (!$pengunjung) $q->whereRaw('1=0');
        }

        $status = $request->query('status');
        if ($status) $q->where('status_bayar',$status);

        $rows  = $q->orderByDesc('id')->paginate(10)->withQueryString();
        $rekap = [
            'total'   => PembelianTiket::count(),
            'lunas'   => PembelianTiket::where('status_bayar','lunas')->count(),
            'pending' => PembelianTiket::where('status_bayar','menunggu')->count(),
        ];

        return view('admin_pembelian_tiket_index', compact('rows','rekap','email','status'));
    }
}
