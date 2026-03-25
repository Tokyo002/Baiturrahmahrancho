@extends('layouts.app')

@section('title', 'Donasi Masjid - Masjid BAITURRAHMAH')

@section('hero-title', 'Infaq dan Donasi')

@section('hide-subtitle', true)

@section('breadcrumb')
    <ol class="breadcrumb mb-0">
        <li class="breadcrumb-item"><a href="index">Beranda</a></li>
        <li class="breadcrumb-item"><a href="#">Pages</a></li>
        <li class="breadcrumb-item text-dark" aria-current="page">Donasi</li>
    </ol>
@endsection

@section('content')

    <!-- Donasi Online Start -->
    <div class="container-fluid py-5">
        <div class="container">
            <div class="text-center mx-auto mb-5" style="max-width: 800px;">
                <p class="fs-4 text-uppercase text-primary">Donasi</p>
                <h1 class="display-5 mb-4">Donasi Online via QRIS</h1>
                <p class="text-muted">Scan kode QRIS di bawah ini untuk berdonasi secara online. Dana Anda akan digunakan untuk pembangunan dan kegiatan masjid.</p>
            </div>

            <div class="row g-4 justify-content-center">
                {{-- QRIS Barcode --}}
                <div class="col-lg-6 col-md-8">
                    <div class="card border-0 shadow rounded-3 text-center p-4">
                        <div class="card-body">
                            <h5 class="card-title text-primary mb-3">QRIS Donasi</h5>
                            <img src="{{ asset('img/QRIS.jpg') }}" alt="QRIS Donasi" class="img-fluid rounded mb-3" style="max-width: 320px;">
                            <p class="text-muted mb-0">Scan untuk berdonasi</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Donasi Online End -->

    <!-- Penanggung Jawab Donasi Start -->
    <div class="container-fluid py-5 bg-light">
        <div class="container">
            <div class="text-center mx-auto mb-5" style="max-width: 800px;">
                <p class="fs-4 text-uppercase text-primary">Penanggung Jawab</p>
                <h1 class="display-5 mb-4">Informasi Penanggung Jawab Donasi</h1>
            </div>

            <div class="row g-4 justify-content-center">
                {{-- Penanggung Jawab 1 --}}
                <div class="col-lg-4 col-md-6">
                    <div class="card border-0 shadow rounded-3 text-center p-4 h-100">
                        <div class="card-body d-flex flex-column align-items-center">
                            <div class="bg-primary rounded-circle d-flex align-items-center justify-content-center mb-3" style="width: 80px; height: 80px;">
                                <i class="fas fa-user text-white fa-2x"></i>
                            </div>
                            <h5 class="card-title mb-2">Iswandi</h5>
                            <p class="text-muted mb-1">Penanggung Jawab Donasi</p>
                            <p class="text-muted"><i class="fas fa-phone-alt me-2"></i>0856-9125-1569</p>
                        </div>
                    </div>
                </div>

                {{-- Penanggung Jawab 2 --}}
                <div class="col-lg-4 col-md-6">
                    <div class="card border-0 shadow rounded-3 text-center p-4 h-100">
                        <div class="card-body d-flex flex-column align-items-center">
                            <div class="bg-primary rounded-circle d-flex align-items-center justify-content-center mb-3" style="width: 80px; height: 80px;">
                                <i class="fas fa-user text-white fa-2x"></i>
                            </div>
                            <h5 class="card-title mb-2">Dodi Iskandar</h5>
                            <p class="text-muted mb-1">Penanggung Jawab Donasi</p>
                            <p class="text-muted"><i class="fas fa-phone-alt me-2"></i>0812-1844-2880</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Penanggung Jawab Donasi End -->

    <!-- Donasi Offline Start -->
    <div class="container-fluid py-5">
        <div class="container">
            <div class="text-center mx-auto mb-5" style="max-width: 800px;">
                <p class="fs-4 text-uppercase text-primary">Donasi Offline</p>
                <h1 class="display-5 mb-4">Kunjungi Masjid Kami</h1>
                <p class="text-muted">Anda juga dapat berdonasi secara langsung dengan mengunjungi masjid kami. Silakan gunakan peta di bawah ini untuk menemukan lokasi kami.</p>
            </div>

            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <div class="card border-0 shadow rounded-3 overflow-hidden">
                        <div class="ratio ratio-16x9">
                            <iframe
                                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3965.8!2d106.8515632!3d-6.3092178!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69ed907b1b16ef%3A0x1b0a73295c9d21e1!2sMasjid%20Jami'%20Baiturrahmah!5e0!3m2!1sid!2sid!4v1700000000000!5m2!1sid!2sid"
                                style="border:0;"
                                allowfullscreen=""
                                loading="lazy"
                                referrerpolicy="no-referrer-when-downgrade">
                            </iframe>
                        </div>
                        <div class="card-body text-center py-4">
                            <h5 class="card-title text-primary"><i class="fas fa-map-marker-alt me-2"></i>Lokasi Masjid BAITURRAHMAH</h5>
                            <p class="text-muted mb-0">Tj. Bar., Kec. Jagakarsa, Kota Jakarta Selatan, Daerah Khusus Ibukota Jakarta</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Donasi Offline End -->

@endsection
