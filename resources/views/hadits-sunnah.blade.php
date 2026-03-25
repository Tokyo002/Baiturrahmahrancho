@extends('layouts.app')

@section('title', 'Hadits & Sunnah - Masjid BAITURRAHMAH')

@section('hero-title', 'Hadits & Sunnah')

@section('hide-subtitle', true)

@section('breadcrumb')
    <ol class="breadcrumb mb-0">
        <li class="breadcrumb-item"><a href="index">Beranda</a></li>
        <li class="breadcrumb-item"><a href="#">Pages</a></li>
        <li class="breadcrumb-item text-dark" aria-current="page">Hadits & Sunnah</li>
    </ol>
@endsection

@section('content')

    <!-- Hadits & Sunnah Start -->
    <div class="container-fluid py-5">
        <div class="container py-5">
            <div class="mx-auto text-center mb-5" style="max-width: 800px;">
                <p class="fs-4 text-uppercase text-primary">Hadits & Sunnah</p>
                <h1 class="display-5 mb-4">Kajian Hadits & Sunnah Nabi</h1>
                <p class="text-muted">Menghidupkan spirit masjid lewat pemahaman hadits dan praktik sunnah. Meneladani Nabi melalui kajian yang reflektif dan kontekstual.</p>
            </div>

            <div class="row g-4">
                <div class="col-lg-4 col-md-6">
                    <div class="card border-0 shadow rounded-3 h-100">
                        <div class="card-body text-center p-4">
                            <div class="bg-primary rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 80px; height: 80px;">
                                <i class="fa fa-book text-white fa-2x"></i>
                            </div>
                            <h5 class="card-title">Kajian Kitab Hadits</h5>
                            <p class="text-muted">Mempelajari kitab-kitab hadits shahih bersama ustadz yang kompeten dan berpengalaman.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="card border-0 shadow rounded-3 h-100">
                        <div class="card-body text-center p-4">
                            <div class="bg-primary rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 80px; height: 80px;">
                                <i class="fa fa-star text-white fa-2x"></i>
                            </div>
                            <h5 class="card-title">Sunnah Harian</h5>
                            <p class="text-muted">Mengamalkan sunnah-sunnah Rasulullah dalam kehidupan sehari-hari di lingkungan masjid.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="card border-0 shadow rounded-3 h-100">
                        <div class="card-body text-center p-4">
                            <div class="bg-primary rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 80px; height: 80px;">
                                <i class="fa fa-user-tie text-white fa-2x"></i>
                            </div>
                            <h5 class="card-title">Sirah Nabawiyah</h5>
                            <p class="text-muted">Meneladani perjalanan hidup Nabi Muhammad SAW sebagai inspirasi dan pedoman hidup.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="card border-0 shadow rounded-3 h-100">
                        <div class="card-body text-center p-4">
                            <div class="bg-primary rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 80px; height: 80px;">
                                <i class="fa fa-comments text-white fa-2x"></i>
                            </div>
                            <h5 class="card-title">Diskusi Hadits</h5>
                            <p class="text-muted">Forum diskusi interaktif membahas hadits-hadits yang relevan dengan kehidupan modern.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="card border-0 shadow rounded-3 h-100">
                        <div class="card-body text-center p-4">
                            <div class="bg-primary rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 80px; height: 80px;">
                                <i class="fa fa-heart text-white fa-2x"></i>
                            </div>
                            <h5 class="card-title">Akhlak Rasulullah</h5>
                            <p class="text-muted">Membangun karakter umat dengan mengamalkan akhlak mulia Rasulullah SAW.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="card border-0 shadow rounded-3 h-100">
                        <div class="card-body text-center p-4">
                            <div class="bg-primary rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 80px; height: 80px;">
                                <i class="fa fa-shield-alt text-white fa-2x"></i>
                            </div>
                            <h5 class="card-title">Penjaga Warisan Nabi</h5>
                            <p class="text-muted">Menguatkan peran masjid sebagai penjaga dan penyebar warisan ilmu dari Nabi Muhammad SAW.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Hadits & Sunnah End -->

@endsection
