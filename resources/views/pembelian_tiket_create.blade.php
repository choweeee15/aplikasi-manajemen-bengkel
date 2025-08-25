@extends('layouts.main')
@section('title','Beli Tiket')

@section('content')
<div class="container-xxl py-5">
  <div class="container">
    <div class="d-flex justify-content-between align-items-center mb-4">
      <h2 class="mb-0">Beli Tiket</h2>
      <a href="{{ route('pembelian-tiket.index') }}" class="btn btn-outline-danger">
        <i class="fas fa-list me-1"></i> Riwayat
      </a>
    </div>

    @if($errors->any())
      <div class="alert alert-danger"><ul class="mb-0">@foreach($errors->all() as $e)<li>{{ $e }}</li>@endforeach</ul></div>
    @endif

    <div class="card shadow border-0">
      <div class="card-body">
        <form method="POST" action="{{ route('pembelian-tiket.store') }}">
          @csrf

          <div class="row">
            <div class="col-md-6 mb-3">
              <label class="form-label">Nama</label>
              <input type="text" name="nama" class="form-control" value="{{ old('nama') }}" required>
            </div>
            <div class="col-md-6 mb-3">
              <label class="form-label">Email</label>
              <input type="email" name="email" class="form-control" value="{{ old('email') }}" required>
            </div>
            <div class="col-md-6 mb-3">
              <label class="form-label">No HP</label>
              <input type="text" name="no_hp" class="form-control" value="{{ old('no_hp') }}">
            </div>
            <div class="col-md-6 mb-3">
              <label class="form-label">Pilih Tiket</label>
              <select name="tiket_id" class="form-select" required>
                <option value="" disabled selected>-- pilih tiket --</option>
                @foreach($tiketList as $t)
                  <option value="{{ $t->id }}" data-harga="{{ (int)$t->harga }}">
                    {{ $t->nama_tiket }} — Rp {{ number_format($t->harga,0,',','.') }}
                  </option>
                @endforeach
              </select>
            </div>
            <div class="col-md-6 mb-3">
              <label class="form-label">Jumlah</label>
              <input type="number" min="1" name="jumlah" class="form-control" value="{{ old('jumlah', 1) }}" required>
            </div>
          </div>

          <div class="alert alert-info d-flex justify-content-between">
            <div><b>Estimasi Total</b></div>
            <div id="estTotal" class="fw-bold">Rp 0</div>
          </div>

          <button class="btn btn-danger"><i class="fas fa-shopping-cart me-1"></i> Buat Pesanan</button>
        </form>
      </div>
    </div>
  </div>
</div>

@push('scripts')
<script>
  const rupiah = n => new Intl.NumberFormat('id-ID').format(n);
  const select = document.querySelector('[name="tiket_id"]');
  const jumlah = document.querySelector('[name="jumlah"]');
  const est    = document.getElementById('estTotal');

  function hitung() {
    const opt   = select?.selectedOptions[0];
    const harga = opt ? parseInt(opt.dataset.harga || 0) : 0;
    const qty   = parseInt(jumlah?.value || 1);
    est.textContent = 'Rp ' + rupiah(harga * Math.max(qty,1));
  }
  select?.addEventListener('change', hitung);
  jumlah?.addEventListener('input', hitung);
  hitung();
</script>
@endpush
@endsection
