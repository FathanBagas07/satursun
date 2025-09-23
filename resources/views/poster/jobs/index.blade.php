@extends('layouts.app')

@section('body')
<div class="container py-4">

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


    {{-- Alert status --}}
    @if (session('status'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('status') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

    <div class="d-flex flex-wrap justify-content-between align-items-center mb-3 gap-2">
        <h4 class="mb-0">Job Saya</h4>

        <div class="d-flex align-items-center gap-2">
            {{-- Filter (GET) agar kompatibel dengan controller yang membaca q & status --}}
            <form class="d-flex gap-2" method="GET" action="{{ route('poster.jobs.index') }}">
                <input type="text" name="q" value="{{ request('q') }}" class="form-control form-control-sm" placeholder="Cari judul/desk.">
                <select name="status" class="form-select form-select-sm" style="min-width:120px">
                    <option value="">Semua Status</option>
                    <option value="open" @selected(request('status')==='open' )>Open</option>
                    <option value="paused" @selected(request('status')==='paused' )>Paused</option>
                    <option value="closed" @selected(request('status')==='closed' )>Closed</option>
                </select>
                <button class="btn btn-outline-secondary btn-sm">Filter</button>
            </form>

            <a href="{{ route('poster.jobs.create') }}" class="btn btn-primary btn-sm">
                + Posting Job
            </a>
        </div>
    </div>

    <div class="card">
        <div class="table-responsive">
            <table class="table align-middle mb-0">
                <thead class="table-light">
                    <tr>
                        <th style="width:38%">Judul</th>
                        <th>Status</th>
                        <th class="text-center">Pelamar</th>
                        <th>Dibuat</th>
                        <th class="text-end" style="width:34%">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($jobs as $job)
                    <tr>
                        <td class="fw-semibold">
                            {{ $job->title }}
                            <div class="small text-muted text-truncate" style="max-width:520px">
                                {{ \Illuminate\Support\Str::limit(strip_tags($job->description), 140) }}
                            </div>
                        </td>
                        <td>
                            @php
                            $badge = [
                            'open' => 'success',
                            'paused' => 'warning',
                            'closed' => 'secondary',
                            ][$job->status] ?? 'secondary';
                            @endphp
                            <span class="badge bg-{{ $badge }}">{{ ucfirst($job->status) }}</span>
                        </td>
                        <td class="text-center">
                            {{ $job->applications()->count() }}
                        </td>
                        <td>
                            <div>{{ $job->created_at?->format('d M Y') }}</div>
                            <!-- <div class="small text-muted">upd {{ $job->updated_at?->diffForHumans() }}</div> -->
                        </td>
                        <td class="text-end">
                            <div class="d-flex gap-2 justify-content-end">
                                {{-- Lihat Pelamar --}}
                                <a href="{{ route('poster.jobs.applicants', $job) }}" class="btn btn-outline-secondary btn-sm">
                                    Lihat Pelamar
                                </a>

                                {{-- Edit --}}
                                <a href="{{ route('poster.jobs.edit', $job) }}" class="btn btn-outline-primary btn-sm">
                                    Edit
                                </a>

                                {{-- Status: Open --}}
                                <form method="POST" action="{{ route('poster.jobs.status', $job) }}" class="d-inline">
                                    @csrf @method('PATCH')
                                    <input type="hidden" name="status" value="open">
                                    <button class="btn btn-outline-success btn-sm" {{ $job->status==='open' ? 'disabled' : '' }}>
                                        Buka
                                    </button>
                                </form>

                                {{-- Status: Close --}}
                                <form method="POST" action="{{ route('poster.jobs.status', $job) }}" class="d-inline">
                                    @csrf @method('PATCH')
                                    <input type="hidden" name="status" value="closed">
                                    <button class="btn btn-outline-danger btn-sm" {{ $job->status==='closed' ? 'disabled' : '' }}>
                                        Tutup
                                    </button>
                                </form>

                                {{-- Hapus --}}
                                <form method="POST" action="{{ route('poster.jobs.destroy', $job) }}" class="d-inline" onsubmit="return confirm('Hapus job ini?')">
                                    @csrf @method('DELETE')
                                    <button class="btn btn-danger btn-sm">
                                        Hapus
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="text-center py-5 text-muted">
                            Belum ada job. Klik <a href="{{ route('poster.jobs.create') }}">Posting Job</a> untuk menambahkan.
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        @if(method_exists($jobs, 'links'))
        <div class="card-footer">
            {{ $jobs->links() }}
        </div>
        @endif
    </div>
</div>
@endsection