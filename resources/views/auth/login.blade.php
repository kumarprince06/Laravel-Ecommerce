<!-- Includes Header -->
@include('layouts.header')

<section class="vh-90 gradient-custom">
    <div class="container py-3 h-100">
        <div class="row d-flex justify-content-center align-items-center h-90">
            <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                <div class="card bg-light text-white" style="border-radius: 1rem;">
                    <div class="card-body p-4 text-center">

                        <div class="mb-md-3 mt-md-2 pb-2">
                            <h2 class="fw-bold mb-2 text-uppercase text-success">Login</h2>
                            <p class="text-secondary mb-3">Please enter your email and password!</p>

                            <!-- Dynamic error message block -->
                            @if ($errors->has('email') && $errors->has('password'))
                                <div class="rounded text-center bg-danger fs-5 fw-bold text-start d-block m-2 mx-auto">
                                    Invalid credentials. Please check your email and password.
                                </div>
                            @elseif($errors->has('email'))
                                <div class="rounded text-center bg-danger fs-5 fw-bold text-start d-block m-2 mx-auto">
                                    {{ $errors->first('email') }}
                                </div>
                            @elseif($errors->has('password'))
                                <div class="rounded text-center bg-danger fs-5 fw-bold text-start d-block m-2 mx-auto">
                                    {{ $errors->first('password') }}
                                </div>
                            @endif

                            @if (session('success'))
                                <div class="alert alert-success">
                                    {{ session('success') }}
                                </div>
                            @endif


                            <form action="{{ url('/auth/login') }}" method="post" novalidate>
                                @csrf
                                <!-- Floating label for email -->
                                <div class="form-floating form-white mb-2">
                                    <input type="email" name="email" value="{{ old('email') }}" id="typeEmailX"
                                        class="form-control form-control-sm @error('email') is-invalid @enderror"
                                        placeholder="Email" />
                                    <label for="typeEmailX" class="text-dark">Email</label>
                                </div>

                                <!-- Floating label for password -->
                                <div class="form-floating form-white mb-2">
                                    <input type="password" name="password" id="typePasswordX"
                                        class="form-control form-control-sm @error('password') is-invalid @enderror"
                                        placeholder="Password" />
                                    <label for="typePasswordX" class="text-dark">Password</label>
                                </div>

                                <p class="small mb-2 pb-lg-2">
                                    <a class="text-dark fw-bold" href="#!" style="text-decoration: none;">Forgot
                                        password?</a>
                                </p>

                                <button class="btn btn-outline-dark btn-lg px-5 fw-bold" type="submit">Login</button>
                            </form>

                        </div>

                        <div>
                            <p class="mb-0 mt-0 text-secondary">Don't have an account? <a
                                    href="{{ url('/auth/register') }}" class="text-dark fw-bold"
                                    style="text-decoration: none;">Sign Up</a></p>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Includes Footer -->
@include('layouts.footer')
