<div class="cover-container d-flex w-100 h-100 p-3 mx-auto flex-column">
    <header class="mb-auto">
        <div>
            <a class="navbar-brand mt-2 mt-lg-0" href="{{ route('home') }}">
                <img src="{{ 'images/logo-wms.png' }}" height="100" alt="WMS Logo" loading="lazy" />
            </a>
            <nav class="nav nav-masthead justify-content-center float-md-end">
                <a class="nav-link active" aria-current="page" href="{{ route('home') }}">Home</a>
                <a class="nav-link" href="{{ route('productsView') }}">Product Dashboard</a>
                <a class="nav-link" href="{{ route('add') }}">Request Product</a>
                @if (Auth::user())
                    <span>
                        <form method="POST" action="{{ route('logout') }}" class="nav-link p-0 m-0"
                            style="display:inline;">
                            @csrf
                            <a href="{{ route('logout') }}"
                                onclick="event.preventDefault(); this.closest('form').submit();"
                                class="nav-link">{{ __('Log Out') }}</a>
                        </form>
                    </span>
                @else
                    <span><a class="nav-link" href="{{ route('login') }}">Login</a></span>
                @endif
            </nav>
        </div>
    </header>
</div>
