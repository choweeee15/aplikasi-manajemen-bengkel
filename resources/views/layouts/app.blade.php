<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <title>@yield('title', 'Bengkel Admin')</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500;700&display=swap" rel="stylesheet">

    <!-- Bootstrap & Icon Fonts -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    <!-- Libraries -->
    <link href="{{ asset('lib/animate/animate.min.css') }}" rel="stylesheet">
    <link href="{{ asset('lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">
    <link href="{{ asset('lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css') }}" rel="stylesheet">

    <!-- Custom Styles -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">

    @yield('dashboard-css')

    <style>
        body {
            background-color: #f8f9fa;
            font-family: 'Montserrat', sans-serif;
        }

        .sidebar {
            background: linear-gradient(180deg, #5a0000, #2e0000);
            color: white;
            padding: 20px 0;
            height: 100vh;
            position: sticky;
            top: 0;
            border-right: 2px solid #770000;
            box-shadow: 4px 0 10px rgba(0, 0, 0, 0.2);
            font-family: 'Montserrat', sans-serif;
        }

        .sidebar h4 {
            font-weight: 700;
            margin-bottom: 30px;
            color: #f8d7da;
            text-align: center;
        }

        .menu-link {
            display: flex;
            align-items: center;
            padding: 10px 20px;
            color: #f0f0f0;
            text-decoration: none;
            transition: all 0.2s ease;
            font-size: 15px;
            border-left: 3px solid transparent;
            font-weight: 500;
        }

        .menu-link:hover,
        .menu-link.active {
            background-color: rgba(255, 255, 255, 0.08);
            color: #ffffff;
            border-left: 3px solid #ff4d4d;
            font-weight: 700;
        }

        .menu-section {
            margin: 12px 0 6px 20px;
            color: #fff;
            font-weight: 700;
            font-size: 0.9rem;
            text-transform: uppercase;
            letter-spacing: 0.05em;
        }

        .logout-btn {
            background-color: #b30000;
            color: white;
            padding: 12px 20px;
            border: none;
            width: 100%;
            text-align: left;
            transition: background 0.3s;
            font-family: 'Montserrat', sans-serif;
            font-weight: 600;
        }

        .logout-btn:hover {
            background-color: #8b0000;
        }

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

        table.table {
            background: #fff;
            color: #000;
            border-radius: 8px;
            overflow: hidden;
        }
    </style>
</head>
<body>
    <div class="container-fluid">
        <div class="row">

            <!-- Sidebar -->
            <nav class="col-md-3 col-lg-2 sidebar d-flex flex-column">
                <h4>🔧 Panel Admin</h4>

                {{-- DASHBOARD --}}
                <div class="menu-section">Dashboard</div>
                <a href="/dashboardadmin" class="menu-link {{ request()->is('dashboardadmin') ? 'active' : '' }}">
                    <i class="fas fa-home me-2"></i> Dashboard
                </a>

                {{-- OPERASIONAL --}}
                <div class="menu-section">Operasional</div>
                <a href="{{ route('service.requests') }}" class="menu-link {{ request()->is('service-requests') ? 'active' : '' }}">
                    <i class="fas fa-wrench me-2"></i> Service Requests
                </a>
                <a href="/mekanik" class="menu-link {{ request()->is('mekanik') ? 'active' : '' }}">
                    <i class="fas fa-tools me-2"></i> Mechanic List
                </a>

                {{-- MAINTENANCE --}}
                <div class="menu-section">Maintenance</div>
                <a href="/category" class="menu-link {{ request()->is('category') ? 'active' : '' }}">
                    <i class="fas fa-layer-group me-2"></i> Category List
                </a>
                <a href="/service" class="menu-link {{ request()->is('service') ? 'active' : '' }}">
                    <i class="fas fa-cogs me-2"></i> Service List
                </a>
                <a href="/users" class="menu-link {{ request()->is('users') ? 'active' : '' }}">
                    <i class="fas fa-users me-2"></i> User List
                </a>
                <a href="/settings" class="menu-link {{ request()->is('settings') ? 'active' : '' }}">
                    <i class="fas fa-sliders-h me-2"></i> Settings
                </a>

                {{-- ADMIN --}}
                <div class="menu-section">Admin</div>
                <a href="/riwayat-pembayaran-admin" class="menu-link {{ request()->is('riwayat-pembayaran-admin') ? 'active' : '' }}">
                    <i class="fas fa-credit-card me-2"></i> Laporan
                </a>
                <a href="/log_activity" class="menu-link {{ request()->is('log_activity') ? 'active' : '' }}">
                    <i class="fas fa-history me-2"></i> Log Activity
                </a>

                {{-- HOME BUTTON --}}
                <a href="/home" class="btn btn-gradient-red my-3 mx-3 text-center">
                    <i class="fas fa-house me-2"></i> Home Pengguna
                </a>


                {{-- LOGOUT --}}
                <form method="POST" action="{{ route('logout') }}" class="mt-auto px-3">
                    @csrf
                    <button type="submit" class="logout-btn">
                        <i class="fas fa-sign-out-alt me-2"></i> Logout
                    </button>
                </form>
            </nav>

            <!-- Main Content -->
            <main class="col-md-9 col-lg-10 p-4">
                @yield('content')
            </main>
        </div>
    </div>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script> AOS.init(); </script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    @yield('dashboard-js')
</body>
</html>
