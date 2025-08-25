@extends('layouts.main')
@section('title', 'Katalog Booth')

@section('content')
<div class="container-xxl py-5">
  <div class="container">
    <div class="d-flex align-items-center justify-content-between mb-4">
      <div>
        <h1 class="mb-1">Katalog Booth 🎪</h1>
        <p class="text-muted mb-0">Pilih booth yang tersedia, lalu ajukan sewa.</p>
      </div>
      <a href="{{ route('user.home') }}" class="btn btn-outline-danger"><i class="fas fa-home me-1"></i> Home</a>
    </div>

    @if(session('success')) <div class="alert alert-success">{{ session('success') }}</div> @endif
    @if(session('error'))   <div class="alert alert-danger">{{ session('error') }}</div>   @endif

    <div class="row g-4">
      @forelse($booths as $booth)
      <div class="col-md-6 col-lg-4">
        <div class="card h-100 shadow border-0">
          <img src="/img/booth-placeholder.jpg" class="card-img-top" alt="{{ $booth->nama_booth }}">
          <div class="card-body">
            <h5 class="card-title mb-1">{{ $booth->nama_booth }}</h5>
            <p class="text-muted small">{{ Str::limit($booth->deskripsi, 100) }}</p>
            <div class="d-flex align-items-center justify-content-between">
              <span class="fw-bold text-danger">Rp {{ number_format($booth->harga_sewa,0,',','.') }}/hari</span>
              <span class="badge bg-{{ $booth->status=='tersedia'?'success':'secondary' }}">{{ ucfirst($booth->status) }}</span>
            </div>
          </div>
          <div class="card-footer bg-white border-0">
            <a href="{{ route('user.booth.sewa.create', $booth->id) }}" class="btn btn-danger w-100">
              <i class="fas fa-handshake me-1"></i> Sewa Sekarang
            </a>
          </div>
        </div>
      </div>
      @empty
      <div class="col-12 text-center text-muted">Belum ada booth tersedia.</div>
      @endforelse
    </div>
  </div>
</div>
@endsection
