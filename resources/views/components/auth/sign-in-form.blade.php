<section class="sign-in-form">
    <div class="row justify-content-center">
        <div class="col-11 col-sm-10 col-md-8 col-lg-5">
            <div class="card shadow-lg border-0 rounded-4">
                <div class="card-body py-3 px-4 py-md-4 px-md-5">
                    {{-- Tittle --}}
                    <h2 class="card-title text-center fw-bold fs-3 mb-4">Masuk</h2>

                    {{-- Form --}}
                    <form method="POST" action="">
                        @csrf

                        {{-- Email --}}
                        <div class="mb-3">
                            <label for="email" class="form-label fw-semibold">Email</label>
                            <input id="email" name="email" type="email" value="{{ old('email') }}"
                                class="form-control form-control-lg" required autofocus>
                            @error('email')
                                <div class="text-danger small mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Password --}}
                        <div class="mb-3">
                            <label for="password" class="form-label fw-semibold">Password</label>
                            <input id="password" name="password" type="password" class="form-control form-control-lg"
                                required>
                            @error('password')
                                <div class="text-danger small mt-1">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        {{-- Remember Me --}}
                        <div class="d-flex justify-content-between align-items-center mb-4">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="remember" id="remember">
                                <label class="form-check-label " for="remember">Ingat saya</label>
                            </div>
                        </div>

                        {{-- Button Sign In --}}
                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary btn-lg rounded-pill fw-semibold">Masuk</button>
                        </div>
                    </form>

                    {{--Link to Sign-Up --}}
                    <p class="text-center small mt-4 mb-0">
                        Belum punya akun?
                        <a class="link-sign-up fw-bold" href="{{ route('auth.sign-up-role') }}">Daftar di sini</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>
