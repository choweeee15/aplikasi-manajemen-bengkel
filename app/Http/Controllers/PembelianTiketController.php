<?php

namespace App\Http\Controllers;

use App\Models\PembelianTiket;
use App\Models\Pengunjung;
use App\Models\Tiket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class PembelianTiketController extends Controller
{
    public function index(Request $r)
    {
        // aman saat guest
        $email = $r->query('email');
        if (!$email && auth()->check()) {
            $email = auth()->user()->email;
        }

        $items = collect();
        if ($email) {
            $pengunjung = Pengunjung::where('email', $email)->first();
            if ($pengunjung) {
                $items = PembelianTiket::with(['tiket','pengunjung'])
                    ->where('pengunjung_id', $pengunjung->id)
                    ->orderByDesc('id')
                    ->get();
            }
        }

        $tiketList = Tiket::orderBy('nama_tiket')->get();

        return view('pembelian_tiket_index', compact('items', 'email', 'tiketList'));
    }

    public function create()
    {
        $tiketList = Tiket::orderBy('nama_tiket')->get();
        return view('pembelian_tiket_create', compact('tiketList'));
    }

    public function store(Request $r)
    {
        $v = Validator::make($r->all(), [
            'nama'      => 'required|string|max:100',
            'email'     => 'required|email|max:150',
            'no_hp'     => 'nullable|string|max:25',
            'tiket_id'  => 'required|exists:tiket,id',
            'jumlah'    => 'required|integer|min:1',
        ], [], ['tiket_id' => 'Tiket']);

        if ($v->fails()) return back()->withErrors($v)->withInput();

        $tiket = Tiket::findOrFail($r->tiket_id);
        $total = $tiket->harga * (int) $r->jumlah;

        DB::beginTransaction();
        try {
            $pengunjung = Pengunjung::firstOrCreate(
                ['email' => $r->email],
                ['nama' => $r->nama, 'no_hp' => $r->no_hp]
            );

            PembelianTiket::create([
                'pengunjung_id' => $pengunjung->id,
                'tiket_id'      => $tiket->id,
                'jumlah'        => (int) $r->jumlah,
                'total_harga'   => $total,
                'status_bayar'  => 'menunggu',
                'created_at'    => now(),
            ]);

            DB::commit();
        } catch (\Throwable $e) {
            DB::rollBack();
            return back()->with('error', 'Gagal menyimpan: '.$e->getMessage())->withInput();
        }

        return redirect()->route('pembelian-tiket.index', ['email' => $r->email])
                         ->with('success', 'Pembelian berhasil dibuat. Status: menunggu');
    }
}
