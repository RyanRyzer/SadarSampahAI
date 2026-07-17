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

                        <a href="/predict"
                            class="btn btn-light btn-lg">

                            <i class="bi bi-camera-fill me-2"></i>

                            Mulai Deteksi

                        </a>

                        <a href="/history"
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

                        --

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

                        17

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

                    <i class="bi bi-lightbulb-fill"></i>

                </div>

                <div>

                    <div class="stats-value">

                        AI

                    </div>

                    <div class="stats-title">

                        TensorFlow Lite

                    </div>

                </div>

            </div>

        </div>

        <div class="col-md-6 col-xl-3">

            <div class="stats-card">

                <div class="stats-icon danger">

                    <i class="bi bi-globe-asia-australia"></i>

                </div>

                <div>

                    <div class="stats-value">

                        24/7

                    </div>

                    <div class="stats-title">

                        Sistem Aktif

                    </div>

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
                    mengenali kategorinya secara otomatis.

                </p>

                <a href="/predict"
                    class="btn btn-success w-100">

                    Mulai Sekarang

                </a>

            </div>

        </div>

        <div class="col-lg-4">

            <div class="feature-card">

                <div class="feature-icon">

                    <i class="bi bi-clock-history"></i>

                </div>

                <h4 class="feature-title">

                    Riwayat Deteksi

                </h4>

                <p class="feature-description">

                    Seluruh hasil prediksi AI akan tersimpan sehingga
                    dapat dipelajari kembali kapan saja.

                </p>

                <a href="/history"
                    class="btn btn-outline-success w-100">

                    Buka Riwayat

                </a>

            </div>

        </div>

        <div class="col-lg-4">

            <div class="feature-card">

                <div class="feature-icon">

                    <i class="bi bi-person-circle"></i>

                </div>

                <h4 class="feature-title">

                    Profil

                </h4>

                <p class="feature-description">

                    Kelola informasi akun,
                    lihat aktivitas,
                    dan pantau penggunaan sistem.

                </p>

                <a href="/profile"
                    class="btn btn-outline-success w-100">

                    Kelola Profil

                </a>

            </div>

        </div>

    </div>

    <div class="row mt-5 g-4">

        <div class="col-lg-7">

            <div class="content-card">

                <h4 class="content-title">

                    Tentang Sadar Sampah AI

                </h4>

                <p>

                    Sistem ini memanfaatkan model Artificial Intelligence berbasis
                    TensorFlow Lite untuk membantu pengguna mengenali jenis sampah
                    secara cepat, sekaligus memberikan rekomendasi pengelolaan,
                    edukasi, dan informasi mengenai dampak lingkungan.

                </p>

                <p class="mb-0">

                    Dengan teknologi ini diharapkan masyarakat semakin mudah
                    memilah sampah dan meningkatkan kepedulian terhadap lingkungan.

                </p>

            </div>

        </div>

        <div class="col-lg-5">

            <div class="content-card">

                <h4 class="content-title">

                    Tips Hari Ini 💡

                </h4>

                <div class="custom-badge success mb-3">

                    Pisahkan Sampah Organik & Anorganik

                </div>

                <p>

                    Pisahkan sampah sejak dari rumah agar proses daur ulang
                    menjadi lebih mudah dan pencemaran lingkungan dapat dikurangi.

                </p>

                <hr>

                <div class="custom-badge">

                    Kurangi Plastik Sekali Pakai

                </div>

            </div>

        </div>

    </div>

</div>

@endsection