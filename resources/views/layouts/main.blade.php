<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>@yield('title', 'CarServ - Car Repair')</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <!-- HEAD -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    <link href="{{ asset('img/favicon.ico') }}" rel="icon">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Barlow:wght@600;700&family=Ubuntu:wght@400;500&display=swap" rel="stylesheet">

    <!-- Icon Fonts -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries -->
    <link href="{{ asset('lib/animate/animate.min.css') }}" rel="stylesheet">
    <link href="{{ asset('lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">
    <link href="{{ asset('lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css') }}" rel="stylesheet">

    <!-- Bootstrap -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Main Style -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">

    <!-- Dashboard Admin Custom Styles -->
    @yield('dashboard-css')
    <style>
    /* Jika kamu gak pakai @section('dashboard-css'), fallback styling bisa di sini juga */

    .dashboard-container {
        padding: 30px;
        background: linear-gradient(135deg, #4e0000, #800000);
        min-height: 100vh;
        animation: fadeInScale 1s ease forwards;
        color: #f8f8f8;
    }
    @keyframes fadeInScale {
        0% {
            opacity: 0;
            transform: scale(0.95);
        }
        100% {
            opacity: 1;
            transform: scale(1);
        }
    }
    .stat-card {
        border-radius: 12px;
        color: white;
        box-shadow: 0 8px 20px rgb(255 0 0 / 0.3);
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        cursor: default;
    }
    .stat-card:hover {
        transform: translateY(-8px);
        box-shadow: 0 12px 30px rgb(255 0 0 / 0.5);
    }
    .stat-icon {
        font-size: 2.8rem;
        margin-bottom: 10px;
    }
    .category-card {
        background: linear-gradient(45deg, #7b0000, #b30000);
    }
    .mechanic-card {
        background: linear-gradient(45deg, #a30000, #d10000);
    }
    .service-card {
        background: linear-gradient(45deg, #8b0000, #cc0000);
    }
    .finished-card {
        background: linear-gradient(45deg, #6b0000, #9f0000);
    }
    .chart-card, .notif-card, .quick-action-card {
        background: #5a0000;
        border-radius: 12px;
        color: white;
        box-shadow: 0 6px 15px rgb(255 0 0 / 0.2);
    }
    .chart-card .card-header,
    .notif-card .card-header,
    .quick-action-card .card-header {
        background: transparent;
        font-weight: 600;
        font-size: 1.2rem;
        border-bottom: 1px solid #9f0000;
    }
    .btn-gradient-red {
        background: linear-gradient(45deg, #b30000, #7b0000);
        color: #fff;
        border: none;
        transition: background 0.3s ease;
    }
    .btn-gradient-red:hover {
        background: linear-gradient(45deg, #d10000, #a30000);
        color: white;
    }
    ul.list-unstyled li {
        margin-bottom: 10px;
        font-size: 0.95rem;
    }
    ul.list-unstyled li i {
        margin-right: 10px;
    }
    </style>
</head>
<body>

    @include('layouts.header')

    <main>
        @yield('content')
    </main>

    @include('layouts.footer')

    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>

    <!-- Chart.js for dashboard -->
    @yield('dashboard-js')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

</body>
</html>
