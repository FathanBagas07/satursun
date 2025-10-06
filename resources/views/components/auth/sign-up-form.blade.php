<section id="step-register" class="sign-up-form">
    <div class="row justify-content-center">
        <div class="col-11 col-sm-10 col-md-8 col-lg-5">
            <div class="card shadow border-0 rounded-4">
                <div class="card-body p-4 p-md-5">
                    {{-- Title --}}
                    <h2 class="card-title text-center fw-bold fs-3 mb-4">
                        Buat Akun Satursun
                    </h2>

                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <input type="hidden" id="role" name="role" value="{{ $presetRole ?? '' }}">

                        {{-- Nama --}}
                        <div class="mb-3">
                            <label for="name" class="form-label fw-semibold">Nama Lengkap</label>
                            <input id="name" name="name" type="text" value="{{ old('name') }}"
                                class="form-control form-control-lg" required autofocus>
                            @error('name')
                                <div class="text-danger small mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Email --}}
                        <div class="mb-3">
                            <label for="email-register" class="form-label fw-semibold">Email</label>
                            <input id="email-register" name="email" type="email" value="{{ old('email') }}"
                                class="form-control form-control-lg" required>
                            @error('email')
                                <div class="text-danger small mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Password --}}
                        <div class="mb-3">
                            <label for="password-register" class="form-label fw-semibold">Password</label>
                            <input id="password-register" name="password" type="password"
                                class="form-control form-control-lg" required>
                            @error('password')
                                <div class="text-danger small mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Konfirmasi Password --}}
                        <div class="mb-4">
                            <label for="password_confirmation" class="form-label fw-semibold">Konfirmasi
                                Password</label>
                            <input id="password_confirmation" name="password_confirmation" type="password"
                                class="form-control form-control-lg" required>
                        </div>

                        {{-- Tombol Daftar --}}
                        <div class="d-grid">
                            <button type="submit" class="btn btn-lg rounded-pill text-white fw-semibold">
                                Daftar
                            </button>
                        </div>
                    </form>

                    {{-- Link ke Login --}}
                    <p class="text-center small mt-4 mb-0">
                        Sudah punya akun?
                        <a href="{{ route('auth.sign-in-form') }}"
                            class="link-login text-decoration-none fw-semibold">
                            Masuk di sini
                        </a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>
