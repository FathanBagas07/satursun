<!doctype html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Edit Profil - Satursun</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

    <nav class="navbar navbar-expand-lg bg-white border-bottom sticky-top">
        <div class="container">
            <a class="navbar-brand fw-semibold" href="{{ route('landing') }}">
                <img src="{{ asset('images/logo.svg') }}" alt="Satursun Logo" height="28" class="me-2"> Satursun
            </a>
            <div class="ms-auto">
                <a href="{{ route('landing') }}" class="btn btn-outline-secondary btn-sm">Kembali</a>
            </div>
        </div>
    </nav>

    <main class="container my-4">
        @if (session('status'))
        <div class="alert alert-success">{{ session('status') }}</div>
        @endif

        <div class="row">
            <div class="col-lg-4">
                <div class="card mb-4">
                    <div class="card-body text-center">
                        @php
                        $photo = $profile->photo ?? null;
                        $photoUrl = $photo ? Storage::url($photo) : null;
                        $initial = strtoupper(mb_substr($user->name ?? 'U', 0, 1));
                        @endphp

                        @if($photoUrl)
                        <img src="{{ $photoUrl }}" class="rounded-circle img-thumbnail" style="width: 120px; height: 120px; object-fit: cover;" alt="avatar">
                        @else
                        <div class="rounded-circle bg-secondary bg-opacity-10 border d-flex align-items-center justify-content-center"
                            style="width:120px;height:120px;">
                            <span class="fs-1 text-secondary">{{ $initial }}</span>
                        </div>
                        @endif

                        <h5 class="mt-3 mb-1">{{ $user->name }}</h5>
                        <p class="text-muted mb-0">{{ $user->email }}</p>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header">Foto Profil</div>
                    <div class="card-body">
                        <div class="mb-3">
                            <label class="form-label">Unggah foto (jpg/png/webp, maks 2MB)</label>
                            <input type="file" name="photo" form="profileForm" class="form-control" accept=".jpg,.jpeg,.png,.webp">
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-8">
                <form id="profileForm" class="card" method="POST" action="{{ route('profile.update') }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="card-header d-flex align-items-center justify-content-between">
                        <span class="fw-semibold">Edit Profil</span>
                        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                    </div>

                    <div class="card-body">
                        {{-- Data Diri Standar --}}
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label class="form-label">Nama</label>
                                <input type="text" name="name" value="{{ old('name', $user->name) }}" class="form-control" required>
                                @error('name') <div class="text-danger small">{{ $message }}</div> @enderror
                            </div>

                            <div class="col-md-6">
                                <label class="form-label">Email (tidak dapat diubah)</label>
                                <input type="email" class="form-control" value="{{ $user->email }}" disabled>
                            </div>

                            <div class="col-md-6">
                                <label class="form-label">Telepon</label>
                                <input type="text" name="phone" value="{{ old('phone', $profile->phone ?? '') }}" class="form-control">
                                @error('phone') <div class="text-danger small">{{ $message }}</div> @enderror
                            </div>


                            <div class="col-md-6">
                                <label class="form-label">Pendidikan Terakhir <span class="text-danger">*</span></label>
                                <input type="text" name="last_education"
                                    value="{{ old('last_education', $profile->last_education ?? '') }}"
                                    class="form-control" required>
                                @error('education_level') <div class="text-danger small">{{ $message }}</div> @enderror
                            </div>

                        </div>

                        <hr class="my-4">

                        {{-- Hard & Soft Skills --}}
                        @php
                        $hard = old('hard_skills', isset($profile->hard_skills) ? implode(', ', (array)$profile->hard_skills) : '');
                        $soft = old('soft_skills', isset($profile->soft_skills) ? implode(', ', (array)$profile->soft_skills) : '');
                        @endphp

                        <div class="mb-3">
                            <label class="form-label">Hard Skills <span class="text-muted">(pisahkan dengan koma)</span></label>
                            <input type="text" name="hard_skills" value="{{ $hard }}" class="form-control" placeholder="Laravel, MySQL, REST API">
                            @error('hard_skills') <div class="text-danger small">{{ $message }}</div> @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Soft Skills <span class="text-muted">(pisahkan dengan koma)</span></label>
                            <input type="text" name="soft_skills" value="{{ $soft }}" class="form-control" placeholder="Komunikasi, Teamwork">
                            @error('soft_skills') <div class="text-danger small">{{ $message }}</div> @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Tentang Saya</label>
                            <textarea name="bio" rows="4" class="form-control" placeholder="Ringkasan singkat tentang Anda...">{{ old('bio', $profile->bio ?? '') }}</textarea>
                            @error('bio') <div class="text-danger small">{{ $message }}</div> @enderror
                        </div>
                    </div>
                </form>
            </div>
        </div>

        @if(auth()->user()->isFreelancer() && $applications->isNotEmpty())
        <div class="card mt-4">
            <div class="card-header">
                <span class="fw-semibold">Status Lamaran Pekerjaan Saya</span>
            </div>
            <div class="table-responsive">
                <table class="table table-hover mb-0">
                    <thead>
                        <tr>
                            <th>Pekerjaan</th>
                            <th>Tanggal Melamar</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($applications as $app)
                            <tr>
                                <td class="fw-semibold">{{ $app->jobListing->title }}</td>
                                <td>{{ $app->created_at->format('d M Y') }}</td>
                                <td>
                                    @php
                                        $badgeClass = [
                                            'in_review' => 'warning',
                                            'accepted' => 'success',
                                            'rejected' => 'secondary'
                                        ][$app->status] ?? 'secondary';
                                    @endphp
                                    <span class="badge bg-{{ $badgeClass }}">{{ str_replace('_', ' ', ucfirst($app->status)) }}</span>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        @endif
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>