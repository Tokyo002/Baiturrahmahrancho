        <!-- Topbar start -->
        <div class="container-fluid fixed-top">
            <div class="container topbar d-none d-lg-block">
                <div class="topbar-inner">
                    <div class="row gx-0">
                        <div class="col-lg-7 text-start">
                            <div class="h-100 d-inline-flex align-items-center me-4">
                                <span class="fa fa-phone-alt me-2 text-dark"></span>
                                <a href="https://wa.me/6285691251569" class="text-secondary"><span>+62 856-9125-1569</span></a>
                            </div>
                            <div class="h-100 d-inline-flex align-items-center">
                                <span class="far fa-envelope me-2 text-dark"></span>
                                <a href="mailto:baiturrahmahrancho@gmail.com" class="text-secondary"><span>baiturrahmahrancho@gmail.com</span></a>
                            </div>
                        </div>
                        <div class="col-lg-5 text-end">
                            <div class="h-100 d-inline-flex align-items-center">
                                <span class="text-body">Media:</span>
                                <a class="text-dark px-2" href="https://www.facebook.com/"><i class="fab fa-facebook-f"></i></a>
                                <a class="text-dark px-2" href="https://www.youtube.com/"><i class="fab fa-youtube"></i></a>
                                <a class="text-dark px-2" href="https://www.tiktok.com/"><i class="fab fa-tiktok"></i></a>
                                <a class="text-dark px-2" href="https://www.instagram.com/"><i class="fab fa-instagram"></i></a>
                                @auth
                                    <form method="POST" action="{{ route('admin.logout') }}" class="d-inline">
                                        @csrf
                                        <button type="submit" class="btn btn-link text-body ps-4 p-0 border-0">
                                            <i class="fa fa-user-shield text-dark me-1"></i> Logout Admin
                                        </button>
                                    </form>
                                @else
                                    <a class="text-body ps-4" href="{{ route('login') }}"><i class="fa fa-lock text-dark me-1"></i> Login Admin</a>
                                @endauth
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container">
                <nav class="navbar navbar-light navbar-expand-lg py-3">
                    <a href="index" class="navbar-brand">
                        <h1 class="mb-0">BAITUR<span class="text-primary">RAHMAH</span> </h1>
                    </a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                        <span class="fa fa-bars text-primary"></span>
                    </button>
                    <div class="collapse navbar-collapse bg-white" id="navbarCollapse">
                        <div class="navbar-nav ms-lg-auto mx-xl-auto">
                            <a href="index" class="nav-item nav-link">Beranda</a>
                            <a href="about" class="nav-item nav-link">Tentang</a>
                            <a href="activity" class="nav-item nav-link">Kegiatan</a>
                            <a href="event" class="nav-item nav-link">Acara</a>
                            <a href="sermon" class="nav-item nav-link">Kajian</a>
                            <div class="nav-item dropdown">
                                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Lainya</a>
                                <div class="dropdown-menu m-0 rounded-0">
                                    <a href="blog" class="dropdown-item">Pengumuman</a>
                                    <a href="gallery" class="dropdown-item">Galeri</a>
                                    <a href="team" class="dropdown-item">Pengurus</a>
                                    <a href="testimonial" class="dropdown-item">Para Ahli</a>
                                    <a href="404" class="dropdown-item">404 Page</a>
                                </div>
                            </div>
                            <a href="contact" class="nav-item nav-link">Kontak</a>
                        </div>
                        <a href="donation" class="btn btn-primary py-2 px-4 d-none d-xl-inline-block">Donasi</a>
                    </div>
                </nav>
            </div>
        </div>
        <!-- Topbar End -->