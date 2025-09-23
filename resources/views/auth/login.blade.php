@extends('layouts.app')

@section('title', 'Masuk - Satursun')

@push('styles')
<style>
    body {
        background: linear-gradient(to bottom, #cffafe, #ffffff, #a5f3fc);
        min-height: 100vh;
    }
</style>
@endpush

@section('body')
<header class="py-4">
    <div class="container text-center">
        <a href="{{ route('landing') }}">
            <img src="{{ asset('images/logo.svg') }}" height="32" alt="Satursun Logo">
        </a>
    </div>
</header>

<main class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-6 col-lg-5">
            <div class="card shadow-lg border-0" style="border-radius: 1.5rem;">
                <div class="card-body p-4 p-md-5">
                    <h2 class="card-title text-center fw-bold mb-4">Masuk</h2>
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input id="email" name="email" type="email" value="{{ old('email') }}" class="form-control form-control-lg" required autofocus>
                            @error('email') <div class="text-danger small mt-1">{{ $message }}</div> @enderror
                        </div>

                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input id="password" name="password" type="password" class="form-control form-control-lg" required>
                            @error('password') <div class="text-danger small mt-1">{{ $message }}</div> @enderror
                        </div>

                        <div class="d-flex justify-content-between align-items-center mb-4">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="remember" id="remember">
                                <label class="form-check-label" for="remember">Ingat saya</label>
                            </div>
                        </div>

                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary btn-lg rounded-pill">Masuk</button>
                        </div>
                    </form>

                    <p class="text-center small mt-4">
                        Belum punya akun?
                        <a href="{{ route('auth.choose') }}">Daftar di sini</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection