<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Dashboard - ImmiBot')</title>
    <link rel="icon" href="{{ asset('images/logo.png') }}" type="image/png">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <style>
        body {
            background-color: #f5f6fa;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        /* Sidebar */
        .sidebar {
            position: fixed;
            top: 0;
            left: 0;
            height: 100%;
            width: 250px;
            background-color: #283a52;
            padding-top: 1rem;
            transition: all 0.3s;
            box-shadow: 2px 0 6px rgba(0, 0, 0, 0.15);
            z-index: 1050;
        }

        .sidebar.collapsed {
            left: -250px;
        }

        .sidebar .sidebar-header {
            padding: 1.5rem;
            text-align: center;
            color: #fff;
        }

        .sidebar .sidebar-header img {
            height: 50px;
            margin-bottom: 0.5rem;
        }

        .sidebar .nav-link {
            color: rgba(255, 255, 255, 0.75);
            padding: 10px 20px;
            border-radius: 4px;
            transition: all 0.2s;
        }

        .sidebar .nav-link:hover,
        .sidebar .nav-link.active {
            color: #fff;
            background-color: rgba(255, 255, 255, 0.1);
        }

        .sidebar .nav-link .fa {
            width: 20px;
            text-align: center;
        }

        /* Main Content */
        .main-content {
            margin-left: 250px;
            padding: 20px;
            transition: all 0.3s;
        }

        .main-content.expanded {
            margin-left: 0;
        }

        /* Navbar */
        .navbar-custom {
            background-color: #fff;
            border-bottom: 1px solid #dee2e6;
            box-shadow: 0 2px 5px rgba(0, 0, 0, .1);
        }

        /* Stats Card */
        .stat-card {
            border-left-width: 5px;
            border-radius: .35rem;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.05);
        }

        .stat-card.border-primary {
            border-left-color: #0d6efd;
        }

        .stat-card.border-success {
            border-left-color: #198754;
        }

        .stat-card.border-info {
            border-left-color: #0dcaf0;
        }

        .stat-card.border-warning {
            border-left-color: #ffc107;
        }

        @media (max-width: 768px) {
            .sidebar {
                left: -250px;
            }
            .sidebar.show {
                left: 0;
            }
            .main-content {
                margin-left: 0;
            }
        }
    </style>
</head>

<body>
    <div class="d-flex">
        <!-- Sidebar -->
        <nav class="sidebar d-flex flex-column" id="sidebar">
            <div class="sidebar-header">
                <img src="{{ asset('images/logo.png') }}" alt="ImmiBot Logo">
                <h5 class="mb-0">ImmiBot CS</h5>
            </div>
            <ul class="nav flex-column flex-grow-1">
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('admin') ? 'active' : '' }}" href="{{ route('admin.dashboard') }}">
                        <i class="fa fa-tachometer-alt me-2"></i> Dashboard
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('chat') ? 'active' : '' }}" href="{{ route('chat.index') }}">
                        <i class="fa fa-comments me-2"></i> Live Chat
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">
                        <i class="fa fa-history me-2"></i> Riwayat Chat
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('admin.users') }}">
                        <i class="fa fa-users me-2"></i> Manajemen User
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">
                        <i class="fa fa-cog me-2"></i> Pengaturan
                    </a>
                </li>
                <li class="nav-item mt-auto mb-3">
                    <form action="{{ route('logout') }}" method="POST" class="d-block">
                        @csrf
                        <button type="submit" class="nav-link text-start w-100" style="background: none; border: none; color: rgba(255,255,255,0.75);">
                            <i class="fa fa-sign-out-alt me-2"></i> Logout
                        </button>
                    </form>
                </li>
            </ul>
        </nav>

        <!-- Main Content -->
        <div class="main-content flex-grow-1" id="mainContent">
            <!-- Top Navbar -->
            <nav class="navbar navbar-expand-lg navbar-light navbar-custom mb-4">
                <div class="container-fluid">
                    <button class="btn btn-outline-secondary" id="sidebarToggle">
                        <i class="fa fa-bars"></i>
                    </button>
                    <div class="d-flex ms-auto">
                        <div class="dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fa fa-user-circle me-1"></i>
                                {{ Auth::user()->name ?? 'Customer Service' }}
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end">
                                <li><a class="dropdown-item" href="{{ route('profile.edit') }}">Profil</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li>
                                    <form action="{{ route('logout') }}" method="POST">
                                        @csrf
                                        <button type="submit" class="dropdown-item">
                                            <i class="fa fa-sign-out-alt me-2"></i> Logout
                                        </button>
                                    </form>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </nav>

            <!-- Page Content -->
            <div class="container-fluid">
                @yield('content')
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.getElementById('sidebarToggle').addEventListener('click', function () {
            const sidebar = document.getElementById('sidebar');
            const mainContent = document.getElementById('mainContent');

            if (window.innerWidth > 768) {
                sidebar.classList.toggle('collapsed');
                mainContent.classList.toggle('expanded');
            } else {
                sidebar.classList.toggle('show');
            }
        });
    </script>
</body>
</html>
