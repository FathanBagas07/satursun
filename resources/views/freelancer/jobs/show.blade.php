@extends('layouts.app')

@section('title', $jobListing->title)

@section('body')
<nav class="navbar navbar-expand-lg bg-white border-bottom sticky-top">
    <div class="container">
        <a class="navbar-brand fw-semibold" href="{{ route('landing') }}">
            <img src="{{ asset('images/logo.svg') }}" alt="Satursun Logop" height="28" class="me-2"> Satursun
        </a>
        <div class="ms-auto">
            <a href="{{ route('freelancer.jobs.browse') }}" class="btn btn-outline-secondary btn-sm">Kembali</a>
        </div>
    </div>
</nav>
<main class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">

            {{-- KONTEN UTAMA --}}
            <div class="card">
                <div class="card-body p-4">
                    <h1 class="h3">{{ $jobListing->title }}</h1>
                    <div class="d-flex flex-wrap gap-3 text-muted small mb-3">
                        <span><i class="bi bi-geo-alt-fill"></i> {{ $jobListing->location ?? 'Remote' }}</span>
                        <span><i class="bi bi-tag-fill"></i> {{ $jobListing->category ?? 'Lainnya' }}</span>
                        <span><i class="bi bi-clock-fill"></i> Diposting {{ $jobListing->created_at->diffForHumans() }}</span>
                    </div>
                    <hr>
                    <h5 class="fw-semibold">Deskripsi Pekerjaan</h5>
                    <div class="job-description">
                        {!! nl2br(e($jobListing->description)) !!}
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-6">
                            <h5 class="fw-semibold">Budget</h5>
                            <p class="fs-4 text-primary fw-bold">
                                @if($jobListing->budget_max && $jobListing->budget_max > $jobListing->budget_min)
                                Rp {{ number_format($jobListing->budget_min, 0, ',', '.') }} - {{ number_format($jobListing->budget_max, 0, ',', '.') }}
                                @elseif($jobListing->budget_min)
                                Rp {{ number_format($jobListing->budget_min, 0, ',', '.') }}
                                @else
                                Budget Nego
                                @endif
                            </p>
                        </div>
                        <div class="col-md-6">
                            <h5 class="fw-semibold">Deadline</h5>
                            <p class="fs-5">{{ $jobListing->deadline ? \Carbon\Carbon::parse($jobListing->deadline)->format('d F Y') : 'Tidak ditentukan' }}</p>
                        </div>
                    </div>
                </div>
            </div>

            {{-- FORM LAMARAN --}}
            @if ($jobListing->status === 'open')
            <div class="card mt-4">
                <div class="card-header fw-semibold">Ajukan Lamaran</div>
                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success">{{ session('status') }}</div>
                    @endif

                    <form method="POST" action="{{ route('freelancer.jobs.apply', $jobListing) }}" enctype="multipart/form-data">
                        @csrf

                        <div class="mb-3">
                            <label for="note" class="form-label">Catatan Tambahan (Opsional)</label>
                            <textarea name="note" id="note" rows="3" class="form-control" placeholder="Contoh: No. Telepon, link portofolio, atau pesan singkat lainnya.">{{ old('note') }}</textarea>
                            @error('note')
                            <div class="text-danger small mt-1">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="cv" class="form-label">Unggah CV Anda (PDF, maks. 2MB)</label>
                            <input class="form-control" type="file" id="cv" name="cv" accept=".pdf" required>
                            @error('cv')
                            <div class="text-danger small mt-1">{{ $message }}</div>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary">Kirim Lamaran</button>
                    </form>
                </div>
                @else
                {{-- Tampilkan pesan ini jika job sudah tutup --}}
                <div class="alert alert-warning mt-4" role="alert">
                    <h4 class="alert-heading">Pekerjaan Telah Ditutup</h4>
                    <p>Pekerjaan ini sudah tidak lagi menerima lamaran karena posisi telah terisi.</p>
                </div>
                @endif
            </div>
        </div>
    </div>
</main>
@endsection