        <!-- Header -->
        @php
            $currentPath = request()->path();
            $activeTab = last(explode('/', $currentPath));
        @endphp
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
