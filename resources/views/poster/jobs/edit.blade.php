@extends('layouts.app')

@section('title', 'Edit Tugas - Satursun')

@section('body')

 <nav class="navbar navbar-expand-lg bg-white border-bottom sticky-top">
        <div class="container">
            <a class="navbar-brand fw-semibold" href="{{ route('landing') }}">
                <img src="{{ asset('images/logo.svg') }}" alt="Satursun Logop" height="28" class="me-2"> Satursun
            </a>
            <div class="ms-auto">
                <a href="{{ route('poster.jobs.index') }}" class="btn btn-outline-secondary btn-sm">Kembali</a>
            </div>
        </div>
    </nav>

<main class="container my-4">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <form id="editJobForm" method="POST" action="{{ route('poster.jobs.update', $job) }}">
                @csrf
                @method('PATCH')
                <div class="card">
                    <div class="card-header d-flex align-items-center justify-content-between">
                        <span class="fw-semibold h5 mb-0">Edit Detail Pekerjaan</span>
                        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <label for="title" class="form-label">Judul Tugas <span class="text-danger">*</span></label>
                            <input type="text" id="title" name="title" value="{{ old('title', $job->title) }}"
                                class="form-control @error('title') is-invalid @enderror" required maxlength="200">
                            @error('title')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="description" class="form-label">Deskripsi Lengkap <span class="text-danger">*</span></label>
                            <textarea id="description" name="description" rows="6"
                                class="form-control @error('description') is-invalid @enderror"
                                required>{{ old('description', $job->description) }}</textarea>
                            @error('description')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <hr class="my-4">

                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="budget_min" class="form-label">Budget Minimal (Rp)</label>
                                    <input type="number" id="budget_min" name="budget_min" value="{{ old('budget_min', $job->budget_min) }}" class="form-control @error('budget_min') is-invalid @enderror" placeholder="Contoh: 300000">
                                    @error('budget_min') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="budget_max" class="form-label">Budget Maksimal (Rp) <span class="text-muted">(Opsional)</span></label>
                                    <input type="number" id="budget_max" name="budget_max" value="{{ old('budget_max', $job->budget_max) }}" class="form-control @error('budget_max') is-invalid @enderror" placeholder="Untuk rentang gaji">
                                    @error('budget_max') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="deadline" class="form-label">Batas Waktu (Deadline)</label>
                                    <input type="date" id="deadline" name="deadline" value="{{ old('deadline', $job->deadline) }}" min="{{ date('Y-m-d') }}" class="form-control @error('deadline') is-invalid @enderror">
                                    @error('deadline') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="location" class="form-label">Lokasi</label>
                                    <input type="text" id="location" name="location" value="{{ old('location', $job->location) }}" class="form-control @error('location') is-invalid @enderror" maxlength="200">
                                    @error('location') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</main>
@endsection