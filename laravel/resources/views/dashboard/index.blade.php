@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')

<section class="hero-section rounded-5 mb-5">

    <div class="container">

        <div class="row align-items-center gy-5">

            <div class="col-lg-7">

                <div class="hero-content">

                    <span class="hero-badge">

                        <i class="bi bi-stars"></i>

                        Artificial Intelligence

                    </span>

                    <h1 class="hero-title">

                        Halo, {{ Auth::user()->name }} 👋

                    </h1>

                    <p class="hero-description">

                        Selamat datang di <strong>Sadar Sampah AI</strong>.
                        Gunakan Artificial Intelligence untuk mengenali jenis sampah,
                        memperoleh edukasi pengelolaan yang benar,
                        serta meningkatkan kepedulian terhadap lingkungan.

                    </p>

                    <div class="hero-buttons">

                        <a href="{{ route('prediction.index') }}"
                            class="btn btn-light btn-lg">

                            <i class="bi bi-camera-fill me-2"></i>

                            Mulai Deteksi

                        </a>

                        <a href="{{ route('history.index') }}"
                            class="btn btn-outline-light btn-lg">

                            <i class="bi bi-clock-history me-2"></i>

                            Lihat Riwayat

                        </a>

                    </div>

                </div>

            </div>

            <div class="col-lg-5 text-center">

                <img
                    src="https://cdn-icons-png.flaticon.com/512/2906/2906274.png"
                    class="img-fluid"
                    style="max-width:350px;">

            </div>

        </div>

    </div>

</section>

<div class="container">

    <div class="row g-4 mb-5">

        <div class="col-md-6 col-xl-3">

            <div class="stats-card">

                <div class="stats-icon primary">

                    <i class="bi bi-camera-fill"></i>

                </div>

                <div>

                    <div class="stats-value">

                        {{ $totalDetections }}

                    </div>

                    <div class="stats-title">

                        Total Deteksi

                    </div>

                </div>

            </div>

        </div>

        <div class="col-md-6 col-xl-3">

            <div class="stats-card">

                <div class="stats-icon warning">

                    <i class="bi bi-recycle"></i>

                </div>

                <div>

                    <div class="stats-value">

                        {{ $totalCategories }}

                    </div>

                    <div class="stats-title">

                        Kategori Sampah

                    </div>

                </div>

            </div>

        </div>

        <div class="col-md-6 col-xl-3">

            <div class="stats-card">

                <div class="stats-icon info">

                    <i class="bi bi-speedometer2"></i>

                </div>

                <div>

                    <div class="stats-value">

                        {{ $averageConfidence }}%

                    </div>

                    <div class="stats-title">

                        Rata-rata Confidence

                    </div>

                </div>

            </div>

        </div>

        <div class="col-md-6 col-xl-3">

            <div class="stats-card">

                <div class="stats-icon danger">

                    <i class="bi bi-calendar-week-fill"></i>

                </div>

                <div>

                    <div class="stats-value">

                        {{ $weeklyDetections }}

                    </div>

                    <div class="stats-title">

                        Deteksi Minggu Ini

                    </div>

                </div>

            </div>

        </div>

    </div>

    <div class="row g-4 mb-5">

        <div class="col-lg-8">

            <div class="content-card h-100">

                <h4 class="content-title">

                    Aktivitas Deteksi Anda

                </h4>

                <p class="mb-4">

                    Dashboard ini menampilkan ringkasan aktivitas deteksi sampah yang telah
                    Anda lakukan menggunakan Artificial Intelligence.

                </p>

                <div class="row g-3">

                    <div class="col-md-6">

                        <div class="border rounded-4 p-4 h-100">

                            <small class="text-muted">

                                Kategori yang Paling Sering Terdeteksi

                            </small>

                            <h3 class="fw-bold mt-2 text-success">

                                {{ $favoriteCategory?->name ?? '-' }}

                            </h3>

                        </div>

                    </div>

                    <div class="col-md-6">

                        <div class="border rounded-4 p-4 h-100">

                            <small class="text-muted">

                                Total Minggu Ini

                            </small>

                            <h3 class="fw-bold mt-2 text-primary">

                                {{ $weeklyDetections }}

                            </h3>

                        </div>

                    </div>

                </div>

            </div>

        </div>

        <div class="col-lg-4">

            <div class="content-card h-100">

                <h4 class="content-title">

                    Shortcut

                </h4>

                <div class="d-grid gap-3">

                    <a href="{{ route('prediction.index') }}"
                        class="btn btn-success">

                        <i class="bi bi-camera-fill me-2"></i>

                        Deteksi Sampah

                    </a>

                    <a href="{{ route('knowledge.index') }}"
                        class="btn btn-outline-success">

                        <i class="bi bi-book-fill me-2"></i>

                        Knowledge Base

                    </a>

                    <a href="{{ route('history.index') }}"
                        class="btn btn-outline-secondary">

                        <i class="bi bi-clock-history me-2"></i>

                        Riwayat Deteksi

                    </a>

                </div>

            </div>

        </div>

    </div>
        <div class="row g-4">

        <div class="col-lg-4">

            <div class="feature-card">

                <div class="feature-icon">

                    <i class="bi bi-camera2"></i>

                </div>

                <h4 class="feature-title">

                    Deteksi AI

                </h4>

                <p class="feature-description">

                    Upload foto sampah dan biarkan Artificial Intelligence
                    mengenali kategorinya secara otomatis beserta tingkat
                    keyakinan hasil prediksi.

                </p>

                <a href="{{ route('prediction.index') }}"
                    class="btn btn-success w-100">

                    Mulai Deteksi

                </a>

            </div>

        </div>

        <div class="col-lg-4">

            <div class="feature-card">

                <div class="feature-icon">

                    <i class="bi bi-book-half"></i>

                </div>

                <h4 class="feature-title">

                    Knowledge Base

                </h4>

                <p class="feature-description">

                    Pelajari setiap kategori sampah,
                    cara pengelolaan,
                    warna tempat sampah,
                    dan informasi daur ulang.

                </p>

                <a href="{{ route('knowledge.index') }}"
                    class="btn btn-outline-success w-100">

                    Buka Knowledge

                </a>

            </div>

        </div>

        <div class="col-lg-4">

            <div class="feature-card">

                <div class="feature-icon">

                    <i class="bi bi-clock-history"></i>

                </div>

                <h4 class="feature-title">

                    Riwayat

                </h4>

                <p class="feature-description">

                    Semua hasil deteksi akan tersimpan
                    sehingga dapat dipelajari kembali
                    kapan pun dibutuhkan.

                </p>

                <a href="{{ route('history.index') }}"
                    class="btn btn-outline-success w-100">

                    Lihat Riwayat

                </a>

            </div>

        </div>

    </div>

    <div class="row mt-5 g-4">

        <div class="col-lg-8">

            <div class="content-card h-100">

                <h4 class="content-title">

                    Ringkasan Penggunaan

                </h4>

                <p>

                    <strong>Sadar Sampah AI</strong> memanfaatkan model
                    Artificial Intelligence berbasis TensorFlow Lite
                    untuk membantu mengenali kategori sampah secara cepat
                    sekaligus memberikan edukasi mengenai pengelolaan
                    sampah yang benar.

                </p>

                <div class="row text-center mt-4">

                    <div class="col-md-4 mb-3">

                        <div class="border rounded-4 p-4 h-100">

                            <h2 class="fw-bold text-success">

                                {{ $totalDetections }}

                            </h2>

                            <small class="text-muted">

                                Total Deteksi

                            </small>

                        </div>

                    </div>

                    <div class="col-md-4 mb-3">

                        <div class="border rounded-4 p-4 h-100">

                            <h2 class="fw-bold text-primary">

                                {{ $averageConfidence }}%

                            </h2>

                            <small class="text-muted">

                                Confidence

                            </small>

                        </div>

                    </div>

                    <div class="col-md-4 mb-3">

                        <div class="border rounded-4 p-4 h-100">

                            <h2 class="fw-bold text-warning">

                                {{ $favoriteCategory?->name ?? '-' }}

                            </h2>

                            <small class="text-muted">

                                Favorit

                            </small>

                        </div>

                    </div>

                </div>

            </div>

        </div>

        <div class="col-lg-4">

            <div class="content-card h-100">

                <h4 class="content-title">

                    Tips Hari Ini 💡

                </h4>

                <div class="custom-badge success mb-3">

                    Kurangi Plastik Sekali Pakai

                </div>

                <p>

                    Membawa botol minum sendiri,
                    menggunakan tas belanja kain,
                    dan mengurangi sedotan plastik
                    merupakan langkah sederhana
                    yang berdampak besar bagi lingkungan.

                </p>

                <hr>

                <div class="custom-badge">

                    Pilah Sampah Sebelum Dibuang

                </div>

                <p class="mt-3 mb-0">

                    Pisahkan sampah organik,
                    anorganik,
                    dan B3 agar proses
                    pengolahan maupun daur ulang
                    menjadi lebih efektif.

                </p>

            </div>

        </div>

    </div>

</div>

@endsection