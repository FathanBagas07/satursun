@extends('layouts.app')

@section('title', 'Pilih Peran & Daftar - Satursun')

@push('styles')
<style>
    body {
        background: linear-gradient(to bottom, #cffafe, #ffffff, #a5f3fc);
    }
    .role-card {
        cursor: pointer;
        transition: all 0.2s ease-in-out;
    }
    .role-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15) !important;
    }
</style>
@endpush

@section('body')
@php
  $presetRole = request('role');
@endphp
<header class="py-4">
    <div class="container text-center">
        <a href="{{ route('landing') }}">
            <img src="{{ asset('images/logo.svg') }}" height="32" alt="Satursun Logo">
        </a>
    </div>
</header>

<main class="container py-5">
    {{-- STEP 1: PILIH PERAN --}}
    <section id="step-role">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-7">
                <h1 class="text-center h3 fw-semibold mb-4">Pilih Peran Anda</h1>
                <div class="card shadow-lg border-0" style="border-radius: 1.5rem;">
                    <div class="card-body p-4 p-md-5">
                        <div class="row g-4">
                            {{-- FREELANCER --}}
                            <div class="col-sm-6">
                                <div class="card role-card h-100" onclick="selectRole('freelancer')">
                                    <div class="card-body text-center">
                                        <h5 class="card-title fw-bold">Freelancer</h5>
                                        <p class="card-text small">Dapatkan penghasilan dengan menawarkan jasa atau mendaftar ke proyek yang tersedia.</p>
                                    </div>
                                </div>
                            </div>
                            {{-- CLIENT / POSTER --}}
                            <div class="col-sm-6">
                                <div class="card role-card h-100" onclick="selectRole('poster')">
                                    <div class="card-body text-center">
                                        <h5 class="card-title fw-bold">Client</h5>
                                        <p class="card-text small">Cari jasa atau freelancer yang sesuai untuk menyelesaikan proyek Anda.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <p class="text-center small mt-4 mb-0">
                            Sudah punya akun? <a href="{{ route('login') }}">Login di sini</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- STEP 2: FORM DAFTAR --}}
    <section id="step-register" style="display: none;">
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
                                <input id="name" name="name" type="text" value="{{ old('name') }}" class="form-control form-control-lg" required autofocus>
                                @error('name') <div class="text-danger small mt-1">{{ $message }}</div> @enderror
                            </div>

                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input id="email-register" name="email" type="email" value="{{ old('email') }}" class="form-control form-control-lg" required>
                                @error('email') <div class="text-danger small mt-1">{{ $message }}</div> @enderror
                            </div>

                            <div class="mb-3">
                                <label for="password-register" class="form-label">Password</label>
                                <input id="password-register" name="password" type="password" class="form-control form-control-lg" required>
                                @error('password') <div class="text-danger small mt-1">{{ $message }}</div> @enderror
                            </div>

                            <div class="mb-3">
                                <label for="password_confirmation" class="form-label">Konfirmasi Password</label>
                                <input id="password_confirmation" name="password_confirmation" type="password" class="form-control form-control-lg" required>
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
</main>

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
</script>ipt>
@endpush
@endsection