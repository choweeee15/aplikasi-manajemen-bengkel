@extends('layouts.app')

@section('title', 'Dashboard Admin')

@section('dashboard-css')
<style>
    /* Card styling sesuai tema merah gelap */
    .stat-card {
        border-radius: 12px;
        box-shadow: 0 8px 25px rgba(255, 0, 0, 0.3);
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        cursor: default;
        padding: 25px 20px;
        color: #fff;
    }
    .stat-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 15px 40px rgba(255, 0, 0, 0.5);
    }

    .stat-icon {
        font-size: 3rem;
        margin-bottom: 10px;
        opacity: 0.8;
    }

    h5 {
        font-weight: 700;
        font-family: 'Montserrat', sans-serif;
        margin-bottom: 8px;
        letter-spacing: 0.05em;
    }

    h2 {
        font-weight: 900;
        font-family: 'Montserrat', sans-serif;
        font-size: 3rem;
        line-height: 1;
        text-shadow: 0 0 5px rgba(255, 0, 0, 0.5);
    }

    /* Background warna dan gradien untuk tiap jenis card */
    .bg-primary {
        background: linear-gradient(45deg, #7b0000, #b30000);
    }
    .bg-success {
        background: linear-gradient(45deg, #a30000, #d10000);
    }
    .bg-info {
        background: linear-gradient(45deg, #8b0000, #cc0000);
    }
    .bg-warning {
        background: linear-gradient(45deg, #6b0000, #9f0000);
    }
    .bg-danger {
        background: linear-gradient(45deg, #b20000, #ff0000);
    }
    .bg-secondary {
        background: linear-gradient(45deg, #4e0000, #800000);
    }

</style>
@endsection

@section('content')
<div class="dashboard-container">
    <h2 class="mb-4" data-aos="fade-down" data-aos-duration="700" data-aos-delay="200">Dashboard Admin</h2>

    <div class="row g-4">
        <div class="col-md-4" data-aos="fade-up" data-aos-duration="700" data-aos-delay="300">
            <div class="stat-card bg-primary text-center">
                <div class="stat-icon"><i class="fas fa-users"></i></div>
                <h5>Total Users</h5>
                <h2>{{ $totalUsers }}</h2>
            </div>
        </div>
        <div class="col-md-4" data-aos="fade-up" data-aos-duration="700" data-aos-delay="400">
            <div class="stat-card bg-success text-center">
                <div class="stat-icon"><i class="fas fa-file-signature"></i></div>
                <h5>Total Registrasi</h5>
                <h2>{{ $totalRegistrations }}</h2>
            </div>
        </div>
        <div class="col-md-4" data-aos="fade-up" data-aos-duration="700" data-aos-delay="500">
            <div class="stat-card bg-info text-center">
                <div class="stat-icon"><i class="fas fa-credit-card"></i></div>
                <h5>Total Pembayaran</h5>
                <h2>{{ $totalPayments }}</h2>
            </div>
        </div>
        <div class="col-md-4 mt-4" data-aos="fade-up" data-aos-duration="700" data-aos-delay="600">
            <div class="stat-card bg-warning text-center">
                <div class="stat-icon"><i class="fas fa-cogs"></i></div>
                <h5>Total Layanan</h5>
                <h2>{{ $totalServices }}</h2>
            </div>
        </div>
        <div class="col-md-4 mt-4" data-aos="fade-up" data-aos-duration="700" data-aos-delay="700">
            <div class="stat-card bg-danger text-center">
                <div class="stat-icon"><i class="fas fa-tools"></i></div>
                <h5>Total Mekanik</h5>
                <h2>{{ $totalMechanics }}</h2>
            </div>
        </div>
        <div class="col-md-4 mt-4" data-aos="fade-up" data-aos-duration="700" data-aos-delay="800">
            <div class="stat-card bg-secondary text-center">
                <div class="stat-icon"><i class="fas fa-layer-group"></i></div>
                <h5>Total Kategori Kendaraan</h5>
                <h2>{{ $totalCategories }}</h2>
            </div>
        </div>
    </div>
</div>
@endsection

@section('dashboard-js')
<script>
    AOS.init({
        once: true, // animasi hanya sekali saat scroll masuk
        easing: 'ease-in-out',
        duration: 700
    });
</script>
@endsection
