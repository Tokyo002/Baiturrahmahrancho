@extends('layouts.app')

@section('title', 'Kajian Quran - Masjid BAITURRAHMAH')

@section('hero-title', 'Kajian Quran')

@section('hide-subtitle', true)

@section('breadcrumb')
    <ol class="breadcrumb mb-0">
        <li class="breadcrumb-item"><a href="index">Beranda</a></li>
        <li class="breadcrumb-item"><a href="#">Pages</a></li>
        <li class="breadcrumb-item text-dark" aria-current="page">Kajian Quran</li>
    </ol>
@endsection

@section('content')

    <!-- Kajian Quran Start -->
    <div class="container-fluid py-5">
        <div class="container py-5">
            <div class="mx-auto text-center mb-5" style="max-width: 800px;">
                <p class="fs-4 text-uppercase text-primary">Kajian</p>
                <h1 class="display-5 mb-4">Kajian Al-Qur'an</h1>
                <p class="text-muted">Menghidupkan masjid lewat kajian Quran yang relevan dan reflektif. Menjadikan Al-Qur'an sebagai sumber inspirasi hidup umat.</p>
            </div>

            <div class="row g-4">
                <div class="col-lg-4 col-md-6">
                    <div class="card border-0 shadow rounded-3 h-100">
                        <div class="card-body text-center p-4">
                            <div class="bg-primary rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 80px; height: 80px;">
                                <i class="fa fa-quran text-white fa-2x"></i>
                            </div>
                            <h5 class="card-title">Tadarus & Tilawah</h5>
                            <p class="text-muted">Program membaca dan mempelajari Al-Qur'an secara rutin bersama jamaah masjid.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="card border-0 shadow rounded-3 h-100">
                        <div class="card-body text-center p-4">
                            <div class="bg-primary rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 80px; height: 80px;">
                                <i class="fa fa-book-reader text-white fa-2x"></i>
                            </div>
                            <h5 class="card-title">Tafsir Al-Qur'an</h5>
                            <p class="text-muted">Kajian mendalam tentang makna dan hikmah yang terkandung dalam ayat-ayat Al-Qur'an.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="card border-0 shadow rounded-3 h-100">
                        <div class="card-body text-center p-4">
                            <div class="bg-primary rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 80px; height: 80px;">
                                <i class="fa fa-child text-white fa-2x"></i>
                            </div>
                            <h5 class="card-title">Kajian Anak & Remaja</h5>
                            <p class="text-muted">Membangun kecintaan terhadap Quran sejak usia dini melalui kajian interaktif dan menyenangkan.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="card border-0 shadow rounded-3 h-100">
                        <div class="card-body text-center p-4">
                            <div class="bg-primary rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 80px; height: 80px;">
                                <i class="fa fa-laptop text-white fa-2x"></i>
                            </div>
                            <h5 class="card-title">Kajian Digital</h5>
                            <p class="text-muted">Transformasi kajian Quran dari mimbar ke ruang digital agar lebih mudah diakses oleh semua kalangan.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="card border-0 shadow rounded-3 h-100">
                        <div class="card-body text-center p-4">
                            <div class="bg-primary rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 80px; height: 80px;">
                                <i class="fa fa-graduation-cap text-white fa-2x"></i>
                            </div>
                            <h5 class="card-title">Tahfidz Quran</h5>
                            <p class="text-muted">Program menghafal Al-Qur'an dengan bimbingan ustadz berpengalaman.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="card border-0 shadow rounded-3 h-100">
                        <div class="card-body text-center p-4">
                            <div class="bg-primary rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 80px; height: 80px;">
                                <i class="fa fa-book-open text-white fa-2x"></i>
                            </div>
                            <h5 class="card-title">Literasi Quran</h5>
                            <p class="text-muted">Mewujudkan masjid sebagai pusat literasi Quran dan spiritualitas bagi seluruh umat.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Kajian Quran End -->

@endsection
