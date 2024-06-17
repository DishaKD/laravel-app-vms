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
                <a href="#" class="nav-link nav-link-toggle {{ Request::is('admin/orders*') ? 'active' : '' }}"
                    data-bs-toggle="collapse" data-bs-target="#orders-collapse" aria-expanded="false">
                    <i class="bi bi-box-fill"></i>
                    Orders
                    <i class="bi bi-caret-down ms-auto"></i>
                </a>
                <div class="collapse" id="orders-collapse">
                    <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                        <li><a href="{{ route('admin.products') }}" class="link-dark rounded">All Products</a></li>
                        <li><a href="{{ route('admin.addProducts') }}" class="link-dark rounded">Add Product</a></li>
                    </ul>
                </div>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link text-white">
                    <i class="bi bi-people-fill"></i>
                    Customers
                </a>
            </li>
        </ul>
    </div>





    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var toggleLinks = document.querySelectorAll('.nav-link-toggle');

            toggleLinks.forEach(function(link) {
                link.addEventListener('click', function() {
                    var icon = link.querySelector('.bi-caret-down');
                    var isExpanded = link.getAttribute('aria-expanded') === 'true';

                    if (isExpanded) {
                        icon.classList.remove('bi-caret-up');
                        icon.classList.add('bi-caret-down');
                    } else {
                        icon.classList.remove('bi-caret-down');
                        icon.classList.add('bi-caret-up');
                    }
                });
            });
        });
    </script>
</body>
