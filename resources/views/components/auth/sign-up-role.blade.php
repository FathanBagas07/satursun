<section id="step-role" class="select-role py-5">
    <div class="row justify-content-center">
        <div class="col-11 col-md-8 col-lg-6">
            <div class="card shadow-lg border-0" max-width="600px">
                <h1 class="text-center h4 fw-semibold pt-3">Pilih Peran Anda</h1>
                <div class="card-body px-4">
                    <div class="row g-4">

                        {{-- Freelancer Card --}}
                        <div class="freelancer-card role-card col-12 col-sm-6">
                            <div class="card role-card h-100 text-center p-3" role="button"
                                onclick="selectRole('freelancer')">
                                <div class="card-body d-flex flex-column align-items-center">
                                    <i class="bi bi-briefcase-fill fs-1 text-primary mb-2"></i>
                                    <h5 class="card-title fw-bold">Freelancer</h5>
                                    <p class="card-text small">
                                        Dapatkan penghasilan dengan menawarkan jasa
                                        atau mendaftar ke proyek yang tersedia
                                    </p>
                                </div>
                            </div>
                        </div>

                        {{-- Client Card --}}
                        <div class="client-card role-card col-12 col-sm-6">
                            <div class="card role-card h-100 text-center p-3" role="button"
                                onclick="selectRole('poster')">
                                <div class="card-body d-flex flex-column align-items-center">
                                    <i class="bi bi-person-badge-fill fs-1 text-success mb-2"></i>
                                    <h5 class="card-title fw-bold">Klien</h5>
                                    <p class="card-text small">
                                        Cari jasa atau freelancer yang sesuai
                                        untuk menyelesaikan proyek Anda
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <p class="text-center small mt-4 mb-3">
                        Sudah punya akun ? <a href="{{ route('login') }}">Login di sini</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>
