@extends('layouts.app')

@section('title', 'Tentang Sadar Sampah AI')

@section('content')

<section class="hero-section rounded-5 mb-5">

    <div class="container">

        <div class="row align-items-center gy-5">

            <div class="col-lg-7">

                <span class="hero-badge">

                    <i class="bi bi-info-circle-fill"></i>

                    Tentang Aplikasi

                </span>

                <h1 class="hero-title">

                    Mengenal <br>

                    <span class="text-success">

                        Sadar Sampah AI

                    </span>

                </h1>

                <p class="hero-description">

                    Sadar Sampah AI merupakan aplikasi berbasis Artificial
                    Intelligence yang membantu masyarakat mengenali berbagai
                    jenis sampah secara cepat melalui gambar. Sistem ini
                    memanfaatkan model TensorFlow Lite yang terintegrasi dengan
                    Laravel dan Flask sehingga proses identifikasi menjadi lebih
                    cepat, mudah, dan dapat digunakan oleh siapa saja.

                </p>

                <div class="d-flex flex-wrap gap-3 mt-4">

                    <a
                        href="{{ route('prediction.index') }}"
                        class="btn btn-success btn-lg">

                        <i class="bi bi-camera-fill me-2"></i>

                        Mulai Deteksi

                    </a>

                    <a
                        href="#tentang"
                        class="btn btn-outline-success btn-lg">

                        <i class="bi bi-arrow-down-circle me-2"></i>

                        Pelajari Lebih Lanjut

                    </a>

                </div>

            </div>

            <div class="col-lg-5 text-center">

                <img
                    src="https://cdn-icons-png.flaticon.com/512/2906/2906274.png"
                    class="img-fluid"
                    style="max-width:360px;">

            </div>

        </div>

    </div>

</section>

<div class="container">

    <div class="row g-4 mb-5">

        <div class="col-md-3">

            <div class="stats-card">

                <div class="stats-icon success">

                    <i class="bi bi-cpu-fill"></i>

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

        <div class="col-md-3">

            <div class="stats-card">

                <div class="stats-icon primary">

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

        <div class="col-md-3">

            <div class="stats-card">

                <div class="stats-icon warning">

                    <i class="bi bi-lightning-charge-fill"></i>

                </div>

                <div>

                    <div class="stats-value">

                        &lt; 1s

                    </div>

                    <div class="stats-title">

                        Prediksi AI

                    </div>

                </div>

            </div>

        </div>

        <div class="col-md-3">

            <div class="stats-card">

                <div class="stats-icon info">

                    <i class="bi bi-bootstrap-fill"></i>

                </div>

                <div>

                    <div class="stats-value">

                        Laravel

                    </div>

                    <div class="stats-title">

                        Framework

                    </div>

                </div>

            </div>

        </div>

    </div>

    <section id="tentang">

        <div class="content-card">

            <div class="row align-items-center g-5">

                <div class="col-lg-6">

                    <img
                        src="https://cdn-icons-png.flaticon.com/512/2917/2917995.png"
                        class="img-fluid rounded-4">

                </div>

                <div class="col-lg-6">

                    <span class="hero-badge mb-3">

                        <i class="bi bi-stars"></i>

                        Apa Itu Sadar Sampah AI?

                    </span>

                    <h2 class="fw-bold mb-4">

                        Teknologi AI untuk Meningkatkan Kesadaran Pengelolaan Sampah

                    </h2>

                    <p class="text-muted mb-4">

                        Aplikasi ini dirancang untuk membantu pengguna
                        mengidentifikasi jenis sampah hanya dengan
                        mengunggah sebuah gambar. Setelah proses
                        identifikasi selesai, sistem akan memberikan
                        hasil klasifikasi beserta tingkat keyakinan
                        (confidence) sehingga pengguna memperoleh
                        informasi yang lebih akurat.

                    </p>

                    <p class="text-muted">

                        Selain memberikan hasil prediksi, aplikasi juga
                        bertujuan meningkatkan kesadaran masyarakat
                        mengenai pentingnya memilah sampah sebelum
                        dibuang agar proses daur ulang dapat berjalan
                        lebih efektif.

                    </p>

                </div>

            </div>

        </div>
                </div>

    </section>

    <section class="my-5">

        <div class="text-center mb-5">

            <span class="hero-badge">

                <i class="bi bi-bullseye"></i>

                Visi & Misi

            </span>

            <h2 class="fw-bold mt-3">

                Komitmen Kami untuk Lingkungan

            </h2>

            <p class="text-muted">

                Membangun kebiasaan memilah sampah melalui pemanfaatan
                teknologi Artificial Intelligence.

            </p>

        </div>

        <div class="row g-4">

            <div class="col-lg-6">

                <div class="content-card h-100">

                    <div class="feature-icon mb-4">

                        <i class="bi bi-eye-fill"></i>

                    </div>

                    <h3 class="fw-bold mb-3">

                        Visi

                    </h3>

                    <p class="text-muted">

                        Menjadi aplikasi edukasi pengelolaan sampah berbasis
                        Artificial Intelligence yang membantu masyarakat
                        mengenali jenis sampah secara cepat, akurat, dan mudah
                        digunakan sehingga mampu meningkatkan kepedulian
                        terhadap lingkungan.

                    </p>

                </div>

            </div>

            <div class="col-lg-6">

                <div class="content-card h-100">

                    <div class="feature-icon mb-4">

                        <i class="bi bi-flag-fill"></i>

                    </div>

                    <h3 class="fw-bold mb-3">

                        Misi

                    </h3>

                    <ul class="text-muted ps-3 mb-0">

                        <li class="mb-3">

                            Membantu pengguna mengidentifikasi jenis sampah
                            menggunakan teknologi AI.

                        </li>

                        <li class="mb-3">

                            Memberikan edukasi mengenai pentingnya pemilahan
                            sampah sebelum dibuang.

                        </li>

                        <li class="mb-3">

                            Mendukung kebiasaan daur ulang yang lebih baik.

                        </li>

                        <li>

                            Memanfaatkan teknologi modern agar proses
                            identifikasi menjadi lebih cepat dan praktis.

                        </li>

                    </ul>

                </div>

            </div>

        </div>

    </section>

    <section class="my-5">

        <div class="text-center mb-5">

            <span class="hero-badge">

                <i class="bi bi-stars"></i>

                Mengapa Memilih Kami?

            </span>

            <h2 class="fw-bold mt-3">

                Keunggulan Sadar Sampah AI

            </h2>

        </div>

        <div class="row g-4">

            <div class="col-md-6 col-lg-3">

                <div class="feature-card text-center h-100">

                    <div class="feature-icon mx-auto mb-4">

                        <i class="bi bi-cpu-fill"></i>

                    </div>

                    <h4 class="fw-bold">

                        AI Modern

                    </h4>

                    <p class="text-muted mb-0">

                        Menggunakan model TensorFlow Lite untuk proses
                        klasifikasi gambar secara cepat.

                    </p>

                </div>

            </div>

            <div class="col-md-6 col-lg-3">

                <div class="feature-card text-center h-100">

                    <div class="feature-icon mx-auto mb-4">

                        <i class="bi bi-lightning-charge-fill"></i>

                    </div>

                    <h4 class="fw-bold">

                        Cepat

                    </h4>

                    <p class="text-muted mb-0">

                        Hasil prediksi diperoleh hanya dalam hitungan
                        kurang dari satu detik.

                    </p>

                </div>

            </div>

            <div class="col-md-6 col-lg-3">

                <div class="feature-card text-center h-100">

                    <div class="feature-icon mx-auto mb-4">

                        <i class="bi bi-check-circle-fill"></i>

                    </div>

                    <h4 class="fw-bold">

                        Akurat

                    </h4>

                    <p class="text-muted mb-0">

                        Menampilkan confidence score sehingga pengguna
                        mengetahui tingkat keyakinan prediksi AI.

                    </p>

                </div>

            </div>

            <div class="col-md-6 col-lg-3">

                <div class="feature-card text-center h-100">

                    <div class="feature-icon mx-auto mb-4">

                        <i class="bi bi-phone-fill"></i>

                    </div>

                    <h4 class="fw-bold">

                        Mudah Digunakan

                    </h4>

                    <p class="text-muted mb-0">

                        Tampilan sederhana dan responsif sehingga nyaman
                        digunakan di berbagai perangkat.

                    </p>

                </div>

            </div>

        </div>

    </section>
    <section class="my-5">

    <div class="text-center mb-5">

        <span class="hero-badge">

            <i class="bi bi-diagram-3-fill"></i>

            Cara Kerja Sistem

        </span>

        <h2 class="fw-bold mt-3">

            Bagaimana AI Melakukan Deteksi?

        </h2>

        <p class="text-muted">

            Sadar Sampah AI memanfaatkan kombinasi Laravel, Flask,
            TensorFlow Lite, dan MySQL sehingga proses identifikasi
            gambar berlangsung secara otomatis hanya dalam beberapa langkah.

        </p>

    </div>

    <div class="row g-4">

        <div class="col-lg-6">

            <div class="content-card h-100">

                <h3 class="fw-bold mb-4">

                    Alur Deteksi AI

                </h3>

                <div class="d-flex mb-4">

                    <div class="feature-icon me-4">

                        1

                    </div>

                    <div>

                        <h5 class="fw-bold">

                            Upload Gambar

                        </h5>

                        <p class="text-muted mb-0">

                            Pengguna memilih atau mengambil foto sampah yang
                            ingin diidentifikasi melalui halaman deteksi.

                        </p>

                    </div>

                </div>

                <div class="d-flex mb-4">

                    <div class="feature-icon me-4">

                        2

                    </div>

                    <div>

                        <h5 class="fw-bold">

                            Laravel Mengirim Request

                        </h5>

                        <p class="text-muted mb-0">

                            Gambar dikirim ke Flask API untuk diproses oleh
                            model Artificial Intelligence.

                        </p>

                    </div>

                </div>

                <div class="d-flex mb-4">

                    <div class="feature-icon me-4">

                        3

                    </div>

                    <div>

                        <h5 class="fw-bold">

                            TensorFlow Lite Memprediksi

                        </h5>

                        <p class="text-muted mb-0">

                            Model melakukan klasifikasi gambar dan
                            menghasilkan kategori beserta confidence score.

                        </p>

                    </div>

                </div>

                <div class="d-flex mb-4">

                    <div class="feature-icon me-4">

                        4

                    </div>

                    <div>

                        <h5 class="fw-bold">

                            Hasil Ditampilkan

                        </h5>

                        <p class="text-muted mb-0">

                            Pengguna langsung memperoleh hasil prediksi
                            lengkap dengan tingkat keyakinan AI.

                        </p>

                    </div>

                </div>

                <div class="d-flex">

                    <div class="feature-icon me-4">

                        5

                    </div>

                    <div>

                        <h5 class="fw-bold">

                            Riwayat Disimpan

                        </h5>

                        <p class="text-muted mb-0">

                            Semua hasil deteksi tersimpan pada database
                            sehingga dapat dilihat kembali kapan saja.

                        </p>

                    </div>

                </div>

            </div>

        </div>

        <div class="col-lg-6">

            <div class="content-card h-100">

                <h3 class="fw-bold mb-4">

                    Arsitektur Sistem

                </h3>

                <div class="text-center py-3">

                    <div class="p-3 rounded-4 bg-light mb-3">

                        <i class="bi bi-person-fill fs-2 text-success"></i>

                        <h5 class="fw-bold mt-2 mb-0">

                            User

                        </h5>

                    </div>

                    <i class="bi bi-arrow-down fs-3 text-success"></i>

                    <div class="p-3 rounded-4 bg-light my-3">

                        <i class="bi bi-browser-chrome fs-2 text-primary"></i>

                        <h5 class="fw-bold mt-2 mb-0">

                            Laravel 12

                        </h5>

                    </div>

                    <i class="bi bi-arrow-down fs-3 text-success"></i>

                    <div class="p-3 rounded-4 bg-light my-3">

                        <i class="bi bi-cloud-arrow-up-fill fs-2 text-warning"></i>

                        <h5 class="fw-bold mt-2 mb-0">

                            Flask API

                        </h5>

                    </div>

                    <i class="bi bi-arrow-down fs-3 text-success"></i>

                    <div class="p-3 rounded-4 bg-light my-3">

                        <i class="bi bi-cpu-fill fs-2 text-danger"></i>

                        <h5 class="fw-bold mt-2 mb-0">

                            TensorFlow Lite

                        </h5>

                    </div>

                    <i class="bi bi-arrow-down fs-3 text-success"></i>

                    <div class="p-3 rounded-4 bg-light">

                        <i class="bi bi-database-fill fs-2 text-success"></i>

                        <h5 class="fw-bold mt-2 mb-0">

                            MySQL Database

                        </h5>

                    </div>

                </div>

            </div>

        </div>

    </div>

</section>

<section class="my-5">

    <div class="content-card">

        <div class="row align-items-center">

            <div class="col-lg-8">

                <h2 class="fw-bold mb-3">

                    Mengapa Menggunakan Artificial Intelligence?

                </h2>

                <p class="text-muted">

                    Artificial Intelligence memungkinkan proses klasifikasi
                    sampah dilakukan secara otomatis berdasarkan pola yang
                    dipelajari dari dataset pelatihan. Dengan pendekatan ini,
                    pengguna tidak perlu memahami karakteristik setiap jenis
                    sampah secara manual karena sistem membantu memberikan
                    prediksi secara cepat dan konsisten.

                </p>

                <div class="row mt-4">

                    <div class="col-md-6 mb-3">

                        <div class="d-flex">

                            <i class="bi bi-check-circle-fill text-success me-3 fs-4"></i>

                            <div>

                                <strong>Respon Cepat</strong>

                                <br>

                                <small class="text-muted">

                                    Prediksi dalam hitungan detik.

                                </small>

                            </div>

                        </div>

                    </div>

                    <div class="col-md-6 mb-3">

                        <div class="d-flex">

                            <i class="bi bi-check-circle-fill text-success me-3 fs-4"></i>

                            <div>

                                <strong>Mudah Digunakan</strong>

                                <br>

                                <small class="text-muted">

                                    Cukup upload gambar.

                                </small>

                            </div>

                        </div>

                    </div>

                    <div class="col-md-6">

                        <div class="d-flex">

                            <i class="bi bi-check-circle-fill text-success me-3 fs-4"></i>

                            <div>

                                <strong>Riwayat Tersimpan</strong>

                                <br>

                                <small class="text-muted">

                                    Semua hasil dapat dilihat kembali.

                                </small>

                            </div>

                        </div>

                    </div>

                    <div class="col-md-6">

                        <div class="d-flex">

                            <i class="bi bi-check-circle-fill text-success me-3 fs-4"></i>

                            <div>

                                <strong>Mendukung Edukasi</strong>

                                <br>

                                <small class="text-muted">

                                    Membantu meningkatkan kesadaran lingkungan.

                                </small>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

            <div class="col-lg-4 text-center mt-4 mt-lg-0">

                <i class="bi bi-robot text-success" style="font-size:170px;"></i>

            </div>

        </div>

    </div>

</section>
<section class="my-5">

    <div class="text-center mb-5">

        <span class="hero-badge">

            <i class="bi bi-code-slash"></i>

            Teknologi

        </span>

        <h2 class="fw-bold mt-3">

            Teknologi yang Digunakan

        </h2>

        <p class="text-muted">

            Sadar Sampah AI dibangun menggunakan kombinasi teknologi modern
            agar aplikasi stabil, cepat, mudah dikembangkan, dan mampu
            menjalankan proses Artificial Intelligence secara optimal.

        </p>

    </div>

    <div class="row g-4">

        <div class="col-md-6 col-xl-4">

            <div class="feature-card h-100">

                <div class="feature-icon mb-4">

                    <i class="bi bi-window"></i>

                </div>

                <h4 class="fw-bold">

                    Laravel 12

                </h4>

                <p class="text-muted mb-0">

                    Digunakan sebagai backend utama untuk autentikasi,
                    manajemen data, integrasi AI, serta penyimpanan riwayat
                    deteksi pengguna.

                </p>

            </div>

        </div>

        <div class="col-md-6 col-xl-4">

            <div class="feature-card h-100">

                <div class="feature-icon mb-4">

                    <i class="bi bi-cpu-fill"></i>

                </div>

                <h4 class="fw-bold">

                    TensorFlow Lite

                </h4>

                <p class="text-muted mb-0">

                    Menjalankan model Machine Learning untuk mengenali jenis
                    sampah berdasarkan gambar yang diunggah pengguna.

                </p>

            </div>

        </div>

        <div class="col-md-6 col-xl-4">

            <div class="feature-card h-100">

                <div class="feature-icon mb-4">

                    <i class="bi bi-cloud-arrow-up-fill"></i>

                </div>

                <h4 class="fw-bold">

                    Flask API

                </h4>

                <p class="text-muted mb-0">

                    Menghubungkan aplikasi Laravel dengan model AI sehingga
                    proses inferensi dapat dilakukan secara cepat.

                </p>

            </div>

        </div>

        <div class="col-md-6 col-xl-6">

            <div class="feature-card h-100">

                <div class="feature-icon mb-4">

                    <i class="bi bi-database-fill"></i>

                </div>

                <h4 class="fw-bold">

                    MySQL

                </h4>

                <p class="text-muted mb-0">

                    Menyimpan data pengguna, kategori sampah, serta seluruh
                    riwayat hasil deteksi AI secara aman dan terstruktur.

                </p>

            </div>

        </div>

        <div class="col-md-6 col-xl-6">

            <div class="feature-card h-100">

                <div class="feature-icon mb-4">

                    <i class="bi bi-bootstrap-fill"></i>

                </div>

                <h4 class="fw-bold">

                    Bootstrap 5

                </h4>

                <p class="text-muted mb-0">

                    Digunakan untuk membangun antarmuka modern, responsif,
                    serta nyaman digunakan baik pada desktop maupun perangkat
                    mobile.

                </p>

            </div>

        </div>

    </div>

</section>

<section class="my-5">

    <div class="content-card">

        <div class="row text-center g-4">

            <div class="col-md-3">

                <h2 class="fw-bold text-success">

                    17+

                </h2>

                <p class="text-muted mb-0">

                    Kategori Sampah

                </p>

            </div>

            <div class="col-md-3">

                <h2 class="fw-bold text-success">

                    AI

                </h2>

                <p class="text-muted mb-0">

                    TensorFlow Lite

                </p>

            </div>

            <div class="col-md-3">

                <h2 class="fw-bold text-success">

                    &lt; 1 Detik

                </h2>

                <p class="text-muted mb-0">

                    Waktu Prediksi

                </p>

            </div>

            <div class="col-md-3">

                <h2 class="fw-bold text-success">

                    24/7

                </h2>

                <p class="text-muted mb-0">

                    Siap Digunakan

                </p>

            </div>

        </div>

    </div>

</section>

<section class="mb-5">

    <div class="content-card text-center">

        <span class="hero-badge mb-3">

            <i class="bi bi-stars"></i>

            Mari Mulai

        </span>

        <h2 class="fw-bold mb-3">

            Yuk Mulai Deteksi Sampah Sekarang!

        </h2>

        <p class="text-muted mx-auto mb-4" style="max-width:700px;">

            Gunakan Artificial Intelligence untuk membantu mengenali jenis
            sampah dengan lebih mudah. Setiap deteksi yang dilakukan juga
            dapat menjadi langkah kecil untuk meningkatkan kepedulian
            terhadap lingkungan dan mendukung proses pengelolaan sampah
            yang lebih baik.

        </p>

        <div class="d-flex justify-content-center flex-wrap gap-3">

            <a
                href="{{ route('prediction.index') }}"
                class="btn btn-success btn-lg">

                <i class="bi bi-camera-fill me-2"></i>

                Mulai Deteksi

            </a>

            <a
                href="{{ route('history.index') }}"
                class="btn btn-outline-success btn-lg">

                <i class="bi bi-clock-history me-2"></i>

                Lihat Riwayat

            </a>

        </div>

    </div>

</section>

</div>

@endsection