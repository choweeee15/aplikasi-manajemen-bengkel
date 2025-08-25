@extends('layouts.app')
@section('title','Kelola Transaksi Sewa Booth')
@section('content')
<div class="dashboard-container">
  <div class="d-flex justify-content-between align-items-center mb-4">
    <h2 class="title-heading"><i class="fas fa-handshake me-2"></i> Transaksi Sewa Booth</h2>
    <div class="summary d-flex gap-2">
      <div class="card p-2 px-3"><small>Total</small><div class="fw-bold">{{ $rekap['total'] }}</div></div>
      <div class="card p-2 px-3"><small>Menunggu</small><div class="fw-bold">{{ $rekap['menunggu'] }}</div></div>
      <div class="card p-2 px-3"><small>Disetujui</small><div class="fw-bold">{{ $rekap['disetujui'] }}</div></div>
      <div class="card p-2 px-3"><small>Ditolak</small><div class="fw-bold">{{ $rekap['ditolak'] }}</div></div>
    </div>
  </div>

  <div class="card card-dark mb-3">
    <div class="card-body">
      <form class="row g-2">
        <div class="col-md-4"><input type="email" name="email" value="{{ $email }}" class="form-control" placeholder="Filter email penyewa"></div>
        <div class="col-md-4"><input type="text" name="booth" value="{{ $booth }}" class="form-control" placeholder="Cari nama booth"></div>
        <div class="col-md-3">
          <select name="status" class="form-select">
            <option value="">Semua Status</option>
            <option value="menunggu"  {{ $status==='menunggu'?'selected':'' }}>Menunggu</option>
            <option value="disetujui" {{ $status==='disetujui'?'selected':'' }}>Disetujui</option>
            <option value="ditolak"   {{ $status==='ditolak'?'selected':'' }}>Ditolak</option>
          </select>
        </div>
        <div class="col-md-1 d-grid"><button class="btn btn-light text-dark"><i class="fas fa-filter"></i></button></div>
      </form>
    </div>
  </div>

  <div class="card card-dark">
    <div class="card-body p-3">
      <div class="table-responsive">
        <table class="table table-hover table-striped align-middle text-center mb-0">
          <thead><tr>
            <th>#</th><th>Penyewa</th><th>Booth</th><th>Periode</th><th>Total Bayar</th><th>Status</th>
          </tr></thead>
          <tbody>
          @forelse($rows as $i=>$t)
            <tr>
              <td>{{ $rows->firstItem()+$i }}</td>
              <td>{{ $t->penyewa->nama ?? '-' }}<br><small class="text-muted">{{ $t->penyewa->email ?? '-' }}</small></td>
              <td>{{ $t->booth->nama_booth ?? '-' }}</td>
              <td>{{ \Carbon\Carbon::parse($t->tanggal_mulai)->format('d M Y') }} – {{ \Carbon\Carbon::parse($t->tanggal_selesai)->format('d M Y') }}</td>
              <td>Rp {{ number_format($t->total_bayar,0,',','.') }}</td>
              <td><span class="badge bg-@switch($t->status) @case('disetujui')success @break @case('ditolak')danger @break @default warning @endswitch">{{ ucfirst($t->status) }}</span></td>
            </tr>
          @empty
            <tr><td colspan="6" class="text-muted">Belum ada data.</td></tr>
          @endforelse
          </tbody>
        </table>
      </div>
      <div class="mt-3">{{ $rows->links() }}</div>
    </div>
  </div>
</div>
@endsection
