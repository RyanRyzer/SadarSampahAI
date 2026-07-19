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

                        Kelola informasi akun, ubah foto profil,
                        perbarui informasi pribadi,
                        dan ganti password akun Anda.

                    </p>

                </div>

            </div>

            <div class="col-lg-4 text-center">

                @if(auth()->user()->photo)

                    <img
                        id="avatarPreview"
                        src="{{ asset('storage/'.auth()->user()->photo) }}"
                        class="rounded-circle shadow-lg"
                        style="width:180px;height:180px;object-fit:cover;">

                @else

                    <div
                        id="avatarDefault"
                        class="mx-auto rounded-circle shadow-lg d-flex align-items-center justify-content-center"
                        style="width:180px;height:180px;background:#ffffff;color:#16a34a;font-size:64px;font-weight:700;">

                        {{ strtoupper(substr(auth()->user()->name,0,1)) }}

                    </div>

                    <img
                        id="avatarPreview"
                        class="rounded-circle shadow-lg d-none"
                        style="width:180px;height:180px;object-fit:cover;">

                @endif

            </div>

        </div>

    </div>

</section>

<div class="container">

@if(session('success'))

<div class="alert alert-success alert-dismissible fade show rounded-4">

    <i class="bi bi-check-circle-fill me-2"></i>

    {{ session('success') }}

    <button
        class="btn-close"
        data-bs-dismiss="alert">
    </button>

</div>

@endif

@if($errors->any())

<div class="alert alert-danger rounded-4">

    <ul class="mb-0">

        @foreach($errors->all() as $error)

            <li>{{ $error }}</li>

        @endforeach

    </ul>

</div>

@endif

<form
    action="{{ route('profile.update') }}"
    method="POST"
    enctype="multipart/form-data">

    @csrf

    @method('PUT')

<div class="row g-4">

<div class="col-lg-4">

<div class="content-card h-100">

<div class="text-center">

@if(auth()->user()->photo)

<img
    id="photoPreview"
    src="{{ asset('storage/'.auth()->user()->photo) }}"
    class="rounded-circle shadow mb-4"
    style="width:150px;height:150px;object-fit:cover;">

@else

<div
    id="photoPlaceholder"
    class="mx-auto mb-4 rounded-circle d-flex align-items-center justify-content-center"
    style="width:150px;height:150px;background:#dcfce7;font-size:54px;font-weight:700;color:#16a34a;">

    {{ strtoupper(substr(auth()->user()->name,0,1)) }}

</div>

<img
    id="photoPreview"
    class="rounded-circle shadow mb-4 d-none"
    style="width:150px;height:150px;object-fit:cover;">

@endif

<input
    type="file"
    class="form-control"
    id="photoInput"
    name="photo"
    accept="image/*">

<small class="text-muted mt-2 d-block">

    JPG, PNG maksimal 2 MB.

</small>

<hr>

<h4 class="fw-bold">

    {{ auth()->user()->name }}

</h4>

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

{{ $totalDetections }}

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

{{ $averageConfidence }}%

</div>

<div class="stats-title">

Rata-rata Confidence

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

{{ $lastDetection ? $lastDetection->created_at->diffForHumans() : '-' }}

</div>

<div class="stats-title">

Aktivitas Terakhir

</div>

</div>

</div>

</div>

<div class="col-12">

<div class="content-card">

<h3 class="content-title">

<i class="bi bi-pencil-square text-success me-2"></i>

Edit Profil

</h3>

<div class="row g-4">

<div class="col-md-6">

<label class="form-label fw-semibold">

Nama Lengkap

</label>

<input
type="text"
class="form-control"
name="name"
value="{{ old('name', auth()->user()->name) }}"
required>

</div>

<div class="col-md-6">

<label class="form-label fw-semibold">

Email

</label>

<input
type="email"
class="form-control"
name="email"
value="{{ old('email', auth()->user()->email) }}"
required>

</div>

<div class="col-md-6">

<label class="form-label fw-semibold">

Password Lama

</label>

<input
type="password"
class="form-control"
name="current_password">

<small class="text-muted">

Kosongkan jika tidak ingin mengganti password.

</small>

</div>

<div class="col-md-6">

<label class="form-label fw-semibold">

Password Baru

</label>

<input
type="password"
class="form-control"
name="password">

</div>

<div class="col-md-6">

<label class="form-label fw-semibold">

Konfirmasi Password Baru

</label>

<input
type="password"
class="form-control"
name="password_confirmation">

</div>

<div class="col-md-6 d-flex align-items-end">

<button
type="submit"
class="btn btn-success btn-lg w-100">

<i class="bi bi-floppy-fill me-2"></i>

Simpan Perubahan

</button>

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

                    Password Terenkripsi

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

            <i class="bi bi-clock-history text-warning me-2"></i>

            Aktivitas Terakhir

        </h3>

        @if($lastDetection)

            <div class="d-flex align-items-center mb-4">

                <div class="feature-icon me-3 mb-0">

                    <i class="bi bi-camera-fill"></i>

                </div>

                <div>

                    <h5 class="mb-1">

                        Deteksi Terakhir

                    </h5>

                    <small class="text-muted">

                        {{ $lastDetection->created_at->format('d F Y H:i') }}

                    </small>

                </div>

            </div>

        @else

            <div class="alert alert-light border">

                Belum ada aktivitas deteksi.

            </div>

        @endif

        <a
            href="{{ route('history.index') }}"
            class="btn btn-outline-success w-100">

            <i class="bi bi-clock-history me-2"></i>

            Lihat Riwayat

        </a>

    </div>

</div>

</div>

</div>

</div>

</form>

</div>

<script>

const photoInput = document.getElementById('photoInput');

const photoPreview = document.getElementById('photoPreview');

const photoPlaceholder = document.getElementById('photoPlaceholder');

const avatarPreview = document.getElementById('avatarPreview');

const avatarDefault = document.getElementById('avatarDefault');

photoInput?.addEventListener('change', function () {

    if (!this.files.length) return;

    const file = this.files[0];

    if (!file.type.startsWith('image/')) {

        alert('File harus berupa gambar.');

        this.value = '';

        return;

    }

    const url = URL.createObjectURL(file);

    if (photoPreview) {

        photoPreview.src = url;

        photoPreview.classList.remove('d-none');

    }

    if (avatarPreview) {

        avatarPreview.src = url;

        avatarPreview.classList.remove('d-none');

    }

    if (photoPlaceholder) {

        photoPlaceholder.classList.add('d-none');

    }

    if (avatarDefault) {

        avatarDefault.classList.add('d-none');

    }

});

</script>

@endsection