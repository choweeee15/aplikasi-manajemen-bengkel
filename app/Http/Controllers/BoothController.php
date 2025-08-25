<?php

namespace App\Http\Controllers;

use App\Models\Booth;
use Illuminate\Http\Request;

class BoothController extends Controller
{
    public function index(Request $request)
    {
        $q = trim($request->get('q',''));
        $perPage = (int) $request->get('per_page', 10);

        $booths = Booth::query()
            ->when($q !== '', function($qr) use ($q){
                $qr->where('nama_booth','like',"%$q%")
                   ->orWhere('deskripsi','like',"%$q%");
            })
            ->orderByDesc('id')
            ->paginate($perPage)
            ->withQueryString();

        return view('admin_booths_index', compact('booths','q','perPage'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nama_booth' => ['required','string','max:150'],
            'deskripsi'  => ['nullable','string'],
            'harga_sewa' => ['required','numeric','min:0','max:9999999999'],
            'status'     => ['required','in:tersedia,tersewa'],
        ]);

        Booth::create($data);
        return back()->with('success','Booth berhasil ditambahkan.');
    }

    public function update(Request $request, $id)
    {
        $booth = Booth::findOrFail($id);

        $data = $request->validate([
            'nama_booth' => ['required','string','max:150'],
            'deskripsi'  => ['nullable','string'],
            'harga_sewa' => ['required','numeric','min:0','max:9999999999'],
            'status'     => ['required','in:tersedia,tersewa'],
        ]);

        $booth->update($data);
        return back()->with('success','Booth berhasil diperbarui.');
    }

    public function destroy($id)
    {
        Booth::findOrFail($id)->delete();
        return back()->with('success','Booth berhasil dihapus.');
    }
}
