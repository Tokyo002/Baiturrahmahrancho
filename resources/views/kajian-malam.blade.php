@extends('layouts.app')

@section('title', 'Kajian Malam - Masjid BAITURRAHMAH')

@section('hero-title', 'Kajian Malam')

@section('hide-subtitle', true)

@section('breadcrumb')
    <ol class="breadcrumb mb-0">
        <li class="breadcrumb-item"><a href="index">Beranda</a></li>
        <li class="breadcrumb-item"><a href="#">Pages</a></li>
        <li class="breadcrumb-item text-dark" aria-current="page">Kajian Malam</li>
    </ol>
@endsection

@section('content')

    <!-- Kajian Malam Start -->
    <div class="container-fluid py-5">
        <div class="container py-5">
            <div class="mx-auto text-center mb-5" style="max-width: 800px;">
                <p class="fs-4 text-uppercase text-primary">Kajian Malam</p>
                <h1 class="display-5 mb-4">Kajian Malam Masjid BAITURRAHMAH</h1>
                <p class="text-muted">Merajut kedekatan spiritual lewat kajian malam yang penuh makna. Menghidupkan malam dengan ilmu yang menyentuh hati jamaah.</p>
            </div>

            <div class="row g-4">
                <div class="col-lg-4 col-md-6">
                    <div class="card border-0 shadow rounded-3 h-100">
                        <div class="card-body text-center p-4">
                            <div class="bg-primary rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 80px; height: 80px;">
                                <i class="fa fa-moon text-white fa-2x"></i>
                            </div>
                            <h5 class="card-title">Kajian Ba'da Isya</h5>
                            <p class="text-muted">Kajian rutin setelah shalat Isya membahas berbagai tema keislaman yang relevan.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="card border-0 shadow rounded-3 h-100">
                        <div class="card-body text-center p-4">
                            <div class="bg-primary rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 80px; height: 80px;">
                                <i class="fa fa-pray text-white fa-2x"></i>
                            </div>
                            <h5 class="card-title">Tahajud Berjamaah</h5>
                            <p class="text-muted">Program shalat tahajud berjamaah untuk mendekatkan diri kepada Allah SWT.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="card border-0 shadow rounded-3 h-100">
                        <div class="card-body text-center p-4">
                            <div class="bg-primary rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 80px; height: 80px;">
                                <i class="fa fa-microphone text-white fa-2x"></i>
                            </div>
                            <h5 class="card-title">Ceramah Malam</h5>
                            <p class="text-muted">Ceramah inspiratif dari ustadz tamu yang menyentuh hati dan memberikan pencerahan.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="card border-0 shadow rounded-3 h-100">
                        <div class="card-body text-center p-4">
                            <div class="bg-primary rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 80px; height: 80px;">
                                <i class="fa fa-hands text-white fa-2x"></i>
                            </div>
                            <h5 class="card-title">Dzikir & Doa Bersama</h5>
                            <p class="text-muted">Ruang renungan dan ketenangan di tengah hiruk pikuk dunia melalui dzikir bersama.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="card border-0 shadow rounded-3 h-100">
                        <div class="card-body text-center p-4">
                            <div class="bg-primary rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 80px; height: 80px;">
                                <i class="fa fa-book-open text-white fa-2x"></i>
                            </div>
                            <h5 class="card-title">Tadarus Malam</h5>
                            <p class="text-muted">Program tadarus bersama di malam hari untuk memperkuat hubungan dengan Al-Qur'an.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="card border-0 shadow rounded-3 h-100">
                        <div class="card-body text-center p-4">
                            <div class="bg-primary rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 80px; height: 80px;">
                                <i class="fa fa-coffee text-white fa-2x"></i>
                            </div>
                            <h5 class="card-title">Ngopi & Ngaji</h5>
                            <p class="text-muted">Kajian santai malam hari sebagai oase ruhani umat di tengah kesibukan hari.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Kajian Malam End -->

@endsection
