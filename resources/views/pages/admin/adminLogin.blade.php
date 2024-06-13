@include('libraries.styles')

<section class="vh-100 bg-dark">
    <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col col-xl-10">
                <div class="card" style="border-radius: 1rem;">
                    <div class="row g-0">
                        <div class="col-md-6 col-lg-5 d-none d-md-block">
                            <img src="https://images.pexels.com/photos/4484077/pexels-photo-4484077.jpeg?auto=compress&cs=tinysrgb&w=600"
                                alt="login form" class="img-fluid" style="border-radius: 1rem 0 0 1rem;" />
                        </div>
                        <div class="col-md-6 col-lg-7 d-flex align-items-center">
                            <div class="card-body p-4 p-lg-5 text-black">

                                <form method="POST" action="">
                                    @csrf

                                    <div class="d-flex align-items-center mb-3 pb-1">
                                        <a class="navbar-brand mt-2 mt-lg-0" href="{{ route('home') }}">
                                            <img src="{{ asset('images/logo.png') }}" height="100" alt="WMS Logo"
                                                loading="lazy" />
                                        </a>
                                    </div>

                                    <h5 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Login to Admin
                                        Dashboard
                                    </h5>

                                    <div data-mdb-input-init class="form-outline mb-4">
                                        <input type="email" id="email" name="email"
                                            class="form-control form-control-lg @error('email') is-invalid @enderror"
                                            value="{{ old('email') }}" required autocomplete="email" autofocus />
                                        <label class="form-label" for="email">Email address</label>

                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div data-mdb-input-init class="form-outline mb-4">
                                        <input type="password" id="password" name="password"
                                            class="form-control form-control-lg @error('password') is-invalid @enderror"
                                            required autocomplete="current-password" />
                                        <label class="form-label" for="password">Password</label>

                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="pt-1 mb-4">
                                        <button type="submit" class="btn btn-dark btn-lg btn-block">Login</button>
                                    </div>

                                    <a class="small text-muted" href="{{ route('password.request') }}">Forgot
                                        password?</a>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@include('libraries.styles')
