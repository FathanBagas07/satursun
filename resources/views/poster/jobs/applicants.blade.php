@extends('layouts.app')

@section('title', 'Pelamar - ' . $jobListing->title)

@section('body')
<div class="container py-4">

    {{-- NAVIGASI & HEADER --}}
    <nav class="navbar navbar-expand-lg bg-white border-bottom sticky-top mb-4">
        <div class="container">
            <a class="navbar-brand fw-semibold" href="{{ route('landing') }}">
                <img src="{{ asset('images/logo.svg') }}" alt="Satursun Logo" height="28" class="me-2"> Satursun
            </a>
            <div class="ms-auto">
                <a href="{{ route('poster.jobs.index') }}" class="btn btn-outline-secondary btn-sm">Kembali ke Job Saya</a>
            </div>
        </div>
    </nav>

    @if (session('status'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('status') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="d-flex flex-wrap justify-content-between align-items-center mb-3 gap-2">
        <div>
            <h4 class="mb-0">Pelamar — {{ $jobListing->title }}</h4>
            <div class="small text-muted">
                Status Job:
                @php $badge = ['open'=>'success','paused'=>'warning','closed'=>'secondary', 'selected'=>'primary'][$jobListing->status] ?? 'secondary'; @endphp
                <span class="badge bg-{{ $badge }}">{{ ucfirst($jobListing->status) }}</span>
            </div>
        </div>
    </div>

    {{-- Memisahkan pelamar menjadi dua grup: 'pending' (baru/diterima) dan 'rejected' (ditolak) --}}
    @php
        list($pendingApplicants, $rejectedApplicants) = $applicants->partition(fn($app) => $app->status !== 'rejected');
    @endphp

    {{-- BAGIAN PELAMAR BARU & DITERIMA --}}
    <h5>Pelamar Baru</h5>
    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
        @forelse ($pendingApplicants as $application)
            @php
                $user = $application->user;
                $profile = $user->profile ?? null;
            @endphp
            <div class="col">
                <div class="card h-100 shadow-sm">
                    <div class="card-body text-center">
                        {{-- Foto Profil --}}
                        @if($profile && $profile->photo)
                            <img src="{{ Storage::url($profile->photo) }}" class="rounded-circle mb-3" style="width: 80px; height: 80px; object-fit: cover;" alt="avatar">
                        @else
                            <div class="rounded-circle bg-secondary bg-opacity-10 border d-flex align-items-center justify-content-center mb-3 mx-auto" style="width:80px;height:80px;">
                                <span class="fs-1 text-secondary">{{ strtoupper(substr($user->name ?? 'U', 0, 1)) }}</span>
                            </div>
                        @endif

                        {{-- Info Singkat --}}
                        <h5 class="card-title">{{ $user->name }}</h5>
                        <p class="card-text text-muted">{{ optional($profile)->last_education ?? 'Pendidikan belum diisi' }}</p>

                        {{-- Tombol Lihat Detail (Memicu Modal) --}}
                        <button type="button" class="btn btn-outline-primary btn-sm stretched-link" data-bs-toggle="modal" data-bs-target="#applicantModal-{{ $application->id }}">
                            Lihat Detail
                        </button>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12">
                <div class="card card-body text-center">
                    <p class="text-muted mb-0">Belum ada pelamar baru.</p>
                </div>
            </div>
        @endforelse
    </div>

    {{-- BAGIAN PELAMAR DITOLAK (HANYA TAMPIL JIKA ADA) --}}
    @if($rejectedApplicants->isNotEmpty())
        <hr class="my-5">
        <h5 class="text-muted">Pelamar Ditolak</h5>
        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
            @foreach ($rejectedApplicants as $application)
                @php
                    $user = $application->user;
                    $profile = $user->profile ?? null;
                @endphp
                <div class="col">
                    <div class="card h-100 shadow-sm bg-light">
                        <div class="card-body text-center">
                            {{-- Foto Profil --}}
                            @if($profile && $profile->photo)
                                <img src="{{ Storage::url($profile->photo) }}" class="rounded-circle mb-3" style="width: 80px; height: 80px; object-fit: cover;" alt="avatar">
                            @else
                                <div class="rounded-circle bg-secondary bg-opacity-10 border d-flex align-items-center justify-content-center mb-3 mx-auto" style="width:80px;height:80px;">
                                    <span class="fs-1 text-secondary">{{ strtoupper(substr($user->name ?? 'U', 0, 1)) }}</span>
                                </div>
                            @endif
                            <h5 class="card-title">{{ $user->name }}</h5>
                            <p class="card-text text-muted">{{ optional($profile)->last_education ?? 'Pendidikan belum diisi' }}</p>
                            <button type="button" class="btn btn-outline-secondary btn-sm stretched-link" data-bs-toggle="modal" data-bs-target="#applicantModal-{{ $application->id }}">
                                Lihat Detail
                            </button>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif

    {{-- MODAL UNTUK SEMUA PELAMAR (Diletakkan di luar loop utama) --}}
    @foreach($applicants as $application)
        @php
            $user = $application->user;
            $profile = $user->profile ?? null;
        @endphp
        <div class="modal fade" id="applicantModal-{{ $application->id }}" tabindex="-1" aria-labelledby="applicantModalLabel-{{ $application->id }}" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="applicantModalLabel-{{ $application->id }}">Detail Pelamar</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            {{-- Kolom Kiri: Info Utama & Aksi --}}
                            <div class="col-md-4 text-center border-end">
                                @if($profile && $profile->photo)
                                    <img src="{{ Storage::url($profile->photo) }}" class="rounded-circle mb-3" style="width: 120px; height: 120px; object-fit: cover;" alt="avatar">
                                @else
                                    <div class="rounded-circle bg-secondary bg-opacity-10 border d-flex align-items-center justify-content-center mb-3 mx-auto" style="width:120px;height:120px;">
                                        <span class="fs-1 text-secondary">{{ strtoupper(substr($user->name ?? 'U', 0, 1)) }}</span>
                                    </div>
                                @endif
                                <h5 class="mb-1">{{ $user->name }}</h5>
                                <p class="text-muted mb-1">{{ $user->email }}</p>
                                <p class="text-muted small">
                                    <i class="bi bi-telephone-fill"></i> {{ optional($profile)->phone ?? '-' }}
                                </p>

                                <a href="{{ route('poster.applications.cv', $application) }}" class="btn btn-primary w-100 mb-2" target="_blank">Lihat CV</a>

                                <div class="d-flex gap-2">
                                    {{-- Tombol Terima --}}
                                    <form method="POST" action="{{ route('poster.applications.status', $application) }}" class="w-100">
                                        @csrf @method('PATCH')
                                        <input type="hidden" name="status" value="accepted">
                                        <button type="submit" class="btn btn-success w-100" {{ $application->status==='accepted' ? 'disabled' : '' }}>Terima</button>
                                    </form>
                                    {{-- Tombol Tolak --}}
                                    <form method="POST" action="{{ route('poster.applications.status', $application) }}" class="w-100">
                                        @csrf @method('PATCH')
                                        <input type="hidden" name="status" value="rejected">
                                        <button type="submit" class="btn btn-danger w-100" {{ $application->status==='rejected' ? 'disabled' : '' }}>Tolak</button>
                                    </form>
                                </div>
                            </div>

                            {{-- Kolom Kanan: Detail & Histori --}}
                            <div class="col-md-8">
                                <h6>Catatan dari Pelamar</h6>
                                <p class="text-muted fst-italic">{{ $application->note ?? 'Tidak ada catatan.' }}</p>
                                <hr>
                                
                                <h6>Tentang Saya</h6>
                                <p class="text-muted">{{ optional($profile)->bio ?? 'Bio belum diisi.' }}</p>
                                <hr>

                                <h6>Skills</h6>
                                <p><strong>Hard Skills:</strong> {{ optional($profile)->hard_skills ? implode(', ', $profile->hard_skills) : 'Tidak ada' }}</p>
                                <p><strong>Soft Skills:</strong> {{ optional($profile)->soft_skills ? implode(', ', $profile->soft_skills) : 'Tidak ada' }}</p>
                                <hr>

                                <h6>Histori Pekerjaan Diterima</h6>
                                <ul class="list-group list-group-flush">
                                    @forelse ($application->user->applications as $completedApp)
                                        <li class="list-group-item d-flex justify-content-between align-items-center px-0">
                                            <span>{{ $completedApp->jobListing->title }}</span>
                                            <span class="badge bg-light text-dark">{{ $completedApp->jobListing->created_at->format('M Y') }}</span>
                                        </li>
                                    @empty
                                        <li class="list-group-item px-0">
                                            <p class="text-muted mb-0">Belum ada histori pekerjaan di platform ini.</p>
                                        </li>
                                    @endforelse
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach

    {{-- PAGINATION --}}
    <div class="mt-4">
        {{ $applicants->links() }}
    </div>
</div>
@endsection