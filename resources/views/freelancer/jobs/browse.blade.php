@extends('layouts.app')

@section('title', 'Cari Pekerjaan Freelance')

@section('body')

 <nav class="navbar navbar-expand-lg bg-white border-bottom sticky-top">
        <div class="container">
            <a class="navbar-brand fw-semibold" href="{{ route('landing') }}">
                <img src="{{ asset('images/logo.svg') }}" alt="Satursun Logop" height="28" class="me-2"> Satursun
            </a>
            <div class="ms-auto">
                <a href="{{ route('landing') }}" class="btn btn-outline-secondary btn-sm">Kembali</a>
            </div>
        </div>
    </nav>
<main class="container py-4">
    <div class="row">
        {{-- KOLOM FILTER --}}
        <div class="col-lg-3">
            <div class="card">
                <div class="card-header fw-semibold">Filter Pekerjaan</div>
                <div class="card-body">
                    <form method="GET" action="{{ route('freelancer.jobs.browse') }}">
                        <div class="mb-3">
                            <label class="form-label">Kata Kunci</label>
                            <input type="text" name="q" class="form-control" placeholder="Judul pekerjaan..." value="{{ request('q') }}">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Lokasi</label>
                            <input type="text" name="location" class="form-control" placeholder="e.g. Medan" value="{{ request('location') }}">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Kategori</label>
                            <input type="text" name="category" class="form-control" placeholder="e.g. Desain Grafis" value="{{ request('category') }}">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Min. Gaji (Rp)</label>
                            <input type="number" name="min_budget" class="form-control" placeholder="e.g. 50000" value="{{ request('min_budget') }}">
                        </div>
                        <div class="d-grid">
                            <button class="btn btn-primary">Terapkan Filter</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        {{-- KOLOM DAFTAR PEKERJAAN --}}
        <div class="col-lg-9">
            @php
                list($openJobs, $closedJobs) = $jobs->partition(fn($job) => $job->status === 'open');
            @endphp

            {{-- BAGIAN PEKERJAAN TERSEDIA --}}
            <h3 class="mb-3">Pekerjaan Tersedia</h3>
            <div class="row row-cols-1 row-cols-md-2 row-cols-xl-3 g-4">
                @forelse ($openJobs as $job)
                <div class="col">
                    <div class="card h-100">
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title">{{ $job->title }}</h5>
                            <div class="small text-muted mb-2">
                                <i class="bi bi-geo-alt-fill"></i> {{ $job->location ?? 'Remote' }}
                            </div>
                            <p class="card-text text-muted small flex-grow-1">
                                {{ Str::limit(strip_tags($job->description), 120) }}
                            </p>
                            <div class="mt-auto">
                                <div class="fw-bold fs-5 text-primary">
                                    @if($job->budget_max && $job->budget_max > $job->budget_min)
                                    Rp {{ number_format($job->budget_min, 0, ',', '.') }} - {{ number_format($job->budget_max, 0, ',', '.') }}
                                    @elseif($job->budget_min)
                                    Rp {{ number_format($job->budget_min, 0, ',', '.') }}
                                    @else
                                    Budget Nego
                                    @endif
                                </div>
                                <a href="{{ route('freelancer.jobs.show', $job) }}" class="stretched-link"></a>
                            </div>
                        </div>
                        <div class="card-footer small text-muted">
                            Diposting {{ $job->created_at->diffForHumans() }}
                        </div>
                    </div>
                </div>
                @empty
                <div class="col-12">
                    <div class="card card-body text-center">
                        <p class="text-muted mb-0">Tidak ada pekerjaan yang tersedia saat ini.</p>
                    </div>
                </div>
                @endforelse
            </div>

            {{-- BAGIAN PEKERJAAN DITUTUP (HANYA TAMPIL JIKA ADA) --}}
            @if($closedJobs->isNotEmpty())
                <hr class="my-5">
                <h3 class="mb-3">Pekerjaan Ditutup</h3>
                <div class="row row-cols-1 row-cols-md-2 row-cols-xl-3 g-4">
                    @foreach ($closedJobs as $job)
                    <div class="col">
                        <div class="card h-100 bg-light">
                            <div class="card-body d-flex flex-column">
                                <span class="badge bg-secondary mb-2 align-self-start">Telah Ditutup</span>
                                <h5 class="card-title">{{ $job->title }}</h5>
                                <div class="small text-muted mb-2">
                                    <i class="bi bi-geo-alt-fill"></i> {{ $job->location ?? 'Remote' }}
                                </div>
                                <p class="card-text text-muted small flex-grow-1">
                                    {{ Str::limit(strip_tags($job->description), 120) }}
                                </p>
                                <div class="mt-auto">
                                    <div class="fw-bold fs-5 text-primary">
                                        @if($job->budget_max && $job->budget_max > $job->budget_min)
                                        Rp {{ number_format($job->budget_min, 0, ',', '.') }} - {{ number_format($job->budget_max, 0, ',', '.') }}
                                        @elseif($job->budget_min)
                                        Rp {{ number_format($job->budget_min, 0, ',', '.') }}
                                        @else
                                        Budget Nego
                                        @endif
                                    </div>
                                    <a href="{{ route('freelancer.jobs.show', $job) }}" class="stretched-link"></a>
                                </div>
                            </div>
                            <div class="card-footer small text-muted">
                                Diposting {{ $job->created_at->diffForHumans() }}
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            @endif

            {{-- PAGINATION --}}
            <div class="mt-4">
                {{ $jobs->links() }}
            </div>
        </div>
    </div>
</main>
@endsection