<section id="step-register">
    <div class="row justify-content-center">
        <div class="col-md-6 col-lg-5">
            <div class="card shadow-lg border-0" style="border-radius: 1.5rem;">
                <div class="card-body p-4 p-md-5">
                    <h2 class="card-title text-center fw-bold mb-4">Daftar dengan Email</h2>
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <input type="hidden" id="role" name="role" value="{{ $presetRole ?? '' }}">

                        <div class="mb-3">
                            <label for="name" class="form-label">Nama</label>
                            <input id="name" name="name" type="text" value="{{ old('name') }}"
                                class="form-control form-control-lg" required autofocus>
                            @error('name')
                                <div class="text-danger small mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input id="email-register" name="email" type="email" value="{{ old('email') }}"
                                class="form-control form-control-lg" required>
                            @error('email')
                                <div class="text-danger small mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="password-register" class="form-label">Password</label>
                            <input id="password-register" name="password" type="password"
                                class="form-control form-control-lg" required>
                            @error('password')
                                <div class="text-danger small mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="password_confirmation" class="form-label">Konfirmasi Password</label>
                            <input id="password_confirmation" name="password_confirmation" type="password"
                                class="form-control form-control-lg" required>
                        </div>

                        <div class="d-grid mt-4">
                            <button type="submit" class="btn btn-primary btn-lg rounded-pill">Daftar</button>
                        </div>
                    </form>
                    <p class="text-center small mt-4 mb-0">
                        Sudah punya akun? <a href="{{ route('login') }}">Login di sini</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>
