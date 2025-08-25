<?php

namespace App\Http\Controllers;

use App\Models\Booth;
use App\Models\Penyewa;
use App\Models\TransaksiSewa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class UserBoothController extends Controller
{
    // Halaman katalog booth untuk PENGGUNA
    public function katalog()
    {
        // tampilkan hanya booth yang tersedia
        $booths = Booth::where('status', 'tersedia')->orderByDesc('id')->get();
        return view('booth_katalog', compact('booths'));
    }

    // Halaman form sewa untuk booth tertentu
    public function create(Booth $booth)
    {
        if ($booth->status !== 'tersedia') {
            return redirect()->route('user.booth.katalog')->with('error', 'Booth ini tidak tersedia.');
        }
        return view('sewa_form', compact('booth'));
    }

    // Simpan transaksi sewa dari form pengguna
    public function store(Request $r, Booth $booth)
    {
        if ($booth->status !== 'tersedia') {
            return redirect()->route('user.booth.katalog')->with('error', 'Booth ini sudah tidak tersedia.');
        }

        $v = Validator::make($r->all(), [
            'nama'            => 'required|string|max:100',
            'email'           => 'required|email|max:150',
            'no_hp'           => 'nullable|string|max:25',
            'tanggal_mulai'   => 'required|date',
            'tanggal_selesai' => 'required|date|after_or_equal:tanggal_mulai',
        ], [], [
            'nama' => 'Nama Penyewa',
        ]);

        if ($v->fails()) {
            return back()->withErrors($v)->withInput();
        }

        // hitung durasi hari (minimal 1 hari)
        $mulai   = Carbon::parse($r->tanggal_mulai)->startOfDay();
        $selesai = Carbon::parse($r->tanggal_selesai)->startOfDay();
        $hari    = max($mulai->diffInDays($selesai) + 1, 1);

        $totalBayar = $booth->harga_sewa * $hari;

        // transaksi DB: buat/temukan penyewa + simpan transaksi
        DB::beginTransaction();
        try {
            // cari penyewa by email; kalau tidak ada, buat baru
            $penyewa = Penyewa::firstOrCreate(
                ['email' => $r->email],
                ['nama' => $r->nama, 'no_hp' => $r->no_hp, 'password' => bcrypt('passworddefault')]
            );

            TransaksiSewa::create([
                'penyewa_id'      => $penyewa->id,
                'booth_id'        => $booth->id,
                'tanggal_mulai'   => $mulai->toDateString(),
                'tanggal_selesai' => $selesai->toDateString(),
                'total_bayar'     => $totalBayar,
                'status'          => 'pending',
                'created_at'      => now(),
            ]);

            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();
            return back()->with('error', 'Gagal menyimpan transaksi: ' . $th->getMessage())->withInput();
        }

        return redirect()->route('user.booth.katalog')->with('success', 'Pengajuan sewa terkirim! Status: pending');
    }
}
