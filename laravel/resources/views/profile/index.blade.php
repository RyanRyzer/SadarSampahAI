@extends('layouts.app')

@section('title','Profil Saya')

@section('content')

<section class="hero-section rounded-5 mb-5">

    <div class="container">

        <div class="row align-items-center gy-5">

            <div class="col-lg-8">

                <div class="hero-content">

                    <span class="hero-badge">

                        <i class="bi bi-person-circle"></i>

                        Profil Pengguna

                    </span>

                    <h1 class="hero-title">

                        Halo, {{ auth()->user()->name }} 👋

                    </h1>

                    <p class="hero-description">

                        Kelola informasi akun Anda, pantau aktivitas penggunaan
                        Sadar Sampah AI serta lihat perkembangan deteksi sampah
                        yang telah dilakukan.

                    </p>

                </div>

            </div>

            <div class="col-lg-4 text-center">

                <div
                    class="mx-auto rounded-circle shadow-lg d-flex align-items-center justify-content-center"

                    style="width:180px;height:180px;background:#ffffff;color:#16a34a;font-size:64px;font-weight:700;">

                    {{ strtoupper(substr(auth()->user()->name,0,1)) }}

                </div>

            </div>

        </div>

    </div>

</section>

<div class="container">

    <div class="row g-4">

        <div class="col-lg-4">

            <div class="content-card h-100">

                <div class="text-center">

                    <div
                        class="mx-auto mb-4 rounded-circle d-flex align-items-center justify-content-center"

                        style="width:120px;height:120px;background:#dcfce7;font-size:48px;font-weight:700;color:#16a34a;">

                        {{ strtoupper(substr(auth()->user()->name,0,1)) }}

                    </div>

                    <h3 class="fw-bold">

                        {{ auth()->user()->name }}

                    </h3>

                    <p class="text-muted">

                        {{ auth()->user()->email }}

                    </p>

                    <span class="custom-badge success">

                        Pengguna Aktif

                    </span>

                </div>

                <hr class="my-4">

                <div class="mb-4">

                    <small class="text-muted">

                        Bergabung Sejak

                    </small>

                    <h6 class="fw-bold mt-2">

                        {{ auth()->user()->created_at->format('d F Y') }}

                    </h6>

                </div>

                <div>

                    <small class="text-muted">

                        Status Akun

                    </small>

                    <h6 class="fw-bold text-success mt-2">

                        Aktif

                    </h6>

                </div>

            </div>

        </div>

        <div class="col-lg-8">

            <div class="row g-4">

                <div class="col-md-4">

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

                <div class="col-md-4">

                    <div class="stats-card">

                        <div class="stats-icon info">

                            <i class="bi bi-graph-up-arrow"></i>

                        </div>

                        <div>

                            <div class="stats-value">

                                --

                            </div>

                            <div class="stats-title">

                                Akurasi

                            </div>

                        </div>

                    </div>

                </div>

                <div class="col-md-4">

                    <div class="stats-card">

                        <div class="stats-icon warning">

                            <i class="bi bi-clock-history"></i>

                        </div>

                        <div>

                            <div class="stats-value">

                                --

                            </div>

                            <div class="stats-title">

                                Aktivitas

                            </div>

                        </div>

                    </div>

                </div>
                                <div class="col-12">

                    <div class="content-card">

                        <h3 class="content-title">

                            <i class="bi bi-person-vcard-fill text-success me-2"></i>

                            Informasi Akun

                        </h3>

                        <div class="row g-4">

                            <div class="col-md-6">

                                <label class="form-label fw-semibold">

                                    Nama Lengkap

                                </label>

                                <input
                                    type="text"
                                    class="form-control"
                                    value="{{ auth()->user()->name }}"
                                    readonly>

                            </div>

                            <div class="col-md-6">

                                <label class="form-label fw-semibold">

                                    Email

                                </label>

                                <input
                                    type="email"
                                    class="form-control"
                                    value="{{ auth()->user()->email }}"
                                    readonly>

                            </div>

                            <div class="col-md-6">

                                <label class="form-label fw-semibold">

                                    ID Pengguna

                                </label>

                                <input
                                    type="text"
                                    class="form-control"
                                    value="#{{ auth()->user()->id }}"
                                    readonly>

                            </div>

                            <div class="col-md-6">

                                <label class="form-label fw-semibold">

                                    Bergabung Sejak

                                </label>

                                <input
                                    type="text"
                                    class="form-control"
                                    value="{{ auth()->user()->created_at->format('d F Y') }}"
                                    readonly>

                            </div>

                        </div>

                    </div>

                </div>

                <div class="col-lg-6">

                    <div class="content-card h-100">

                        <h3 class="content-title">

                            <i class="bi bi-shield-lock-fill text-success me-2"></i>

                            Keamanan Akun

                        </h3>

                        <div class="d-flex align-items-center mb-4">

                            <div class="feature-icon me-3 mb-0">

                                <i class="bi bi-lock-fill"></i>

                            </div>

                            <div>

                                <h5 class="mb-1">

                                    Password Aman

                                </h5>

                                <small class="text-muted">

                                    Password disimpan menggunakan hashing Laravel.

                                </small>

                            </div>

                        </div>

                        <div class="d-flex align-items-center">

                            <div class="feature-icon me-3 mb-0">

                                <i class="bi bi-person-check-fill"></i>

                            </div>

                            <div>

                                <h5 class="mb-1">

                                    Status Login

                                </h5>

                                <small class="text-success">

                                    Sedang Login

                                </small>

                            </div>

                        </div>

                    </div>

                </div>

                <div class="col-lg-6">

                    <div class="content-card h-100">

                        <h3 class="content-title">

                            <i class="bi bi-lightning-charge-fill text-warning me-2"></i>

                            Aktivitas Terakhir

                        </h3>

                        <div class="mb-4">

                            <div class="d-flex align-items-center mb-3">

                                <i class="bi bi-box-arrow-in-right fs-4 text-success me-3"></i>

                                <div>

                                    <strong>

                                        Login Berhasil

                                    </strong>

                                    <br>

                                    <small class="text-muted">

                                        Session aktif.

                                    </small>

                                </div>

                            </div>

                            <div class="d-flex align-items-center">

                                <i class="bi bi-cpu-fill fs-4 text-primary me-3"></i>

                                <div>

                                    <strong>

                                        AI Detection

                                    </strong>

                                    <br>

                                    <small class="text-muted">

                                        Riwayat deteksi akan muncul di sini.

                                    </small>

                                </div>

                            </div>

                        </div>

                        <a
                            href="/history"
                            class="btn btn-outline-success w-100">

                            <i class="bi bi-clock-history me-2"></i>

                            Lihat Riwayat

                        </a>

                    </div>

                </div>

                <div class="col-12">

                    <div class="content-card">

                        <div class="row align-items-center">

                            <div class="col-lg-8">

                                <h3 class="fw-bold mb-2">

                                    Pengaturan Profil

                                </h3>

                                <p class="text-muted mb-lg-0">

                                    Fitur edit profil, ubah password,
                                    dan pengaturan akun akan ditambahkan
                                    pada tahap pengembangan berikutnya.

                                </p>

                            </div>

                            <div class="col-lg-4 text-lg-end mt-4 mt-lg-0">

                                <button
                                    class="btn btn-success btn-lg"
                                    disabled>

                                    <i class="bi bi-pencil-square me-2"></i>

                                    Segera Hadir

                                </button>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection