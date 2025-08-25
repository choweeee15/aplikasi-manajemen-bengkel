@extends('layouts.app')
@section('title','Kelola Pembelian Tiket')
@section('content')
<div class="dashboard-container">
  <div class="d-flex justify-content-between align-items-center mb-4">
    <h2 class="title-heading"><i class="fas fa-receipt me-2"></i> Kelola Pembelian Tiket</h2>
    <div class="summary d-flex gap-2">
      <div class="card p-2 px-3"><small>Total</small><div class="fw-bold">{{ $rekap['total'] }}</div></div>
      <div class="card p-2 px-3"><small>Lunas</small><div class="fw-bold">{{ $rekap['lunas'] }}</div></div>
      <div class="card p-2 px-3"><small>Menunggu</small><div class="fw-bold">{{ $rekap['pending'] }}</div></div>
    </div>
  </div>

  <div class="card card-dark mb-3">
    <div class="card-body">
      <form class="row g-2">
        <div class="col-md-4"><input type="email" name="email" value="{{ $email }}" class="form-control" placeholder="Filter email pengunjung"></div>
        <div class="col-md-3">
          <select name="status" class="form-select">
            <option value="">Semua Status</option>
            <option value="menunggu" {{ $status==='menunggu'?'selected':'' }}>Menunggu</option>
            <option value="lunas" {{ $status==='lunas'?'selected':'' }}>Lunas</option>
          </select>
        </div>
        <div class="col-md-3 d-grid"><button class="btn btn-light text-dark"><i class="fas fa-filter me-1"></i> Terapkan</button></div>
      </form>
    </div>
  </div>

  <div class="card card-dark">
    <div class="card-body p-3">
      <div class="table-responsive">
        <table class="table table-hover table-striped text-center align-middle mb-0 bg-white">
          <thead>
          <tr><th>#</th><th>Tiket</th><th>Qty</th><th>Total</th><th>Status</th><th>Email</th><th>Tanggal</th></tr>
          </thead>
          <tbody>
          @forelse($rows as $i => $row)
            <tr>
              <td>{{ $rows->firstItem() + $i }}</td>
              <td>{{ $row->tiket->nama_tiket ?? $row->tiket_id }}</td>
              <td>{{ $row->jumlah }}</td>
              <td>Rp {{ number_format($row->total_harga,0,',','.') }}</td>
              <td><span class="badge bg-{{ $row->status_bayar === 'lunas' ? 'success' : 'warning' }}">{{ ucfirst($row->status_bayar) }}</span></td>
              <td>{{ $row->pengunjung->email ?? '-' }}</td>
              <td>{{ \Carbon\Carbon::parse($row->created_at)->format('d M Y H:i') }}</td>
            </tr>
          @empty
            <tr><td colspan="7" class="text-muted">Belum ada data.</td></tr>
          @endforelse
          </tbody>
        </table>
      </div>
      <div class="mt-3">{{ $rows->links() }}</div>
    </div>
  </div>
</div>
@endsection
