@extends('layouts.app')

@section('title', 'Pilih Peran & Daftar - Satursun')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/pages/auth.css') }}">
@endpush

@section('body')
    @php
        $presetRole = request('role');
    @endphp
    <header class="w-100 shadow-sm position-fixed top-0 start-0">
        {{-- Navbar --}}
        <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm">
            <div class="container d-flex justify-content-center align-items-center">
                {{-- Logo --}}
                {{-- link to landing page --}}
                <a class="navbar-brand d-flex align-items-center" {{-- href="{{ route('landing-page') }}" --}}>
                    <img src="{{ asset('images/logo.svg') }}" alt="Satursun Logo">
                </a>
            </div>
        </nav>
    </header>

    {{-- Content --}}
    <main>
        <div class="container">
            {{-- Select Role --}}
            <section id="step-role" class="select-role py-5">
                <div class="row justify-content-center">
                    <div class="col-11 col-md-8 col-lg-6">
                        <div class="card shadow-lg border-0" max-width="600px">
                            <h1 class="text-center h4 fw-semibold pt-3">Pilih Peran Anda</h1>
                            <div class="card-body px-4">
                                <div class="row g-4">

                                    {{-- Freelancer Card --}}
                                    <div class="freelancer-card role-card col-12 col-sm-6">
                                        <div class="card role-card h-100 text-center p-3" role="button"
                                            onclick="selectRole('freelancer')">
                                            <div class="card-body d-flex flex-column align-items-center">
                                                <i class="bi bi-briefcase-fill fs-1 text-primary mb-2"></i>
                                                <h5 class="card-title fw-bold">Freelancer</h5>
                                                <p class="card-text small">
                                                    Dapatkan penghasilan dengan menawarkan jasa
                                                    atau mendaftar ke proyek yang tersedia
                                                </p>
                                            </div>
                                        </div>
                                    </div>

                                    {{-- Client Card --}}
                                    <div class="client-card role-card col-12 col-sm-6">
                                        <div class="card role-card h-100 text-center p-3" role="button"
                                            onclick="selectRole('poster')">
                                            <div class="card-body d-flex flex-column align-items-center">
                                                <i class="bi bi-person-badge-fill fs-1 text-success mb-2"></i>
                                                <h5 class="card-title fw-bold">Klien</h5>
                                                <p class="card-text small">
                                                    Cari jasa atau freelancer yang sesuai
                                                    untuk menyelesaikan proyek Anda
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <p class="text-center small mt-4 mb-3">
                                    Sudah punya akun ? <a href="{{ route('login') }}">Login di sini</a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            {{-- STEP 2: FORM DAFTAR --}}
            {{-- <section id="step-register" style="display: none;">
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
        </section> --}}
        </div>
    </main>

    {{-- Footer --}}
    <footer class="footer-custom text-white py-3 bg-black">
        <div class="container">
            <div class="social-wrapper">
                {{-- Social Media --}}
                <div class="d-flex flex-column align-items-center gap-2">
                    <h6 class="fw-bold">Follow us on</h6>
                    <div class="d-flex flex-wrap justify-content-center gap-4 gap-md-5">
                        {{-- Instagram --}}
                        <a class="social-link" href="https://www.instagram.com/satursunproject?igsh=MWxyaTZlOXk3YjdyeQ=="
                            target="_blank">
                            <i class="bi bi-instagram"></i>
                        </a>
                        {{-- TikTok --}}
                        <a class="social-link" href="https://www.tiktok.com/@satursun.project?_t=ZS-8zdqoBwCjjQ&_r=1"
                            target="_blank">
                            <i class="bi bi-tiktok"></i>
                        </a>
                        {{-- YouTube --}}
                        <a class="social-link" href="https://youtube.com/@satursunproject?si=1IqzQeVZPp8MPDV1"
                            target="_blank">
                            <i class="bi bi-youtube"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        {{-- Copyright Notice --}}
        <div class="my-3 text-center small text-secondary">
            &copy; {{ date('Y') }} Satursun Freelance | Hak Cipta Dilindungi Undang-Undang
        </div>
        </div>
    </footer>

    @push('scripts')
        <script>
            function selectRole(role) {
                if (role) {
                    document.getElementById('role').value = role;
                }
                document.getElementById('step-role').style.display = 'none';
                document.getElementById('step-register').style.display = 'block';
            }

            (function() {
                const hasErrors = {{ $errors->any() ? 'true' : 'false' }};
                const presetRole = "{{ old('role', $presetRole) }}";
                if (hasErrors || presetRole) {
                    selectRole(presetRole);
                }
            })();
        </script>
    @endpush
@endsection
