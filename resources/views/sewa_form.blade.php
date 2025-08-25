@extends('layouts.main')
@section('title', 'Ajukan Sewa Booth')

@section('content')
<div class="container-xxl py-5">
  <div class="container">
    <div class="row g-4">
      <div class="col-lg-7">
        <h2 class="mb-3">Ajukan Sewa Booth</h2>
        <div class="card shadow border-0">
          <div class="card-body">
            @if($errors->any())
              <div class="alert alert-danger"><ul class="mb-0">@foreach($errors->all() as $e)<li>{{ $e }}</li>@endforeach</ul></div>
            @endif

            <form method="POST" action="{{ route('user.booth.sewa.store', $booth->id) }}" id="formSewa">
              @csrf

              <div class="mb-3">
                <label class="form-label">Nama Penyewa</label>
                <input type="text" name="nama" class="form-control" value="{{ old('nama') }}" required>
              </div>
              <div class="row">
                <div class="col-md-6 mb-3">
                  <label class="form-label">Email</label>
                  <input type="email" name="email" class="form-control" value="{{ old('email') }}" required>
                </div>
                <div class="col-md-6 mb-3">
                  <label class="form-label">No HP</label>
                  <input type="text" name="no_hp" class="form-control" value="{{ old('no_hp') }}">
                </div>
              </div>

              <div class="row">
                <div class="col-md-6 mb-3">
                  <label class="form-label">Tanggal Mulai</label>
                  <input type="date" name="tanggal_mulai" class="form-control" value="{{ old('tanggal_mulai') }}" required>
                </div>
                <div class="col-md-6 mb-3">
                  <label class="form-label">Tanggal Selesai</label>
                  <input type="date" name="tanggal_selesai" class="form-control" value="{{ old('tanggal_selesai') }}" required>
                </div>
              </div>

              <div class="alert alert-info d-flex justify-content-between align-items-center">
                <div>
                  <div><b>Harga Sewa</b>: Rp {{ number_format($booth->harga_sewa,0,',','.') }} / hari</div>
                  <small class="text-muted">Total dihitung otomatis saat submit (server) — estimasi di bawah hanya perkiraan.</small>
                </div>
                <div class="text-end">
                  <div class="small text-muted">Estimasi:</div>
                  <div id="estimasiTotal" class="fw-bold">Rp 0</div>
                </div>
              </div>

              <button class="btn btn-danger w-100">Kirim Pengajuan</button>
            </form>
          </div>
        </div>
      </div>

      <div class="col-lg-5">
        <div class="card shadow border-0">
          <img src="/img/booth-placeholder.jpg" class="card-img-top" alt="Booth">
          <div class="card-body">
            <h5 class="mb-1">{{ $booth->nama_booth }}</h5>
            <p class="text-muted small">{{ $booth->deskripsi }}</p>
            <div class="d-flex align-items-center justify-content-between">
              <span class="fw-bold text-danger">Rp {{ number_format($booth->harga_sewa,0,',','.') }}/hari</span>
              <span class="badge bg-success">Tersedia</span>
            </div>
          </div>
          <div class="card-footer bg-white border-0">
            <a href="{{ route('user.booth.katalog') }}" class="btn btn-outline-danger w-100">
              <i class="fas fa-arrow-left me-1"></i> Kembali ke Katalog
            </a>
          </div>
        </div>
      </div>
    </div>

    @if(session('error')) <div class="alert alert-danger mt-3">{{ session('error') }}</div> @endif
  </div>
</div>

@push('scripts')
<script>
  const hargaPerHari = {{ (int)$booth->harga_sewa }};
  const toRupiah = (n) => new Intl.NumberFormat('id-ID').format(n);

  function hitungEstimasi() {
    const mulaiEl = document.querySelector('[name="tanggal_mulai"]');
    const selesaiEl = document.querySelector('[name="tanggal_selesai"]');
    const estEl = document.getElementById('estimasiTotal');
    if (!mulaiEl.value || !selesaiEl.value) { estEl.textContent = 'Rp 0'; return; }
    const mulai = new Date(mulaiEl.value);
    const selesai = new Date(selesaiEl.value);
    if (selesai < mulai) { estEl.textContent = 'Tanggal salah'; return; }
    const diffMs = selesai - mulai;
    const days = Math.floor(diffMs / (1000*60*60*24)) + 1; // inklusif
    const total = Math.max(days, 1) * hargaPerHari;
    estEl.textContent = 'Rp ' + toRupiah(total);
  }

  document.querySelector('[name="tanggal_mulai"]').addEventListener('change', hitungEstimasi);
  document.querySelector('[name="tanggal_selesai"]').addEventListener('change', hitungEstimasi);
</script>
@endpush
@endsection
