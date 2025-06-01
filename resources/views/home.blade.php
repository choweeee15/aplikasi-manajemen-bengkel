
    @extends('layouts.main')
    @section('title', 'Halaman Home') 

    @section('content')

    
    <!-- Spinner Start -->
    <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div>
    <!-- Spinner End -->


    <!-- Topbar Start -->
    <div class="container-fluid bg-light p-0">
        <div class="row gx-0 d-none d-lg-flex">
            <div class="col-lg-7 px-5 text-start">
                <div class="h-100 d-inline-flex align-items-center py-3 me-4">
                    <small class="fa fa-map-marker-alt text-primary me-2"></small>
                    <small>Bengkong, Batam, Indonesia</small>
                </div>
                <div class="h-100 d-inline-flex align-items-center py-3">
                    <small class="far fa-clock text-primary me-2"></small>
                    <small>Mon - Fri : 09.00 AM - 09.00 PM</small>
                </div>
            </div>
            <div class="col-lg-5 px-5 text-end">
                <div class="h-100 d-inline-flex align-items-center py-3 me-4">
                    <small class="fa fa-phone-alt text-primary me-2"></small>
                    <small>+62 823 8762 8115</small>
                </div>
                
                <div class="h-100 d-inline-flex align-items-center">
                    <a class="btn btn-sm-square bg-white text-primary me-1" href=""><i class="fab fa-linkedin-in"></i></a>
                </div>
            </div>
        </div>
    </div>
    <!-- Topbar End -->


    <!-- Navbar Start -->
    <nav class="navbar navbar-expand-lg bg-white navbar-light shadow sticky-top p-0">
        <a href="index.html" class="navbar-brand d-flex align-items-center px-4 px-lg-5">
            <h2 class="m-0 text-primary"><i class="fa fa-car me-3"></i>Bengkel ku</h2>
        </a>
        <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav ms-auto p-4 p-lg-0">
                <a href="home" class="nav-item nav-link active">
                    <i class="fas fa-home me-2"></i> Home
                </a>
                
                <a href="{{ route('booking.history') }}" class="nav-item nav-link {{ request()->routeIs('booking.history') ? 'active' : '' }}">
                    <i class="fas fa-calendar-check me-2"></i> Riwayat Booking
                </a>
                
                <a href="{{ route('riwayat.pembayaran') }}" class="nav-item nav-link {{ request()->is('riwayat-pembayaran') ? 'active' : '' }}">
                    <i class="fas fa-money-bill-wave me-2"></i> Riwayat Pembayaran
                </a>                
                {{-- <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Pages</a>
                    <div class="dropdown-menu fade-up m-0">
                        <a href="booking.html" class="dropdown-item">Booking</a>
                        <a href="team.html" class="dropdown-item">Technicians</a>
                        <a href="testimonial.html" class="dropdown-item">Testimonial</a>
                        <a href="404.html" class="dropdown-item">404 Page</a>
                    </div> --}}
                </div>
                <form method="POST" action="{{ route('logout') }}" class="d-inline">
                    @csrf
                    <button type="submit" class="nav-item nav-link btn btn-link text-dark px-3" style="text-decoration: none;">
                        <i class="fas fa-sign-out-alt me-1"></i>Logout
                    </button>
                </form>
                
            {{-- </div>
            <a href="" class="btn btn-primary py-4 px-lg-5 d-none d-lg-block">Get A Quote<i class="fa fa-arrow-right ms-3"></i></a>
        </div> --}}
    </nav>
    <!-- Navbar End -->


    <!-- Carousel Start -->
<div class="container-fluid p-0 mb-5">
    <div id="header-carousel" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img class="w-100" src="img/carousel-bg-1.jpg" alt="Gambar Bengkel">
                <div class="carousel-caption d-flex align-items-center">
                    <div class="container">
                        <div class="row align-items-center justify-content-center justify-content-lg-start">
                            <div class="col-10 col-lg-7 text-center text-lg-start">
                                <h6 class="text-white text-uppercase mb-3 animated slideInDown">// Perbaikan Mesin //</h6>
                                <h1 class="display-3 text-white mb-4 pb-3 animated slideInDown">Pusat Servis Mobil Profesional dan Berkualitas</h1>
                                <a href="#" class="btn btn-primary py-3 px-5 animated slideInDown">Pelajari Lebih Lanjut<i class="fa fa-arrow-right ms-3"></i></a>
                            </div>
                            <div class="col-lg-5 d-none d-lg-flex animated zoomIn">
                                <img class="img-fluid" src="img/carousel-1.png" alt="Gambar Perbaikan Mesin">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <img class="w-100" src="img/carousel-bg-2.jpg" alt="Gambar Servis Kendaraan">
                <div class="carousel-caption d-flex align-items-center">
                    <div class="container">
                        <div class="row align-items-center justify-content-center justify-content-lg-start">
                            <div class="col-10 col-lg-7 text-center text-lg-start">
                                <h6 class="text-white text-uppercase mb-3 animated slideInDown">// Servis Kendaraan //</h6>
                                <h1 class="display-3 text-white mb-4 pb-3 animated slideInDown">Layanan Perawatan dan Perbaikan Mobil Profesional</h1>
                                <a href="#" class="btn btn-primary py-3 px-5 animated slideInDown">Pelajari Lebih Lanjut<i class="fa fa-arrow-right ms-3"></i></a>
                            </div>
                            <div class="col-lg-5 d-none d-lg-flex animated zoomIn">
                                <img class="img-fluid" src="img/carousel-2.png" alt="Gambar Servis Kendaraan">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#header-carousel"
            data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Sebelumnya</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#header-carousel"
            data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Selanjutnya</span>
        </button>
    </div>
</div>
<!-- Carousel End -->



    <!-- Service Start -->
<div class="container-xxl py-5">
    <div class="container">
        <div class="row g-4">
            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                <div class="d-flex py-5 px-4">
                    <i class="fa fa-wrench fa-3x text-primary flex-shrink-0"></i>
                    <div class="ps-4">
                        <h5 class="mb-3">Perbaikan Kendaraan Berkualitas</h5>
                        <p>Teknisi kami ahli dalam memperbaiki berbagai jenis kendaraan dengan hasil yang memuaskan.</p>
                        {{-- <a class="text-secondary border-bottom" href="">Pelajari Lebih Lanjut</a> --}}
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                <div class="d-flex bg-light py-5 px-4">
                    <i class="fa fa-truck-moving fa-3x text-primary flex-shrink-0"></i>
                    <div class="ps-4">
                        <h5 class="mb-3">Layanan Pick Up & Drop Off</h5>
                        <p>Kendaraan Anda kami jemput dan antar kembali dengan aman, tanpa repot keluar rumah.</p>
                        {{-- <a class="text-secondary border-bottom" href="">Pelajari Lebih Lanjut</a> --}}
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
                <div class="d-flex py-5 px-4">
                    <i class="fa fa-clock fa-3x text-primary flex-shrink-0"></i>
                    <div class="ps-4">
                        <h5 class="mb-3">Layanan Cepat dan Tepat Waktu</h5>
                        <p>Kami menjamin pengerjaan kendaraan sesuai jadwal agar Anda tidak perlu menunggu lama.</p>
                        {{-- <a class="text-secondary border-bottom" href="">Pelajari Lebih Lanjut</a> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Service End -->



   



    <!-- Fact Start -->
<div class="container-fluid fact bg-dark my-5 py-5">
    <div class="container">
        <div class="row g-4">
            <div class="col-md-6 col-lg-3 text-center wow fadeIn" data-wow-delay="0.1s">
                <i class="fa fa-check fa-2x text-white mb-3"></i>
                <h2 class="text-white mb-2" data-toggle="counter-up">124</h2>
                <p class="text-white mb-0">Tahun Pengalaman</p>
            </div>
            <div class="col-md-6 col-lg-3 text-center wow fadeIn" data-wow-delay="0.3s">
                <i class="fa fa-users-cog fa-2x text-white mb-3"></i>
                <h2 class="text-white mb-2" data-toggle="counter-up">48</h2>
                <p class="text-white mb-0">Teknisi Ahli</p>
            </div>
            <div class="col-md-6 col-lg-3 text-center wow fadeIn" data-wow-delay="0.5s">
                <i class="fa fa-users fa-2x text-white mb-3"></i>
                <h2 class="text-white mb-2" data-toggle="counter-up">5932</h2>
                <p class="text-white mb-0">Pelanggan Puas</p>
            </div>
            <div class="col-md-6 col-lg-3 text-center wow fadeIn" data-wow-delay="0.7s">
                <i class="fa fa-car fa-2x text-white mb-3"></i>
                <h2 class="text-white mb-2" data-toggle="counter-up">1324</h2>
                <p class="text-white mb-0">Proyek Selesai</p>
            </div>
        </div>
    </div>
</div>
<!-- Fact End -->



    <!-- Service Start -->
<div class="container-xxl service py-5">
    <div class="container">
        <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
            <h6 class="text-primary text-uppercase">// Layanan Kami //</h6>
            <h1 class="mb-5">Jelajahi Layanan Bengkel Kami</h1>
        </div>
        <div class="row g-4 wow fadeInUp" data-wow-delay="0.3s">
            <div class="col-lg-4">
                <div class="nav w-100 nav-pills me-4 flex-column">
                    <button class="nav-link w-100 d-flex align-items-center text-start p-4 mb-4 active" data-bs-toggle="pill" data-bs-target="#tab-pane-1" type="button">
                        <i class="fa fa-car-side fa-2x me-3"></i>
                        <h4 class="m-0">Tes Diagnostik</h4>
                    </button>
                    <button class="nav-link w-100 d-flex align-items-center text-start p-4 mb-4" data-bs-toggle="pill" data-bs-target="#tab-pane-2" type="button">
                        <i class="fa fa-cogs fa-2x me-3"></i>
                        <h4 class="m-0">Servis Mesin</h4>
                    </button>
                    <button class="nav-link w-100 d-flex align-items-center text-start p-4 mb-4" data-bs-toggle="pill" data-bs-target="#tab-pane-3" type="button">
                        <i class="fa fa-car fa-2x me-3"></i>
                        <h4 class="m-0">Penggantian Ban</h4>
                    </button>
                    <button class="nav-link w-100 d-flex align-items-center text-start p-4 mb-0" data-bs-toggle="pill" data-bs-target="#tab-pane-4" type="button">
                        <i class="fa fa-oil-can fa-2x me-3"></i>
                        <h4 class="m-0">Ganti Oli</h4>
                    </button>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="tab-content w-100">
                    <div class="tab-pane fade show active" id="tab-pane-1">
                        <div class="row g-4">
                            <div class="col-md-6" style="min-height: 350px;">
                                <div class="position-relative h-100">
                                    <img class="position-absolute img-fluid w-100 h-100" src="img/service-1.jpg" style="object-fit: cover;" alt="Tes Diagnostik">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <h3 class="mb-3">Pengalaman 15 Tahun di Tes Diagnostik</h3>
                                <p class="mb-4">Profesional dan teliti dalam mendeteksi masalah kendaraan Anda dengan peralatan canggih.</p>
                                <p><i class="fa fa-check text-success me-3"></i>Diagnosa Akurat</p>
                                <p><i class="fa fa-check text-success me-3"></i>Teknisi Ahli</p>
                                <p><i class="fa fa-check text-success me-3"></i>Peralatan Modern</p>
                                {{-- <a href="#" class="btn btn-primary py-3 px-5 mt-3">Pelajari Lebih Lanjut <i class="fa fa-arrow-right ms-3"></i></a> --}}
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="tab-pane-2">
                        <div class="row g-4">
                            <div class="col-md-6" style="min-height: 350px;">
                                <div class="position-relative h-100">
                                    <img class="position-absolute img-fluid w-100 h-100" src="img/service-2.jpg" style="object-fit: cover;" alt="Servis Mesin">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <h3 class="mb-3">Servis Mesin Lengkap</h3>
                                <p class="mb-4">Perawatan mesin optimal untuk performa kendaraan Anda yang maksimal dan awet.</p>
                                <p><i class="fa fa-check text-success me-3"></i>Pemeriksaan Mesin Lengkap</p>
                                <p><i class="fa fa-check text-success me-3"></i>Perbaikan Profesional</p>
                                <p><i class="fa fa-check text-success me-3"></i>Suku Cadang Berkualitas</p>
                                <a href="#" class="btn btn-primary py-3 px-5 mt-3">Pelajari Lebih Lanjut <i class="fa fa-arrow-right ms-3"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="tab-pane-3">
                        <div class="row g-4">
                            <div class="col-md-6" style="min-height: 350px;">
                                <div class="position-relative h-100">
                                    <img class="position-absolute img-fluid w-100 h-100" src="img/service-3.jpg" style="object-fit: cover;" alt="Penggantian Ban">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <h3 class="mb-3">Penggantian Ban Profesional</h3>
                                <p class="mb-4">Ganti ban berkualitas dengan pemasangan cepat dan tepat.</p>
                                <p><i class="fa fa-check text-success me-3"></i>Ban Berkualitas Tinggi</p>
                                <p><i class="fa fa-check text-success me-3"></i>Pemasangan Cepat</p>
                                <p><i class="fa fa-check text-success me-3"></i>Aman & Terpercaya</p>
                                <a href="#" class="btn btn-primary py-3 px-5 mt-3">Pelajari Lebih Lanjut <i class="fa fa-arrow-right ms-3"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="tab-pane-4">
                        <div class="row g-4">
                            <div class="col-md-6" style="min-height: 350px;">
                                <div class="position-relative h-100">
                                    <img class="position-absolute img-fluid w-100 h-100" src="img/service-4.jpg" style="object-fit: cover;" alt="Ganti Oli">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <h3 class="mb-3">Penggantian Oli Profesional</h3>
                                <p class="mb-4">Penggantian oli berkala untuk menjaga mesin kendaraan tetap sehat dan awet.</p>
                                <p><i class="fa fa-check text-success me-3"></i>Produk Oli Premium</p>
                                <p><i class="fa fa-check text-success me-3"></i>Pelayanan Cepat</p>
                                <p><i class="fa fa-check text-success me-3"></i>Ramah Lingkungan</p>
                                <a href="#" class="btn btn-primary py-3 px-5 mt-3">Pelajari Lebih Lanjut <i class="fa fa-arrow-right ms-3"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
     </div>
</div>
<!-- Service End -->


    <!-- Booking Start -->
<div class="container-fluid bg-secondary booking my-5 wow fadeInUp" data-wow-delay="0.1s">
    <div class="container">
        <div class="row gx-5">
            <div class="col-lg-6 py-5">
                <div class="py-5">
                    <h1 class="text-white mb-4">Form Booking Layanan</h1>
                    <p class="text-white mb-0">
                        Silakan isi formulir berikut untuk mengajukan permintaan servis kendaraan Anda.
                        Kami akan segera menindaklanjutinya setelah menerima data Anda.
                    </p>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="bg-primary h-100 d-flex flex-column justify-content-center text-center p-5 wow zoomIn" data-wow-delay="0.6s">
                    <h1 class="text-white mb-4">Booking Servis</h1>
                    <form method="POST" action="{{ route('booking.store') }}">
                        @csrf
                        <div class="row g-3">

                            <div class="col-12">
                                <input type="text" name="nama_pemilik" class="form-control border-0" placeholder="Nama Pemilik" style="height: 55px;" required>
                            </div>

                            <div class="col-12 col-sm-6">
                                <input type="text" name="no_hp" class="form-control border-0" placeholder="Nomor HP" style="height: 55px;">
                            </div>

                            <div class="col-12 col-sm-6">
                                <select class="form-select border-0" name="kategori_id" required style="height: 55px;">
                                    <option value="" disabled selected>Pilih Kategori</option>
                                    @isset($kategoriList)
                                        @foreach($kategoriList as $kategori)
                                            <option value="{{ $kategori->id }}">{{ $kategori->nama_kategori }}</option>
                                        @endforeach
                                    @else
                                        <option value="" disabled>Tidak ada kategori tersedia</option>
                                    @endisset
                                </select>
                            </div>

                            <div class="col-12 col-sm-6">
                                <select class="form-select border-0" name="layanan_id" required style="height: 55px;">
                                    <option value="" disabled selected>Pilih Layanan</option>
                                    @isset($layanans)
                                        @foreach($layanans as $layanan)
                                            <option value="{{ $layanan->id }}">{{ $layanan->nama_layanan }}</option>
                                        @endforeach
                                    @else
                                        <option value="" disabled>Tidak ada layanan tersedia</option>
                                    @endisset
                                </select>
                            </div>

                            <div class="col-12 col-sm-6">
                                <input type="text" name="nama_kendaraan" class="form-control border-0" placeholder="Nama Kendaraan" style="height: 55px;">
                            </div>

                            <div class="col-12 col-sm-6">
                                <input type="text" name="model_kendaraan" class="form-control border-0" placeholder="Model Kendaraan" style="height: 55px;">
                            </div>

                            <div class="col-12 col-sm-6">
                                <input type="text" name="tipe_kendaraan" class="form-control border-0" placeholder="Tipe Kendaraan" style="height: 55px;">
                            </div>

                            <div class="col-12">
                                <select name="jenis_permintaan" class="form-select border-0" style="height: 55px;">
                                    <option value="" disabled selected>Jenis Permintaan</option>
                                    <option value="dropoff">Drop Off</option>
                                    <option value="pickup">Pick Up</option>
                                </select>
                            </div>

                            <div class="col-12">
                                <textarea class="form-control border-0" name="alamat" placeholder="Alamat Lengkap" rows="2"></textarea>
                            </div>

                            <div class="col-12">
                                <textarea class="form-control border-0" name="catatan_admin" placeholder="Catatan Tambahan" rows="2"></textarea>
                            </div>

                            <div class="col-12">
                                <button class="btn btn-secondary w-100 py-3" type="submit">Kirim Booking</button>
                            </div>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Booking End -->




   


    <!-- Testimonial Start -->
<div class="container-xxl py-5 wow fadeInUp" data-wow-delay="0.1s">
    <div class="container">
        <div class="text-center">
            <h6 class="text-primary text-uppercase">// Testimonial //</h6>
            <h1 class="mb-5">Our Clients Say!</h1>
        </div>
        <div class="owl-carousel testimonial-carousel position-relative">
            <div class="testimonial-item text-center">
                <img class="bg-light rounded-circle p-2 mx-auto mb-3" src="img/testimonial-1.jpg" style="width: 80px; height: 80px;">
                <h5 class="mb-0">Client One</h5>
                <p>Profession</p>
                <div class="testimonial-text bg-light text-center p-4">
                    <p class="mb-0">Sangat puas dengan layanan bengkel ini, cepat dan profesional!</p>
                </div>
            </div>
            <div class="testimonial-item text-center">
                <img class="bg-light rounded-circle p-2 mx-auto mb-3" src="img/testimonial-2.jpg" style="width: 80px; height: 80px;">
                <h5 class="mb-0">Client Two</h5>
                <p>Profession</p>
                <div class="testimonial-text bg-light text-center p-4">
                    <p class="mb-0">Teknisi sangat ramah dan hasil kerjanya memuaskan.</p>
                </div>
            </div>
            <div class="testimonial-item text-center">
                <img class="bg-light rounded-circle p-2 mx-auto mb-3" src="img/testimonial-3.jpg" style="width: 80px; height: 80px;">
                <h5 class="mb-0">Client Three</h5>
                <p>Profession</p>
                <div class="testimonial-text bg-light text-center p-4">
                    <p class="mb-0">Harga transparan dan pelayanan sangat profesional. Terbaik!</p>
                </div>
            </div>
            <div class="testimonial-item text-center">
                <img class="bg-light rounded-circle p-2 mx-auto mb-3" src="img/testimonial-4.jpg" style="width: 80px; height: 80px;">
                <h5 class="mb-0">Client Four</h5>
                <p>Profession</p>
                <div class="testimonial-text bg-light text-center p-4">
                    <p class="mb-0">Sangat direkomendasikan untuk servis kendaraan rutin.</p>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Testimonial End -->

    <script>
        $(document).ready(function(){
            $(".testimonial-carousel").owlCarousel({
                loop: true,
                margin: 30,
                nav: false,
                dots: true,
                autoplay: true,
                autoplayTimeout: 5000,
                responsive: {
                    0: { items: 1 },
                    768: { items: 2 },
                    992: { items: 3 } // Tampilkan 3 item di layar besar
                }
            });
        });
    </script>
    
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- ... FORM BOOKING KAMU DISINI ... -->

<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

@if(session('success'))
<script>
    Swal.fire({
        icon: 'success',
        title: '<span style="color:#a4161a; font-weight:bold;">Booking Berhasil!</span>',
        html: `<p style="color:#5a0000; font-size:1.1rem;">
               Terima kasih, permintaan booking Anda telah dikirim.<br>
               Silakan tunggu konfirmasi dari admin.<br><br>
               Cek statusnya di menu <strong>Riwayat Booking</strong>.
               </p>`,
        confirmButtonText: 'OK',
        confirmButtonColor: '#7b0000', // maroon muda
        background: '#fff0f0', // latar belakang soft merah muda
        iconColor: '#a4161a', // warna ikon centang merah maroon
        customClass: {
            popup: 'shadow-lg rounded-3',
            title: 'fs-4',
            content: 'fs-6',
        }
    }).then(() => {
        window.location.href = "{{ route('user.home') }}"; // arahkan sesuai kebutuhan
    });
</script>
@endif


    {{-- @include('layouts.footer') --}}
    @endsection