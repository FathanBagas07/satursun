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
                <a class="navbar-brand d-flex align-items-center">
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
                        <li class="nav-item"><a class="nav-link" href="">Tentang</a></li>
                        <li class="nav-item"><a class="nav-link">Cara Kerja</a></li>
                        <li class="nav-item"><a class="nav-link">FAQ</a></li>
                        <li class="nav-item ms-3"><a class="btn btn-outline-primary text-black fw-bold">Daftar</a></li>
                        <li class="nav-item ms-2"><a class="btn btn-primary text-black fw-bold">Masuk</a></li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <main>
        <!-- HERO -->
        <section class="hero text-white mb-5">
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

        <!-- About -->
        <section id="about" class="py-5 text-white">
            <div class="container">
                <!-- Tentang Kami -->
                <div class="row align-items-center">
                    <div class="col-lg-6">
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

        <!-- Why Choose -->
        <section id="why-choose" class="py-5 bg-white">
            <div class="container">
                <div class="row g-4 align-items-center d-flex justify-content-between">
                    <!-- Judul kiri -->
                    <div class="col-lg-4 d-flex align-items-center">
                        <h3 class="section-title fw-bold text-md-start text-center w-100 display-5">
                            MENGAPA HARUS<br> SATURSUN FREELANCE?
                        </h3>
                    </div>
                    <!-- List kanan -->
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

        <!-- HOW IT WORKS / FEATURES -->
        <section id="how-it-works" class="py-5">
            <div class="container">
                <h2 class="h3 text-center mb-4">Cara Kerja</h2>

                <div class="row g-4">
                    <div class="col-md-4">
                        <article class="feature p-4 h-100 border rounded-3">
                            <h3 class="h5">1. Klien Posting</h3>
                            <p class="mb-0 text-muted">Klien membuat tugas singkat lengkap dengan deskripsi dan tenggat.</p>
                        </article>
                    </div>

                    <div class="col-md-4">
                        <article class="feature p-4 h-100 border rounded-3">
                            <h3 class="h5">2. Freelancer Ajukan</h3>
                            <p class="mb-0 text-muted">Freelancer mengajukan proposal atau hasil kerja untuk
                                dipertimbangkan.</p>
                        </article>
                    </div>

                    <div class="col-md-4">
                        <article class="feature p-4 h-100 border rounded-3">
                            <h3 class="h5">3. Klien Pilih</h3>
                            <p class="mb-0 text-muted">Klien menilai dan memilih pemenang. Notifikasi dikirimkan pada
                                pemenang.</p>
                        </article>
                    </div>
                </div>
            </div>
        </section>

        <!-- CTA BANNER -->
        <section class="py-5 bg-primary text-white">
            <div class="container d-flex flex-column flex-md-row align-items-center justify-content-between">
                <div>
                    <h3 class="h4 mb-0">Siap memulai project?</h3>
                    <p class="mb-0 text-white-50">Buat project atau cari talent berbakat sekarang.</p>
                </div>
                <div class="mt-3 mt-md-0">
                    <a class="btn btn-light btn-lg">Start a Project</a>
                </div>
            </div>
        </section>

        <!-- FAQ / Footer Summary -->
        <section id="faq" class="py-5">
            <div class="container">
                <div class="row g-4">
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

                    <div class="col-lg-4">
                        <h4 class="h5">Kontak & Quick Links</h4>
                        <ul class="list-unstyled">
                            <li><a>Tentang Satursun</a></li>
                            <li><a>Syarat & Ketentuan</a></li>
                            <li><a>Kebijakan Privasi</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>

        <!-- FOOTER -->
        <footer class="py-4 bg-dark text-white">
            <div class="container d-flex flex-column flex-md-row justify-content-between align-items-center">
                <div>
                    <small>&copy; {{ date('Y') }} Satursun Freelance. All rights reserved.</small>
                </div>
                <div class="d-flex gap-3">
                    <a href="#" class="text-white text-decoration-none">Twitter</a>
                    <a href="#" class="text-white text-decoration-none">Instagram</a>
                    <a href="#" class="text-white text-decoration-none">LinkedIn</a>
                </div>
            </div>
        </footer>
    </main>
@endsection
