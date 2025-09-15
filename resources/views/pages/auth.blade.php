@extends('layouts.app')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/pages/auth.css') }}">
@endpush

@section('body')
    <header>
        {{-- Navbar --}}
        <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm">
            <div class="container d-flex justify-content-center align-items-center">
                {{-- Logo --}}
                {{-- link to landing page --}}
                <a class="navbar-brand d-flex align-items-center" href="{{ route('landing-page') }}">
                    <img src="{{ asset('images/logo.svg') }}" alt="Satursun Logo">
                </a>
            </div>
        </nav>
    </header>

    {{-- Content --}}
    <main>
        <div class="container d-flex align-items-center justify-content-center min-vh-100 position-relative">
            {{-- Card --}}
            <div class="card shadow-lg border-0" style="max-width: 500px; width: 100%; border-radius: 16px;">
                <main class="card-body text-center p-4">
                    <h4 class="fw-bold mb-4">Daftar di Satursun</h4>
                    {{-- || Form Register || --}}
                    <form method="POST" action="">
                        @csrf
                        <div class="mb-3 text-start">
                            <label for="name" class="form-label">Nama Lengkap</label>
                            <input type="text" name="name" id="name" class="form-control rounded-pill" required>
                        </div>

                        <div class="mb-3 text-start">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" name="email" id="email" class="form-control rounded-pill" required>
                        </div>

                        <div class="mb-3 text-start">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" name="password" id="password" class="form-control rounded-pill"
                                required>
                        </div>

                        <div class="mb-3 text-start">
                            <label for="password_confirmation" class="form-label">Konfirmasi Password</label>
                            <input type="password" name="password_confirmation" id="password_confirmation"
                                class="form-control rounded-pill" required>
                        </div>

                        <button type="submit" class="btn btn-primary w-100 rounded-pill">Daftar</button>
                    </form>

                    <div class="mt-3">
                        <small>Sudah punya akun? <a href="" class="text-decoration-none fw-bold text-primary">Login
                                di
                                sini</a></small>
                    </div>
                </main>
            </div>
        </div>
    </main>

    {{-- Footer --}}
    <footer class="footer-custom text-white py-3">
        <div class="container">
            <div class="social-wrapper text-center">
                {{-- Social Media --}}
                <div class="d-flex flex-column align-items-center gap-3">
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
            &copy; {{ date('Y') }} Satursun Freelance | All Rights Reserved
        </div>
        </div>
    </footer>
@endsection
