@include('libraries.styles')
<div class="cover-container d-flex w-100 h-100 p-3 mx-auto flex-column">
    <header class="mb-auto">
        <div class="d-flex justify-content-between align-items-center">
            <a class="navbar-brand mt-2 mt-lg-0" href="{{ route('home') }}">
                <img src="{{ asset('images/logo-wms.png') }}" height="100" alt="WMS Logo" loading="lazy" />
            </a>
            <nav class="nav nav-masthead justify-content-center flex-grow-1">
                <a class="nav-link active" aria-current="page" href="{{ route('home') }}">Home</a>
                <a class="nav-link" href="{{ route('productsView') }}">Product Dashboard</a>
                <a class="nav-link" href="{{ route('add') }}">Request Product</a>
            </nav>
            <div class="d-flex align-items-center">
                @if (Auth::check())
                    <div class="dropdown me-2">
                        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            {{ Auth::user()->name }}
                        </button>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton">
                            <li>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault(); this.closest('form').submit();">{{ __('Log Out') }}</a>
                                </form>
                            </li>
                        </ul>
                    </div>
                @else
                    <span><a class="nav-link me-2" href="{{ route('login') }}">Login</a></span>
                @endif
            </div>
            <div class="d-flex align-items-center ms-2">
                <a class="btn btn-primary" href="{{ route('admin') }}">Admin</a>
            </div>
        </div>
    </header>
</div>
@include('libraries.styles')
