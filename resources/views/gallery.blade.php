<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <title>THEMosque - Mosque Website Template</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <meta content="" name="keywords" />
    <meta content="" name="description" />

    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;500;600;700&family=Pacifico&display=swap" rel="stylesheet" />

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet" />

    <link href="lib/animate/animate.min.css" rel="stylesheet" />
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet" />

    <link href="css/bootstrap.min.css" rel="stylesheet" />
    <link href="css/style.css" rel="stylesheet" />
  </head>

  <body>
    <div id="spinner" class="show w-100 vh-100 bg-white position-fixed translate-middle top-50 start-50 d-flex align-items-center justify-content-center">
      <div class="spinner-grow text-primary" role="status"></div>
    </div>

    <x-navbar></x-navbar>
    <x-header><x-slot:title>{{ $title }}</x-slot:title></x-header>

    <div class="container-fluid py-5">
      <div class="container py-5">
        <h1 class="display-3 mb-5 wow fadeIn" data-wow-delay="0.1s">Galeri Kegiatan</h1>

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
          <div class="card p-4 mb-4">
            <div class="d-flex justify-content-between align-items-center">
              <h5 class="mb-0">Panel Admin Galeri</h5>
              <button class="btn btn-primary btn-sm" type="button" data-bs-toggle="collapse" data-bs-target="#createGalleryForm" aria-expanded="{{ $errors->any() ? 'true' : 'false' }}" aria-controls="createGalleryForm">
                Tambah Gambar
              </button>
            </div>
            <div class="collapse mt-3 {{ $errors->any() ? 'show' : '' }}" id="createGalleryForm">
            <form method="POST" action="{{ route('gallery.store') }}" enctype="multipart/form-data">
              @csrf
              <div class="row g-3">
                <div class="col-md-4">
                  <label class="form-label">Judul Gambar</label>
                  <input type="text" class="form-control" name="title" value="{{ old('title') }}">
                </div>
                <div class="col-md-5">
                  <label class="form-label">Upload Gambar</label>
                  <input type="file" class="form-control" name="image" accept="image/*" required>
                </div>
                <div class="col-md-3 d-flex align-items-end">
                  <button type="submit" class="btn btn-primary w-100">Tambah Galeri</button>
                </div>
              </div>
            </form>
            </div>
          </div>
        @endif

        <div class="row g-4">
          @forelse ($galleryItems as $item)
            <div class="col-md-6 col-lg-4">
              <div class="card border-0 shadow-sm h-100">
                <img src="{{ asset('storage/app/public/' . ltrim($item->image_path, '/')) }}" alt="{{ $item->title ?: 'Galeri kegiatan' }}" class="card-img-top" style="height: 240px; object-fit: cover;">
                <div class="card-body">
                  <h5 class="card-title">{{ $item->title ?: 'Kegiatan Masjid' }}</h5>

                  @if (auth()->check() && auth()->user()->is_admin)
                    <button class="btn btn-sm btn-outline-secondary mb-2" type="button" data-bs-toggle="collapse" data-bs-target="#manageGallery{{ $item->id }}" aria-expanded="false" aria-controls="manageGallery{{ $item->id }}">
                      Kelola
                    </button>
                    <div class="collapse" id="manageGallery{{ $item->id }}">
                    <form method="POST" action="{{ route('gallery.update', $item) }}" enctype="multipart/form-data" class="mb-2">
                      @csrf
                      @method('PUT')
                      <input type="text" class="form-control form-control-sm mb-2" name="title" value="{{ $item->title }}">
                      <input type="file" class="form-control form-control-sm mb-2" name="image" accept="image/*">
                      <button type="submit" class="btn btn-sm btn-outline-primary">Update</button>
                    </form>
                    <form method="POST" action="{{ route('gallery.destroy', $item) }}" onsubmit="return confirm('Hapus gambar ini?');">
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
            <div class="col-12">
              <div class="alert alert-info mb-0">Belum ada gambar kegiatan.</div>
            </div>
          @endforelse
        </div>
      </div>
    </div>

    <x-footer></x-footer>
    <a href="#" class="btn btn-primary border-3 border-light back-to-top"><i class="fa fa-arrow-up"></i></a>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/wow/wow.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="js/main.js"></script>
  </body>
</html>
