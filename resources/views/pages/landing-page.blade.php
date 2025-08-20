@extends('layouts.app')

@section('title', 'Satursun: Platform Freelance untuk Mahasiswa')

@section('head')
    @parent
    <link rel="stylesheet" href="{{ asset('css/landing-page.css') }}">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;700&display=swap" rel="stylesheet">
@endsection

@section('body')
<main class="landing-page">
    {{-- Navbar --}}
    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand d-flex align-items-center">
                    <img src="{{ asset('images/logo.svg') }}" alt="Satursun Logo" height="44">
                </a>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNav"
                    aria-controls="mainNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="mainNav">
                    <ul class="navbar-nav ms-auto align-items-lg-center">
                        <li class="nav-item"><a class="nav-link" >Tentang</a></li>
                        <li class="nav-item"><a class="nav-link" >Cara Kerja</a></li>
                        <li class="nav-item"><a class="nav-link" >FAQ</a></li>
                        <li class="nav-item ms-3"><a class="btn btn-outline-primary">Daftar</a></li>
                        <li class="nav-item ms-2"><a class="btn btn-primary text-white">Masuk</a></li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <!-- HERO -->
    <section class="hero py-5">
        <div class="container">
            <div class="row align-items-center gx-5">
                <div class="col-lg-6">
                    <h1 class="display-5 fw-bold">Lebih Fleksibel Jadi Freelancer</h1>
                    <p class="lead text-muted">Temukan peluang kerja akhir pekan yang cocok untuk mahasiswa. Kerja singkat, bayar wajar, pengalaman nyata.</p>

                    <div class="d-flex gap-2 mt-4">
                        <a class="btn btn-primary btn-lg">Cari Project</a>
                        <a class="btn btn-outline-secondary btn-lg">Daftar Sekarang</a>
                    </div>
                </div>

                <div class="col-lg-6 d-none d-lg-block">
                    <!-- gambar hero (gunakan gambar landscape resolusi bagus) -->
                    <div class="hero-media rounded-3 overflow-hidden shadow" role="img" aria-label="Ilustrasi freelancer">
                        <img alt="Freelancer berjalan" class="img-fluid w-100">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ABOUT -->
    <section id="about" class="py-5 bg-light">
        <div class="container">
            <div class="row g-4 align-items-center">
                <div class="col-lg-6">
                    <h2 class="h3">Tentang Satursun</h2>
                    <p class="text-muted">Satursun adalah platform freelance berbasis kontes mikro yang menghubungkan klien dengan freelancer—khususnya mahasiswa—untuk tugas-tugas singkat pada akhir pekan. Klien mem-posting proyek, freelancer mengajukan, dan klien memilih hasil terbaik.</p>

                    <ul class="list-unstyled mt-3">
                        <li class="mb-2"><strong>Target:</strong> Mahasiswa & pemuda 17–25 tahun</li>
                        <li class="mb-2"><strong>Model:</strong> Proyek mikro (kontes/pengajuan)</li>
                        <li class="mb-2"><strong>MVP:</strong> Pembuatan proyek, pengajuan, pemilihan, dashboard sederhana</li>
                    </ul>

                    <a href="#how-it-works" class="btn btn-outline-primary mt-3">Pelajari Cara Kerja</a>
                </div>

                <div class="col-lg-6">
                    <div class="card shadow-sm">
                        <div class="card-body">
                            <h3 class="h5">Mengapa Pakai Satursun?</h3>
                            <p class="mb-0 text-muted">Cepat, mudah, dan fokus pada kerja akhir pekan. Bangun portofolio tanpa mengorbankan jadwal kuliah.</p>
                        </div>
                    </div>
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
                        <p class="mb-0 text-muted">Freelancer mengajukan proposal atau hasil kerja untuk dipertimbangkan.</p>
                    </article>
                </div>

                <div class="col-md-4">
                    <article class="feature p-4 h-100 border rounded-3">
                        <h3 class="h5">3. Klien Pilih</h3>
                        <p class="mb-0 text-muted">Klien menilai dan memilih pemenang. Notifikasi dikirimkan pada pemenang.</p>
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
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse1" aria-expanded="false" aria-controls="collapse1">
                                    Bagaimana proses pembayaran?
                                </button>
                            </h2>
                            <div id="collapse1" class="accordion-collapse collapse" aria-labelledby="faq1" data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    Pada versi awal, pembayaran dilakukan di luar platform. Informasi kontak disediakan di detail proyek.
                                </div>
                            </div>
                        </div>

                        <div class="accordion-item">
                            <h2 class="accordion-header" id="faq2">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse2" aria-expanded="false" aria-controls="collapse2">
                                    Apakah ada rating atau review?
                                </button>
                            </h2>
                            <div id="collapse2" class="accordion-collapse collapse" aria-labelledby="faq2" data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    Fitur rating akan dipertimbangkan di versi berikutnya. Versi MVP menyediakan riwayat proyek dan bukti kerja.
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
