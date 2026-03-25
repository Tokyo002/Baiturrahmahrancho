@props(['blogPosts' => collect()])

@php
    $posts = collect($blogPosts ?? []);

    // Fallback to direct query if component prop is empty/stale.
    if ($posts->isEmpty()) {
        $posts = \App\Models\BlogPost::latest()->get();
    }
@endphp

<div class="container-fluid py-5">
    <div class="container py-5">
        <h1 class="display-3 mb-5 wow fadeIn" data-wow-delay="0.1s">Pengumuman Acara Mendatang</h1>

        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @if (auth()->check() && auth()->user()->is_admin)
            <div class="card p-4 mb-5">
                <div class="d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Panel Admin Pengumuman</h5>
                    <button class="btn btn-primary btn-sm" type="button" data-bs-toggle="collapse" data-bs-target="#createAnnouncementForm" aria-expanded="{{ $errors->any() ? 'true' : 'false' }}" aria-controls="createAnnouncementForm">
                        Tambah Pengumuman
                    </button>
                </div>
                <div class="collapse mt-3 {{ $errors->any() ? 'show' : '' }}" id="createAnnouncementForm">
                <form method="POST" action="{{ route('blog.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="row g-3">
                        <div class="col-md-4">
                            <label class="form-label">Judul Pengumuman</label>
                            <input type="text" class="form-control" name="title" value="{{ old('title') }}" required>
                        </div>
                        <div class="col-md-3">
                            <label class="form-label">Tanggal Acara Mendatang</label>
                            <input type="date" class="form-control" name="event_date" value="{{ old('event_date') }}">
                        </div>
                        <div class="col-md-5">
                            <label class="form-label">Gambar</label>
                            <input type="file" class="form-control" name="image" accept="image/*" required>
                        </div>
                        <div class="col-12">
                            <label class="form-label">Deskripsi</label>
                            <textarea class="form-control" name="description" rows="3">{{ old('description') }}</textarea>
                        </div>
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary">Tambah Pengumuman</button>
                        </div>
                    </div>
                </form>
                </div>
            </div>
        @endif

        <div class="row g-4 justify-content-center">
            @forelse ($posts as $post)
                <div class="col-lg-6 col-xl-4">
                    <div class="blog-item wow fadeIn" data-wow-delay="0.1s">
                        <div class="blog-img position-relative overflow-hidden">
                            <img src="{{ asset('storage/app/public/' . ltrim($post->image_path, '/')) }}" class="img-fluid w-100" alt="{{ $post->title }}">
                            @if ($post->event_date)
                                <div class="bg-primary d-inline px-3 py-2 text-center text-white position-absolute top-0">{{ \Carbon\Carbon::parse($post->event_date)->translatedFormat('d M Y') }}</div>
                            @endif
                        </div>
                        <div class="p-4">
                            <a href="#" class="d-inline-block h4 lh-sm mb-3">{{ $post->title }}</a>
                            <p class="text-muted mb-2">
                                Tanggal: {{ $post->event_date ? \Carbon\Carbon::parse($post->event_date)->translatedFormat('d F Y') : '-' }}
                            </p>
                            <p class="mb-4">{{ $post->description ?: 'Kegiatan masjid yang ditambahkan admin.' }}</p>

                            @if (auth()->check() && auth()->user()->is_admin)
                                <hr>
                                <button class="btn btn-sm btn-outline-secondary mb-2" type="button" data-bs-toggle="collapse" data-bs-target="#manageAnnouncement{{ $post->id }}" aria-expanded="false" aria-controls="manageAnnouncement{{ $post->id }}">
                                    Kelola
                                </button>
                                <div class="collapse" id="manageAnnouncement{{ $post->id }}">
                                <form method="POST" action="{{ route('blog.update', $post) }}" enctype="multipart/form-data" class="mb-2">
                                    @csrf
                                    @method('PUT')
                                    <input type="text" class="form-control form-control-sm mb-2" name="title" value="{{ $post->title }}" required>
                                    <input type="date" class="form-control form-control-sm mb-2" name="event_date" value="{{ $post->event_date ? \Carbon\Carbon::parse($post->event_date)->format('Y-m-d') : '' }}">
                                    <textarea class="form-control form-control-sm mb-2" name="description" rows="2">{{ $post->description }}</textarea>
                                    <input type="file" class="form-control form-control-sm mb-2" name="image" accept="image/*">
                                    <button type="submit" class="btn btn-sm btn-outline-primary">Update</button>
                                </form>
                                <form method="POST" action="{{ route('blog.destroy', $post) }}" onsubmit="return confirm('Hapus kegiatan ini?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-outline-danger">Hapus</button>
                                </form>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12 text-center">
                    <p class="text-muted">Belum ada kegiatan yang ditambahkan admin.</p>
                </div>
            @endforelse
        </div>
    </div>
</div>
