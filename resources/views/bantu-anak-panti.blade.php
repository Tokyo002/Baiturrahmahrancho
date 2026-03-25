@extends('layouts.app')

@section('title', 'Bantu Anak Panti - Masjid BAITURRAHMAH')

@section('hero-title', 'Bantu Anak Panti')

@section('hide-subtitle', true)

@section('breadcrumb')
    <ol class="breadcrumb mb-0">
        <li class="breadcrumb-item"><a href="index">Beranda</a></li>
        <li class="breadcrumb-item"><a href="#">Pages</a></li>
        <li class="breadcrumb-item text-dark" aria-current="page">Bantu Anak Panti</li>
    </ol>
@endsection

@section('content')

    <!-- Bantu Anak Panti Start -->
    <div class="container-fluid py-5">
        <div class="container py-5">
            <div class="mx-auto text-center mb-5" style="max-width: 800px;">
                <p class="fs-4 text-uppercase text-primary">Sosial</p>
                <h1 class="display-5 mb-4">Bantu Anak Panti Asuhan</h1>
                <p class="text-muted">Masjid sebagai pelindung dan penggerak harapan bagi anak-anak panti. Mari bersama-sama memberikan kebahagiaan dan masa depan yang lebih baik.</p>
            </div>

            <div class="row g-4">
                <div class="col-lg-4 col-md-6">
                    <div class="card border-0 shadow rounded-3 h-100">
                        <div class="card-body text-center p-4">
                            <div class="bg-primary rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 80px; height: 80px;">
                                <i class="fa fa-graduation-cap text-white fa-2x"></i>
                            </div>
                            <h5 class="card-title">Bantuan Pendidikan</h5>
                            <p class="text-muted">Menyediakan beasiswa dan perlengkapan sekolah untuk anak-anak panti asuhan.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="card border-0 shadow rounded-3 h-100">
                        <div class="card-body text-center p-4">
                            <div class="bg-primary rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 80px; height: 80px;">
                                <i class="fa fa-utensils text-white fa-2x"></i>
                            </div>
                            <h5 class="card-title">Bantuan Pangan</h5>
                            <p class="text-muted">Memberikan bantuan makanan dan kebutuhan pokok secara rutin kepada panti asuhan.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="card border-0 shadow rounded-3 h-100">
                        <div class="card-body text-center p-4">
                            <div class="bg-primary rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 80px; height: 80px;">
                                <i class="fa fa-tshirt text-white fa-2x"></i>
                            </div>
                            <h5 class="card-title">Bantuan Sandang</h5>
                            <p class="text-muted">Menyalurkan pakaian layak pakai dan kebutuhan sandang bagi anak-anak panti.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="card border-0 shadow rounded-3 h-100">
                        <div class="card-body text-center p-4">
                            <div class="bg-primary rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 80px; height: 80px;">
                                <i class="fa fa-heart text-white fa-2x"></i>
                            </div>
                            <h5 class="card-title">Santunan Anak Yatim</h5>
                            <p class="text-muted">Program santunan rutin untuk anak yatim dan yatim piatu di sekitar masjid.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="card border-0 shadow rounded-3 h-100">
                        <div class="card-body text-center p-4">
                            <div class="bg-primary rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 80px; height: 80px;">
                                <i class="fa fa-hands-helping text-white fa-2x"></i>
                            </div>
                            <h5 class="card-title">Kunjungan Panti</h5>
                            <p class="text-muted">Program kunjungan rutin ke panti asuhan untuk memberikan dukungan moral dan kasih sayang.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="card border-0 shadow rounded-3 h-100">
                        <div class="card-body text-center p-4">
                            <div class="bg-primary rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 80px; height: 80px;">
                                <i class="fa fa-chalkboard-teacher text-white fa-2x"></i>
                            </div>
                            <h5 class="card-title">Bimbingan Belajar</h5>
                            <p class="text-muted">Menyediakan program bimbingan belajar gratis bagi anak-anak panti asuhan.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Bantu Anak Panti End -->

@endsection
