@extends('layouts.app')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/pages/auth.css') }}">
@endpush

@section('body')
    <section class="auth-page d-flex align-items-center justify-content-center min-vh-100 position-relative">
        <div class="content">
            <img src="{{ asset('images/logo.png') }}" alt="Satursun Logo" class="mb-3" style="max-height: 60px;">
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
                        <input type="password" name="password" id="password" class="form-control rounded-pill" required>
                    </div>

                    <div class="mb-3 text-start">
                        <label for="password_confirmation" class="form-label">Konfirmasi Password</label>
                        <input type="password" name="password_confirmation" id="password_confirmation"
                            class="form-control rounded-pill" required>
                    </div>

                    <button type="submit" class="btn btn-primary w-100 rounded-pill">Daftar</button>
                </form>

                <div class="mt-3">
                    <small>Sudah punya akun? <a href="" class="text-decoration-none fw-bold text-primary">Login di
                            sini</a></small>
                </div>
            </main>
        </div>
        </div>
    </section>
@endsection
