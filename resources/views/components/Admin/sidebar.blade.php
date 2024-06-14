<head>
    <style>
        .sidebar {
            position: fixed;
            top: 0;
            left: 0;
            height: 100%;
            width: 280px;
            z-index: 1030;
            overflow-y: auto;
            padding-bottom: 50px;
        }

        .sidebar .nav-link.active {
            background-color: blue;
            /* Active background color */
            color: white;
            /* Text color for active link */
        }

        .main-content {
            margin-left: 280px;
            padding: 20px;
        }
    </style>
</head>

<body>
    <!-- Sidebar -->
    <div class="sidebar d-flex flex-column flex-shrink-0 p-3 text-white bg-dark">
        <a href="{{ route('home') }}"
            class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
            <img src="{{ asset('images/logo-wms.png') }}" height="90" alt="WMS Logo" />
            <span class="fs-4">Admin Dashboard</span>
        </a>
        <hr>
        <ul class="nav nav-pills flex-column mb-auto">
            <li class="nav-item">
                <a href="{{ route('admin.dashboard') }}" class="nav-link {{ Request::is('dashboard') ? 'active' : '' }}">
                    <i class="bi bi-speedometer2"></i>
                    Dashboard
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('admin.orders') }}"
                    class="nav-link {{ Request::is('admin/orders*') ? 'active' : '' }}">
                    <i class="bi bi-border-style"></i>
                    Orders
                </a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link text-white">
                    <i class="bi bi-box-fill"></i>
                    Products
                </a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link text-white">
                    <i class="bi bi-people-fill"></i>
                    Customers
                </a>
            </li>
        </ul>
    </div>
</body>
