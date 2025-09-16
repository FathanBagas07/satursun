@extends('layouts.app')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/pages/auth.css') }}">
@endpush

@section('body')
    <header class="w-100 shadow-sm position-fixed top-0 start-0">
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
        <div class="container d-flex align-items-center justify-content-center min-vh-100">
            {{-- Card --}}
            <div class="card shadow-lg border-0 rounded-4">
                <div class="card-body text-center p-4">
                    {{-- Card Content --}}
                </div>
            </div>
        </div>
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
            &copy; {{ date('Y') }} Satursun Freelance | All Rights Reserved
        </div>
        </div>
    </footer>
@endsection
