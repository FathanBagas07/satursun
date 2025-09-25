@extends('layouts.app') 

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

<div class="container py-4">
  <div class="d-flex justify-content-between align-items-center mb-3">
    <h4>Posting Job Baru</h4>
  </div>

  <div class="card">
    <form method="POST" action="{{ route('poster.jobs.store') }}" class="card-body">
      @csrf
      <div class="mb-3">
        <label class="form-label">Judul</label>
        <input type="text" name="title" class="form-control" required value="{{ old('title') }}">
        @error('title') <div class="text-danger small">{{ $message }}</div>@enderror
      </div>

      <div class="mb-3">
        <label class="form-label">Deskripsi</label>
        <textarea name="description" rows="5" class="form-control" required>{{ old('description') }}</textarea>
        @error('description') <div class="text-danger small">{{ $message }}</div>@enderror
      </div>

      <div class="row g-3">
    <div class="col-md-6">
        <label class="form-label">Budget Minimal (Rp)</label>
        <input type="number" name="budget_min" step="1000" class="form-control" value="{{ old('budget_min') }}" placeholder="Contoh: 300000">
        @error('budget_min') <div class="text-danger small">{{ $message }}</div>@enderror
    </div>
    <div class="col-md-6">
        <label class="form-label">Budget Maksimal (Rp) <span class="text-muted">(Opsional)</span></label>
        <input type="number" name="budget_max" step="1000" class="form-control" value="{{ old('budget_max') }}" placeholder="Untuk rentang gaji">
        @error('budget_max') <div class="text-danger small">{{ $message }}</div>@enderror
    </div>
    <div class="col-md-6">
        <label class="form-label">Kategori</label>
        <input type="text" name="category" class="form-control" value="{{ old('category') }}">
        @error('category') <div class="text-danger small">{{ $message }}</div>@enderror
    </div>
    <div class="col-md-6">
        <label class="form-label">Lokasi</label>
        <input type="text" name="location" class="form-control" value="{{ old('location') }}">
        @error('location') <div class="text-danger small">{{ $message }}</div>@enderror
    </div>
</div>

      <div class="mt-3">
        <label class="form-label">Deadline</label>
        <input type="date" name="deadline" class="form-control" value="{{ old('deadline') }}">
        @error('deadline') <div class="text-danger small">{{ $message }}</div>@enderror
      </div>

      <div class="text-end mt-4">
        <button class="btn btn-primary">Simpan</button>
      </div>
    </form>
  </div>
</div>
@endsection
