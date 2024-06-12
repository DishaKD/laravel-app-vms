@include('libraries.styles')

<body style="background-image: url('images/login-back.jpg'); background-size: cover;">

    <div class="container-fluid bg-custom py-5">
        <div class="row justify-content-center align-items-center">
            <div class="col-md-4">
                <div class="text-center mb-4">
                    <a class="navbar-brand mt-2 mt-lg-0" href="{{ route('home') }}">
                        <img src="{{ 'images/logo-wms.png' }}" height="300" alt="WMS Logo" loading="lazy" />
                    </a>
                </div>
                <div class="card">
                    @include('components.validation-errors');

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success">{{ session('status') }}</div>
                        @endif

                        <form method="POST" action="{{ route('login') }}">
                            @csrf

                            <div class="form-group">
                                <label for="email">Email</label>
                                <input id="email" class="form-control" type="email" name="email"
                                    value="{{ old('email') }}" required autofocus autocomplete="username" />
                            </div>

                            <div class="form-group">
                                <label for="password">Password</label>
                                <input id="password" class="form-control" type="password" name="password" required
                                    autocomplete="current-password" />
                            </div>

                            <div class="form-group form-check">
                                <input id="remember_me" class="form-check-input" type="checkbox" name="remember">
                                <label class="form-check-label" for="remember_me">Remember me</label>
                            </div>

                            <div class="form-group text-right">
                                @if (Route::has('password.request'))
                                    <a class="text-muted" href="{{ route('password.request') }}">Forgot your
                                        password?</a>
                                @endif

                                <button type="submit" class="btn btn-primary">Log in</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('libraries.scripts')
</body>
