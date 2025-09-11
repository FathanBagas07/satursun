@extends('layouts.app')

@section('title', 'Satursun: Platform Freelance untuk Mahasiswa')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/pages/landing-page.css') }}">
@endpush

@section('body')
    <header>
        {{-- Navbar --}}
        <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm">
            <div class="container">
                {{-- Logo --}}
                <a class="navbar-brand d-flex align-items-center" href="#hero">
                    <img src="{{ asset('images/logo.svg') }}" alt="Satursun Logo" height="60">
                </a>
                {{-- Navbar Tooggler --}}
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNav"
                    aria-controls="mainNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                {{-- Navbar Collapse --}}
                <div class="collapse navbar-collapse" id="mainNav">
                    <ul class="navbar-nav ms-auto align-items-lg-center">
                        <li class="nav-item"><a class="nav-link" href="#about">Tentang</a></li>
                        <li class="nav-item"><a class="nav-link" href="#how-it-works">Cara Kerja</a></li>
                        <li class="nav-item"><a class="nav-link" href="#faq">FAQ</a></li>
                        <li class="nav-item ms-2"><a class="btn btn-outline-primary text-black fw-bold" href="">Daftar</a></li>
                        <li class="nav-item ms-2"><a class="btn btn-primary text-black fw-bold" href="">Masuk</a></li>
                    </ul>
                </div>
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

                        <h1 class="display-5 fw-bold text-stroke">Lebih Fleksibel Jadi Freelancer</h1>
                        <p class="lead mt-3 text-stroke">
                            Temukan talenta pemuda/i berbakat <br>
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
                    {{-- Image About --}}
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

        {{-- How It Works --}}
        <section id="how-it-works" class="how-it-works mb-5">
            <div class="container text-center py-5">

                {{-- Untuk Klien --}}
                <div class="klien container mb-5">
                    <div class="row align-items-center text-lg-center text-md-start">

                        <!-- Text -->
                        <div class="col-lg-8 col-md-6 mb-3 mb-md-0">
                            <h2 class="fw-lighter">
                                CARA KERJA SATURSUN FREELANCE <br> UNTUK <span class="fw-bold">KLIEN</span>
                            </h2>
                        </div>

                        <!-- Image -->
                        <div class="col-lg-4 col-md-6 text-center">
                            <img class="img-fluid" width="250"
                                src="{{ asset('images/ilustration-klien-how-it-works.png') }}" alt="Klien How It Works">
                        </div>
                    </div>
                </div>

                {{-- Step Klien --}}
                <div class="step-klien row justify-content-center">
                    {{-- Registrasi --}}
                    <div class="col-6 col-md-3 mb-4">
                        <div class="p-3">
                            <i class="bi bi-person-plus fs-2 mb-2"></i>
                            <h5 class="h6">Registrasi</h5>
                            <p class="small text-black">Registrasi sebagai klien untuk mencari jasa yang Anda butuhkan</p>
                        </div>
                    </div>
                    {{-- Posting --}}
                    <div class="col-6 col-md-3 mb-4">
                        <div class="p-3">
                            <i class="bi bi-file-earmark-plus fs-2 mb-2"></i>
                            <h5 class="h6">Posting</h5>
                            <p class="small text-black">Posting pekerjaan dengan tarif sesuai agar dapat diterima pekerja
                            </p>
                        </div>
                    </div>
                    {{-- Tunggu --}}
                    <div class="col-6 col-md-3 mb-4">
                        <div class="p-3">
                            <i class="bi bi-hourglass-split fs-2 mb-2"></i>
                            <h5 class="h6">Tunggu</h5>
                            <p class="small text-black">Tunggu freelancer mengerjakan tugas yang telah Anda berikan</p>
                        </div>
                    </div>
                    {{-- Bayar --}}
                    <div class="col-6 col-md-3 mb-4">
                        <div class="p-3">
                            <i class="bi bi-cash-coin fs-2 mb-2"></i>
                            <h5 class="h6">Bayar</h5>
                            <p class="small text-black">Setelah selesai, bayarkan tarif sesuai dengan yang disepakati</p>
                        </div>
                    </div>
                </div>

                {{-- Untuk Freelancer --}}
                <div class="freelancer container mt-5">
                    <div class="row align-items-center text-lg-center text-md-start mb-5">

                        <!-- Image -->
                        <div class="col-lg-4 col-md-6 mb-3 mb-md-0">
                            <img class="img-fluid " width="250"
                                src="{{ asset('images/ilustration-freelancer-how-it-works.png') }}"
                                alt="Klien How It Works">
                        </div>

                        <!-- Text -->
                        <div class="col-lg-8 col-md-6 mb-3 mb-md-0">
                            <h2 class="fw-lighter">
                                CARA KERJA SATURSUN FREELANCE <br> UNTUK <span class="fw-bold">FREELANCER</span>
                            </h2>
                        </div>

                    </div>
                </div>

                {{-- Step Freelancer --}}
                <div class="step-freelancer row justify-content-center">
                    {{-- Registrasi --}}
                    <div class="col-6 col-md-3 mb-4">
                        <div class="p-3">
                            <i class="bi bi-person-check fs-2 mb-2"></i>
                            <h5 class="h6">Registrasi</h5>
                            <p class="small text-black">Registrasi sebagai freelancer untuk mendapatkan pekerjaan</p>
                        </div>
                    </div>
                    {{-- Cari --}}
                    <div class="col-6 col-md-3 mb-4">
                        <div class="p-3">
                            <i class="bi bi-search fs-2 mb-2"></i>
                            <h5 class="h6">Cari</h5>
                            <p class="small text-black">Cari pekerjaan sesuai minat dan bayaran yang tercantum</p>
                        </div>
                    </div>
                    {{-- Bekerja --}}
                    <div class="col-6 col-md-3 mb-4">
                        <div class="p-3">
                            <i class="bi bi-briefcase fs-2 mb-2"></i>
                            <h5 class="h6">Bekerja</h5>
                            <p class="small text-black">Selesaikan pekerjaan yang telah diterima dengan baik</p>
                        </div>
                    </div>
                    {{-- Gajian --}}
                    <div class="col-6 col-md-3 mb-4">
                        <div class="p-3">
                            <i class="bi bi-wallet2 fs-2 mb-2"></i>
                            <h5 class="h6">Gajian</h5>
                            <p class="small text-black">Terima bayaran setelah menyelesaikan pekerjaan</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        {{-- CTA Banner --}}
        <section class="cta-banner py-5 bg-primary text-white">
            <div class="container d-flex flex-column flex-md-row align-items-center justify-content-between">
                <div>
                    <h3 class="h4 mb-0 text-black">Siap memulai project?</h3>
                    <p class="mb-0 text-black">Buat project atau cari talent berbakat sekarang.</p>
                </div>
                <div class="mt-3 mt-md-0">
                    <a class="btn btn-light btn-lg border-0">Start a Project</a>
                </div>
            </div>
        </section>

        {{-- FAQ --}}
        <section id="faq" class="faq-section">
            <div class="container">
                <div class="row g-4">
                    {{-- FAQ --}}
                    <div class="col-lg-8">
                        <h4 class="h5">FAQ Singkat</h4>
                        <div class="accordion" id="faqAccordion">
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="faq1">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapse1" aria-expanded="false" aria-controls="collapse1">
                                        Bagaimana proses pembayaran?
                                    </button>
                                </h2>
                                <div id="collapse1" class="accordion-collapse collapse" aria-labelledby="faq1"
                                    data-bs-parent="#faqAccordion">
                                    <div class="accordion-body">
                                        Pada versi awal, pembayaran dilakukan di luar platform. Informasi kontak disediakan
                                        di detail proyek.
                                    </div>
                                </div>
                            </div>

                            <div class="accordion-item">
                                <h2 class="accordion-header" id="faq2">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapse2" aria-expanded="false" aria-controls="collapse2">
                                        Apakah ada rating atau review?
                                    </button>
                                </h2>
                                <div id="collapse2" class="accordion-collapse collapse" aria-labelledby="faq2"
                                    data-bs-parent="#faqAccordion">
                                    <div class="accordion-body">
                                        Fitur rating akan dipertimbangkan di versi berikutnya. Versi MVP menyediakan riwayat
                                        proyek dan bukti kerja.
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

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

                    {{-- Address --}}
                    <div class="col-lg-4">
                        {{-- Location --}}
                        <div class="d-flex align-items-start mb-2">
                            <i class="bi bi-geo-alt-fill me-2 fs-5"></i>
                            <span>
                                Kampus USU, Jl. Almamater, Padang Bulan,
                                Kec. Medan Baru, Kota Medan, Sumatera Utara 20155
                            </span>
                        </div>

                        {{-- Email --}}
                        <div class="d-flex align-items-center">
                            <i class="bi bi-envelope-fill me-2 fs-5"></i>
                            <span>satursunproject@gmail.com</span>
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
                                <h6 class="fw-bold">Follow us on</h6>
                                <div class="d-flex gap-3">
                                    <a class="social-link" href="https://www.instagram.com/satursunproject?igsh=MWxyaTZlOXk3YjdyeQ=="><i class="bi bi-instagram"></i></a>
                                    <a class="social-link" href="https://www.tiktok.com/@satursun.project?_t=ZS-8zdqoBwCjjQ&_r=1"><i class="bi bi-tiktok"></i></a>
                                    <a class="social-link" ><i class="bi bi-youtube"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <hr class="border-secondary my-4">

                <div class="text-center small text-secondary">
                    &copy; {{ date('Y') }} Satursun Freelance | All Rights Reserved
                </div>
            </div>
        </footer>
    </main>
@endsection
