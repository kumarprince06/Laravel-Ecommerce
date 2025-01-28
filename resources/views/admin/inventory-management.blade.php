<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet"
        crossorigin="anonymous">
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" rel="stylesheet"
        crossorigin="anonymous">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;200;300;400;500;700;900&display=swap"
        rel="stylesheet">
    <!-- External CSS -->
    <link rel="stylesheet" href="{{ asset('css/templatemo.css') }}">
    <link rel="stylesheet" href="{{ asset('css/admin-dashboard.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    <!-- DataTables CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
</head>

<body class="bg-light">
    <!-- Header -->
    @php
        $currentPath = request()->path();
        $activeTab = last(explode('/', $currentPath));
    @endphp

    <header id="header" class="header fixed-top d-flex align-items-center bg-dark text-white">
        <div class="d-flex align-items-center justify-content-between">
            <a href="{{ route('dashboard') }}" class="logo d-flex align-items-center"> Admin Dashboard </a>
            <i class="bi bi-list toggle-sidebar-btn"></i>
        </div>
        <nav class="header-nav ms-auto">
            <ul class="d-flex align-items-center">
                <li class="nav-item dropdown pe-3">
                    <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#"
                        data-bs-toggle="dropdown">
                        <img src="{{ asset('/images/profile.webp') }}" alt="admin profile" class="rounded-circle">
                        <span
                            class="d-none d-md-block dropdown-toggle ps-2 text-white">{{ session('sessionData.userName') }}</span>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
                        <li class="dropdown-header">
                            <h6>{{ session('sessionData.userName') }}</h6>
                            <span>{{ ucwords(session('sessionData.role', 'Admin')) }}</span>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li>
                            <a class="dropdown-item d-flex align-items-center" href="{{ url('admin.dashboard') }}">
                                <i class="fa-solid fa-key"></i>
                                <span>Change Password</span>
                            </a>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li>
                            <form class="dropdown-item d-flex align-items-center fw-4" action="{{ route('logout') }}"
                                method="POST">
                                @csrf
                                <i class="bi bi-box-arrow-right fw-4 fs-5"></i>
                                <button type="submit" class="btn fw-4 fs-5">Sign Out</button>
                            </form>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>
    </header>
    <!-- End Header -->

    <!-- Sidebar -->
    <aside id="sidebar" class="sidebar bg-dark text-white">
        <ul class="sidebar-nav" id="sidebar-nav">
            <li class="nav-item">
                <a href="{{ route('dashboard') }}"
                    class="nav-link {{ $activeTab === 'dashboard' ? 'active text-light' : '' }}">
                    <i class="bi bi-house-door-fill"></i>
                    <span>Dashboard</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('inventory-management') }}"
                    class="nav-link {{ $activeTab === 'inventory-management' ? 'active text-white' : '' }}">
                    <i class="bi bi-box-seam"></i>
                    <span>Inventory</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('category-management') }}"
                    class="nav-link {{ $activeTab === 'category-management' ? 'active text-white' : '' }}">
                    <i class="fa fa-list-alt"></i>
                    <span>Category</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('orders-management') }}"
                    class="nav-link {{ $activeTab === 'orders-management' ? 'active text-white' : '' }}">
                    <i class="bi bi-cart-fill"></i>
                    <span>Orders</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ url('changePassword') }}"
                    class="nav-link {{ $activeTab === 'changePassword' ? 'active text-white' : '' }}">
                    <i class="fa-solid fa-key"></i>
                    <span>Change Password</span>
                </a>
            </li>
        </ul>
    </aside>
    <!-- End Sidebar -->



    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const URLROOT = "{{ url('/') }}"; // Pass Laravel URL to JS
    </script>
    <script src="{{ asset('public/js/admin-dashboard.js') }}"></script>
    <script src="{{ asset('public/js/filterProduct.js') }}"></script>
</body>

</html>
