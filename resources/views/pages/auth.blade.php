@extends('layouts.app')

@section('title', 'Pilih Peran & Daftar - Satursun')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/pages/auth.css') }}">
@endpush

@section('body')
    {{-- ================= HEADER ================= --}}
    <header class="w-100 shadow-sm position-fixed top-0 start-0 bg-white z-3">
        <nav class="navbar navbar-expand-lg navbar-light bg-white">
            <div class="container d-flex justify-content-center align-items-center">
                <a class="navbar-brand d-flex align-items-center" href="{{ route('landing-page') }}">
                    <img src="{{ asset('images/logo.svg') }}" alt="Satursun Logo" height="40">
                </a>
            </div>
        </nav>
    </header>

    {{-- ================= MAIN ================= --}}
    <main class="d-flex flex-column justify-content-center align-items-center min-vh-100 pt-5 pb-5">
        <div class="container mt-5 pt-4">
            {{-- AUTH PAGE HANDLER --}}
            @if ($page === 'sign-in-form')
                @include('components.auth.sign-in-form')
            @elseif ($page === 'sign-up-role')
                @include('components.auth.sign-up-role')
            @elseif ($page === 'sign-up-form')
                @include('components.auth.sign-up-form')
            @endif
        </div>
    </main>

    {{-- ================= FOOTER ================= --}}
    <footer class="footer-custom text-white bg-black mt-auto">
        <div class="container py-4">
            <div class="d-flex flex-column align-items-center gap-2">
                <h6 class="fw-bold mb-2">Ikuti Kami di</h6>
                <div class="d-flex flex-wrap justify-content-center gap-4 gap-md-5">
                    <a class="social-link" href="https://www.instagram.com/satursunproject?igsh=MWxyaTZlOXk3YjdyeQ==" target="_blank">
                        <i class="bi bi-instagram fs-4"></i>
                    </a>
                    <a class="social-link" href="https://www.tiktok.com/@satursun.project?_t=ZS-8zdqoBwCjjQ&_r=1" target="_blank">
                        <i class="bi bi-tiktok fs-4"></i>
                    </a>
                    <a class="social-link" href="https://youtube.com/@satursunproject?si=1IqzQeVZPp8MPDV1" target="_blank">
                        <i class="bi bi-youtube fs-4"></i>
                    </a>
                </div>
            </div>
        </div>

        <div class="text-center small text-secondary py-2">
            &copy; {{ date('Y') }} Satursun Freelance | Hak Cipta Dilindungi Undang-Undang
        </div>
    </footer>

    {{-- ================= SCRIPTS ================= --}}
    {{-- @push('scripts')
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
    @endpush --}}
@endsection
