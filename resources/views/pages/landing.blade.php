@extends('layouts.app')

@section('title', 'Satursun: Platform Freelance untuk Mahasiswa')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/pages/landing.css') }}">
@endpush

@section('body')
    <header>
        {{-- Navbar --}}
        <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm">
            <div class="container">
                {{-- Logo --}}
                <a class="navbar-brand d-flex align-items-center" href="{{ route('landing') }}">
                    <img src="{{ asset('images/logo.svg') }}" alt="Satursun Logo" height="60">
                </a>
                {{-- Navbar Tooggler --}}
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNav"
                    aria-controls="mainNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                {{-- Navbar Collapse --}}
                <div class="collapse navbar-collapse" id="mainNav">
                    <ul class="navbar-nav ms-auto align-items-lg-center my-3 my-lg-0">
                        <li class="nav-item text-center text-lg-start">
                            <a class="nav-link" href="/#about">Tentang</a>
                        </li>
                        <li class="nav-item text-center text-lg-start">
                            <a class="nav-link" href="/#how-it-works">Cara Kerja</a>
                        </li>
                        <li class="nav-item text-center text-lg-start">
                            <a class="nav-link" href="/#faq">FAQ</a>
                        </li>

                        {{-- NAV RIGHT (GUEST VS AUTH) --}}
                        @guest
                            {{-- Tombol untuk pengguna yang belum login --}}
                            <li class="nav-item text-center mt-3 mt-lg-0 ms-lg-3">
                                <a href="{{ route('auth.choose') }}" class="btn btn-primary rounded-pill px-4 w-100">Daftar</a>
                            </li>
                            <li class="nav-item text-center mt-2 mt-lg-0 ms-lg-2">
                                <a href="{{ route('login') }}"
                                    class="btn btn-outline-secondary rounded-pill px-4 w-100">Masuk</a>
                            </li>
                        @else
                            @auth
                                {{-- NAVIGASI BERDASARKAN PERAN PENGGUNA --}}
                                @if (auth()->user()->isFreelancer())
                                    <li class="nav-item text-center text-lg-start ms-lg-3">
                                        <a class="nav-link fw-semibold" href="{{ route('freelancer.jobs.browse') }}">Cari Tugas</a>
                                    </li>
                                @elseif (auth()->user()->isPoster())
                                    <li class="nav-item text-center text-lg-start ms-lg-3">
                                        <a class="nav-link" href="{{ route('poster.jobs.index') }}">Tugas Saya</a>
                                    </li>
                                    <li class="nav-item text-center mt-2 mt-lg-0 ms-lg-2">
                                        <a href="{{ route('poster.jobs.create') }}" class="btn btn-primary rounded-pill px-4">Buat
                                            Tugas Baru</a>
                                    </li>
                                @endif

                                {{-- Dropdown Notifikasi --}}
                                <li class="nav-item dropdown">
                                    <a class="nav-link" href="#" id="navbarNotificationDropdown" role="button"
                                        data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="bi bi-bell-fill"></i>
                                        @if ($unreadNotifications->count() > 0)
                                            <span class="badge rounded-pill bg-danger">{{ $unreadNotifications->count() }}</span>
                                        @endif
                                    </a>
                                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarNotificationDropdown">
                                        @forelse($unreadNotifications as $notification)
                                            <li class="d-flex justify-content-between align-items-center dropdown-item-text">
                                                <span class="small pe-2">{{ $notification->message }}</span>
                                                {{-- Form untuk tombol hapus --}}
                                                <form method="POST" action="{{ route('notifications.destroy', $notification) }}"
                                                    class="ms-auto">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-outline-danger border-0 p-0"
                                                        title="Hapus notifikasi">
                                                        <i class="bi bi-x-lg"></i>
                                                    </button>
                                                </form>
                                            </li>
                                        @empty
                                            <li><span class="dropdown-item-text text-muted small">Tidak ada notifikasi baru.</span>
                                            </li>
                                        @endforelse
                                    </ul>
                                </li>

                                {{-- Dropdown Profil Pengguna --}}
                                <li class="nav-item dropdown text-center text-lg-start ms-lg-3">
                                    <a class="nav-link dropdown-toggle d-inline-flex align-items-center justify-content-center gap-2"
                                        href="#" id="navbarUserDropdown" role="button" data-bs-toggle="dropdown"
                                        aria-expanded="false">
                                        @php
                                            $photo = optional(auth()->user()->profile)->photo ?? null;
                                        @endphp

                                        @if ($photo)
                                            <img src="{{ Storage::url($photo) }}" alt="{{ auth()->user()->name }}"
                                                class="rounded-circle" width="32" height="32" style="object-fit: cover;">
                                        @else
                                            <span
                                                class="d-inline-flex justify-content-center align-items-center bg-secondary text-white rounded-circle"
                                                style="width: 32px; height: 32px;">
                                                <i class="bi bi-person-fill"></i>
                                            </span>
                                        @endif
                                        Halo, <b>{{ auth()->user()->name }}</b>
                                    </a>
                                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarUserDropdown">
                                        <li><a class="dropdown-item text-center text-lg-start"
                                                href="{{ route('profile.edit') }}">Edit Profil</a></li>
                                        <li>
                                            <hr class="dropdown-divider">
                                        </li>
                                        <li>
                                            <form method="POST" action="{{ route('logout') }}" class="mb-0">
                                                @csrf
                                                <button type="submit"
                                                    class="dropdown-item text-center text-lg-start">Keluar</button>
                                            </form>
                                        </li>
                                    </ul>
                                </li>
                            @endauth
                        @endguest
                    </ul>
                </div>
        </nav>
    </header>

    <main>
        {{-- Hero --}}
        <section id="hero" class="hero text-white mb-5">
            <div class="container">
                <div class="row align-items-center bg-hero rounded-5">
                    <div class="col-md-8 p-5">
                        <h1 class="display-5 fw-bold text-stroke">Lebih Fleksibel Jadi Freelancer</h1>
                        <p class="lead pb-lg-4 text-stroke">
                            Cukup Manfaatkan Akhir pekan untuk kerja ringan
                            dan dibayar cepat
                        </p>

                        <h1 class="display-5 fw-bold text-stroke">Temukan talenta pemuda/i berbakat</h1>
                        <p class="lead mt-3 text-stroke">
                            Untuk bantu bisnis/pekerjaan Anda dengan biaya terjangkau <br>
                            dan proses instan.
                        </p>

                        <div class="d-flex mt-4">
                            <a class="btn btn-daftar btn-lg">
                                <i class="fa fa-arrow-right me-2"></i> DAFTAR SEKARANG
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        {{-- About --}}
        <section id="about" class="about py-5 text-white">
            <div class="container">
                {{-- About Us --}}
                <div class="row align-items-center">
                    <div class="col-lg-6 ">
                        {{-- Image Satursun Freelance  --}}
                        <img class="img-satursun-about img-fluid rounded-top-4"
                            src="{{ asset('images/satursun-about.svg') }}" alt="Satursun">
                        {{-- Text About Us --}}
                        <h6 class="section-subtitle fw-bold text-black">TENTANG KAMI</h6>
                        <h2 class="section-title fw-bold text-black">SATURSUN FREELANCE</h2>
                        <p class="about-text mt-3 fw-semibold text-black">
                            Merupakan platform jasa mikro akhir pekan yang menghubungkan
                            pemberi kerja mikro dengan freelancer terampil, mencakup berbagai kebutuhan
                            seperti jasa kebersihan, pet walker, pengasuh hewan, penjaga stand, desain grafis,
                            hingga asisten event. <br><br>
                            Dirancang untuk perumahan, perkantoran, dan berbagai fasilitas lainnya,
                            Satursun menghadirkan tenaga kerja fleksibel, terverifikasi, dan siap bekerja dengan
                            sistem pembayaran aman dan instan.
                        </p>
                    </div>
                    {{-- Image About Us --}}
                    <div class="col-lg-6 text-center">
                        <img src="{{ asset('images/image-about.png') }}" alt="Satursun About"
                            class="img-fluid rounded shadow about-img">
                    </div>
                </div>
            </div>
        </section>

        {{-- Why Choose --}}
        <section id="why-choose" class="why-choose py-5 bg-white">
            <div class="container">
                <div class="row g-4 align-items-center d-flex justify-content-between">
                    {{-- Left Title --}}
                    <div class="col-lg-4 d-flex align-items-center">
                        <h3 class="section-title fw-bold text-md-start text-center w-100 display-6">
                            MENGAPA HARUS<br> SATURSUN FREELANCE?
                        </h3>
                    </div>
                    {{-- Right List --}}
                    <div class="col-lg-7">
                        <p class="mt-3 mb-0 fw-bold">Di Satursun Freelance Anda bisa: </p>
                        <ul class="mt-2 fw-bold fs-5">
                            <li>Temukan freelancer akhir pekan dengan cepat dan mudah</li>
                            <li>Buat permintaan, terima tawaran dari banyak freelancer</li>
                            <li>Pilih freelancer yang cocok dan dapatkan hasil terbaik</li>
                            <li>Satu harga, berbagai pilihan layanan mikro</li>
                            <li>Transaksi aman, pembayaran instan via e-wallet atau transfer bank</li>
                        </ul>
                        <p class="mt-3 mb-0 fw-semibold">Tunggu apa lagi? Satursun–in aja!</p>
                    </div>
                </div>
            </div>
            </div>
        </section>

        {{-- Why Choose --}}
        <section id="why-choose" class="why-choose py-5 bg-white">
            <div class="container">
                <div class="row g-4 align-items-center d-flex justify-content-between">
                    {{-- Judul Kiri --}}
                    <div class="col-lg-4 d-flex align-items-center">
                        <h3 class="section-title fw-bold text-md-start text-center w-100 display-6">
                            MENGAPA HARUS<br> SATURSUN FREELANCE?
                        </h3>
                    </div>
                    {{-- List Kanan --}}
                    <div class="col-lg-7">
                        <p class="mt-3 mb-0 fw-bold">Di Satursun Freelance Anda bisa: </p>
                        <ul class="mt-2 fw-bold fs-5">
                            <li>Temukan freelancer akhir pekan dengan cepat dan mudah</li>
                            <li>Buat permintaan, terima tawaran dari banyak freelancer</li>
                            <li>Pilih freelancer yang cocok dan dapatkan hasil terbaik</li>
                            <li>Satu harga, berbagai pilihan layanan mikro</li>
                            <li>Transaksi aman, pembayaran instan via e-wallet atau transfer bank</li>
                        </ul>
                        <p class="mt-3 mb-0 fw-semibold">Tunggu apa lagi? Satursun–in aja!</p>
                    </div>
                </div>
            </div>
        </section>
        {{-- FAQ --}}
        <section id="faq" class="faq-section">
            <div class="container">
                <div class="row g-4">
                    @include('components.landing.faq')
                </div>
            </div>
        </section>
    </main>

    {{-- Footer --}}
    <footer class="footer-custom text-white py-5">
        <div class="container">
            <div class="row gy-4">
                {{-- Logo & CTA --}}
                <div class="col-lg-4">
                    <img src="{{ asset('images/logo-footer.svg') }}" alt="Satursun Logo" class="mb-3"
                        style="max-height: 120px">
                    <h5 class="fw-bold text-gradient display-5">READY TO <br> START A PROJECT?</h5>
                    <a href="#"
                        class="btn btn-primary btn-lg mt-2 align-items-center rounded-pill fw-bold text-black px-4 py-3">
                        <i class="fa fa-arrow-right me-2"></i> DAFTAR SEKARANG
                    </a>
                </div>

                {{-- FAQ Section --}}
                <section id="faq" class="faq-section">
                    <div class="container">
                        <div class="row g-4">
                            @include('components.landing.faq')
                        </div>
                    </div>
                </section>
                {{-- Email --}}
                <div class="d-flex align-items-center">
                    <i class="bi bi-envelope-fill me-2 fs-5"></i>
                    <a class="text-white" href="mailto:tanya@satursun.co.id"><span>tanya@satursun.co.id</span></a>
                </div>
            </div>

            {{-- Quick Links & Social --}}
            <div class="col-lg-4">
                <div class="row">
                    <div class="col-6">
                        <h6 class="fw-bold">Quick Links</h6>
                        <ul class="list-unstyled">
                            <li><a href="#about" class="footer-link">Tentang</a></li>
                            <li><a href="#how-it-works" class="footer-link">Cara Kerja</a></li>
                            <li><a href="#faq" class="footer-link">FAQ</a></li>
                            <li><a href="#" class="footer-link">Daftar</a><span> / </span><a href="#"
                                    class="footer-link" href="#">Masuk</a></li>
                        </ul>
                    </div>
                    <div class="col-6">
                        {{-- Media Social --}}
                        <h6 class="fw-bold">Follow us on</h6>
                        <div class="d-flex gap-3">
                            <a class="social-link"
                                href="https://www.instagram.com/satursunproject?igsh=MWxyaTZlOXk3YjdyeQ=="
                                target="blank"><i class="bi bi-instagram"></i></a>
                            <a class="social-link" href="https://www.tiktok.com/@satursun.project?_t=ZS-8zdqoBwCjjQ&_r=1"
                                target="blank"><i class="bi bi-tiktok"></i></a>
                            <a class="social-link" href="https://youtube.com/@satursunproject?si=1IqzQeVZPp8MPDV1"
                                target="blank"><i class="bi bi-youtube"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>

        <hr class="border-secondary my-4">


        <div class="text-center small text-secondary">
            &copy; {{ date('Y') }} Satursun Freelance | Hak Cipta Dilindungi Undang-Undang
        </div>
        </div>
    </footer>
@endsection
