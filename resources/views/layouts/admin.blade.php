<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') - Admin OTW Mbengkel</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <style>
        :root { --sidebar-width: 260px; }
        body { font-family: 'Poppins', sans-serif; background-color: #F8FAFC; overflow: hidden; height: 100vh; }
        
        /* Sidebar */
        .sidebar { width: var(--sidebar-width); height: 100vh; background: white; border-right: 1px solid #E2E8F0; position: fixed; top: 0; left: 0; padding: 20px; z-index: 1000; overflow-y: auto; }
        .sidebar-brand { margin-bottom: 30px; display: flex; align-items: center; justify-content: center; padding-bottom: 20px; border-bottom: 1px solid #F1F5F9; }
        
        /* Main Content */
        .main-content { margin-left: var(--sidebar-width); padding: 30px; height: 100vh; overflow-y: auto; }
        
        /* Menu Links */
        .nav-link { display: flex; align-items: center; gap: 12px; padding: 12px 16px; color: #64748B; border-radius: 12px; margin-bottom: 5px; font-weight: 500; font-size: 14px; text-decoration: none; transition: 0.3s; }
        .nav-link:hover { background-color: #EFF6FF; color: #2563EB; }
        .nav-link.active { background-color: #EFF6FF; color: #2563EB; font-weight: 600; }
        
        /* Components */
        .stat-card { background: white; border: 1px solid #E2E8F0; border-radius: 16px; padding: 24px; height: 100%; transition: 0.3s; }
        .table-card { background: white; border: 1px solid #E2E8F0; border-radius: 16px; padding: 24px; }
        .avatar { width: 40px; height: 40px; background: #cbd5e1; border-radius: 10px; display: flex; justify-content: center; align-items: center; color: white; }
    </style>
</head>
<body>

    <div class="sidebar">
        <div class="sidebar-brand">
            {{-- Pastikan gambar logo ada, atau alt text akan muncul --}}
            <img src="{{ asset('assets/img/logo_mbengkel.png') }}" alt="OTW MBENGKEL" style="height: 50px; width: auto;">
        </div>
        
        <nav>
            <a href="{{ route('admin.dashboard') }}" class="nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                <i class="bi bi-speedometer2"></i> Dashboard
            </a>

            <a href="{{ route('admin.bookings') }}" class="nav-link {{ request()->routeIs('admin.bookings') ? 'active' : '' }}">
                <i class="bi bi-calendar-check"></i> Kelola Booking
            </a>

            <a href="{{ route('admin.services') }}" class="nav-link {{ request()->routeIs('admin.services') ? 'active' : '' }}">
                <i class="bi bi-tools"></i> Kelola Service
            </a>
            
            <div class="mt-4 mb-2 text-secondary text-uppercase" style="font-size: 11px; font-weight: 600; padding-left: 10px;">
                Data Master Mobile
            </div>
            
            <a href="{{ route('admin.vehicles') }}" class="nav-link {{ request()->routeIs('admin.vehicles') ? 'active' : '' }}">
                <i class="bi bi-car-front"></i> Data Kendaraan
            </a>

            <a href="{{ route('admin.customers') }}" class="nav-link {{ request()->routeIs('admin.customers') ? 'active' : '' }}">
                <i class="bi bi-people"></i> Data Customer
            </a>
        </nav>

        {{-- BAGIAN INI YANG DIREVISI: Mengarahkan ke route admin.logout --}}
        <div style="position: absolute; bottom: 20px; width: 85%;">
            <a href="{{ route('admin.logout') }}" class="nav-link text-danger">
                <i class="bi bi-box-arrow-right"></i> Logout
            </a>
        </div>
    </div>

    <div class="main-content">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h2 class="fw-bold text-dark m-0">@yield('page-title')</h2>
                <p class="text-secondary m-0" style="font-size: 14px;">@yield('page-subtitle')</p>
            </div>
            <div class="d-flex align-items-center gap-3">
                <div class="text-end d-none d-md-block">
                    <div class="fw-bold fs-6">Admin</div>
                    <div class="text-secondary" style="font-size: 12px;">admin@otewe.com</div>
                </div>
                <div class="avatar"><i class="bi bi-person"></i></div>
            </div>
        </div>

        @yield('content')
        
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    @stack('scripts')
</body>
</html>