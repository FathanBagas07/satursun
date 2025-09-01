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
                        <h3 class="section-title fw-bold text-md-start text-center w-100 display-6">
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

        <!-- HOW IT WORKS -->
        <section id="how-it-works" class="how-it-works mb-5">
            <div class="container text-center">
                <img class="img-how-it-works img-fluid rounded-top-4 mb-4"
                    src="{{ asset('images/satursun-how-it-works.svg') }}" alt="Satursun">

                <!-- Untuk Klien -->
                <h2 class="h4 fw-bold mb-4">CARA KERJA SATURSUN FREELANCE <br> UNTUK <span class="text-dark">KLIEN</span>
                </h2>

                <div class="row justify-content-center mb-5">
                    <div class="col-6 col-md-3 mb-4">
                        <div class="p-3">
                            <i class="bi bi-person-plus fs-2 mb-2"></i>
                            <h5 class="h6">Registrasi</h5>
                            <p class="small text-muted">Registrasi sebagai klien untuk mencari jasa yang Anda butuhkan</p>
                        </div>
                    </div>
                    <div class="col-6 col-md-3 mb-4">
                        <div class="p-3">
                            <i class="bi bi-file-earmark-plus fs-2 mb-2"></i>
                            <h5 class="h6">Posting</h5>
                            <p class="small text-muted">Posting pekerjaan dengan tarif sesuai agar dapat diterima pekerja
                            </p>
                        </div>
                    </div>
                    <div class="col-6 col-md-3 mb-4">
                        <div class="p-3">
                            <i class="bi bi-hourglass-split fs-2 mb-2"></i>
                            <h5 class="h6">Tunggu</h5>
                            <p class="small text-muted">Tunggu freelancer mengerjakan tugas yang telah Anda berikan</p>
                        </div>
                    </div>
                    <div class="col-6 col-md-3 mb-4">
                        <div class="p-3">
                            <i class="bi bi-cash-coin fs-2 mb-2"></i>
                            <h5 class="h6">Bayar</h5>
                            <p class="small text-muted">Setelah selesai, bayarkan tarif sesuai dengan yang disepakati</p>
                        </div>
                    </div>
                </div>

                <!-- Untuk Freelancer -->
                <h2 class="h4 fw-bold mb-4">CARA KERJA SATURSUN FREELANCE <br> UNTUK <span
                        class="text-dark">FREELANCER</span></h2>

                <div class="row justify-content-center">
                    <div class="col-6 col-md-3 mb-4">
                        <div class="p-3">
                            <i class="bi bi-person-check fs-2 mb-2"></i>
                            <h5 class="h6">Registrasi</h5>
                            <p class="small text-muted">Registrasi sebagai freelancer untuk mendapatkan pekerjaan</p>
                        </div>
                    </div>
                    <div class="col-6 col-md-3 mb-4">
                        <div class="p-3">
                            <i class="bi bi-search fs-2 mb-2"></i>
                            <h5 class="h6">Cari</h5>
                            <p class="small text-muted">Cari pekerjaan sesuai minat dan bayaran yang tercantum</p>
                        </div>
                    </div>
                    <div class="col-6 col-md-3 mb-4">
                        <div class="p-3">
                            <i class="bi bi-briefcase fs-2 mb-2"></i>
                            <h5 class="h6">Bekerja</h5>
                            <p class="small text-muted">Selesaikan pekerjaan yang telah diterima dengan baik</p>
                        </div>
                    </div>
                    <div class="col-6 col-md-3 mb-4">
                        <div class="p-3">
                            <i class="bi bi-wallet2 fs-2 mb-2"></i>
                            <h5 class="h6">Gajian</h5>
                            <p class="small text-muted">Terima bayaran setelah menyelesaikan pekerjaan</p>
                        </div>
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
