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
                    class="nav-link {{ $activeTab === 'inventory' ? 'active text-white' : '' }}">
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


    <main id="main">
        <section class="inventory-revenue-charts mb-4">
            <div class="container-fluid inventory-page">
                <!-- Top Row with Heading and Add Button -->
                <div class="row g-3 justify-content-between mb-3">
                    <div class="col-md-4">
                        <h5>Category Management</h5>
                    </div>
                </div>


                <!-- Table with Categories -->
                {{-- <table class="w-100 table-responsive table-bordered text-center rounded">
                    <thead class="bg-success text-white">
                        <tr>
                            <th>#</th>
                            <th>Category Name</th>
                            <th>Operations</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($categories as $category)
                            <tr>
                                <td>{{ $category->id }}</td>
                                <td>{{ $category->name }}</td>
                                <td>
                                    <!-- View Button to Trigger View Modal -->
                                    <button class="btn btn-info fw-bold text-white view-btn"
                                        data-id="{{ $category->id }}" data-name="{{ $category->name }}"
                                        data-bs-toggle="modal" data-bs-target="#viewCategoryModal">
                                        <i class="fa-solid fa-eye"></i>
                                    </button>
                                    @if (session('user.role') === 'admin')
                                        <!-- Edit Button to Trigger Edit Modal -->
                                        <button class="btn btn-warning fw-bold text-white edit-btn"
                                            data-id="{{ $category->id }}" data-name="{{ $category->name }}"
                                            data-bs-toggle="modal" data-bs-target="#editCategoryModal">
                                            <i class="fa-solid fa-pen-to-square"></i>
                                        </button>
                                        <!-- Form for delete operation -->
                                        <form action="{{ route('category.delete', $category->id) }}" method="POST"
                                            style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger fw-bold text-white" type="submit"
                                                onclick="return confirm('Are you sure you want to delete this category?');">
                                                <i class="fa-solid fa-trash"></i>
                                            </button>
                                        </form>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table> --}}
            </div>
        </section>

        <section class="dash-overview mb-4">
            <div class="row g-4">
                <!-- Total Users -->
                <div class="col-lg-4 col-md-4 col-sm-4">
                    <a href="{{url('')}}" class="card bg-success text-white text-center p-3">
                        <h4>Add Category</h4>
                        <p></p>
                    </a>
                </div>
                <!-- Total Products -->
                <div class="col-lg-4 col-md-4 col-sm-4">
                    <a href="#" class="card bg-warning text-white text-center p-3">
                        <h4>View Categories</h4>
                        <p></p>
                    </a>
                </div>
            </div>
        </section>
    </main>

    <!-- Modal for Viewing Category -->
    {{-- <div class="modal fade" id="viewCategoryModal" tabindex="-1" aria-labelledby="viewCategoryModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-warning text-white">
                    <h5 class="modal-title" id="viewCategoryModalLabel">Category Details</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="viewCategoryId" class="form-label fw-bold">Category ID</label>
                        <input type="text" id="viewCategoryId" class="form-control" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="viewCategoryName" class="form-label fw-bold">Category Name</label>
                        <input type="text" id="viewCategoryName" class="form-control" readonly>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div> --}}

    <!-- Modal for Adding New Category -->
    {{-- <div class="modal fade" id="addCategoryModal" tabindex="-1" aria-labelledby="addCategoryModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-success text-white">
                    <h5 class="modal-title" id="addCategoryModalLabel">Add New Category</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('category.store') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="categoryName" class="form-label">Category Name</label>
                            <input type="text" name="name" class="form-control" id="categoryName"
                                placeholder="Enter category name" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success">Add Category</button>
                    </div>
                </form>
            </div>
        </div>
    </div> --}}

    <!-- Modal for Editing Category -->
    {{-- <div class="modal fade" id="editCategoryModal" tabindex="-1" aria-labelledby="editCategoryModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-primary text-white">
                    <h5 class="modal-title" id="editCategoryModalLabel">Edit Category</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="editCategoryForm" action="{{ route('category.update') }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="editCategoryName" class="form-label">Category Name</label>
                            <input type="hidden" name="id" id="editCategoryId">
                            <input type="text" name="name" class="form-control" id="editCategoryName"
                                required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div> --}}




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
