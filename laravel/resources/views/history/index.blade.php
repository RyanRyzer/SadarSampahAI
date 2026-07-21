@extends('layouts.app')

@section('title','Riwayat Deteksi')

@section('content')

<section class="hero-section rounded-5 mb-4">
    <div class="container">
        <div class="row align-items-center gy-5">
            <div class="col-lg-7">
                <div class="hero-content">
                    <span class="hero-badge">
                        <i class="bi bi-clock-history"></i>
                        Riwayat Artificial Intelligence
                    </span>
                    <h1 class="hero-title">Riwayat Deteksi Sampah</h1>
                    <p class="hero-description">
                        Semua hasil deteksi yang pernah dilakukan akan tersimpan
                        sehingga Anda dapat melihat kembali hasil prediksi AI,
                        confidence, serta informasi pengelolaan sampah.
                    </p>
                </div>
            </div>
            <div class="col-lg-5 text-center">
                <img
                    src="https://cdn-icons-png.flaticon.com/512/3142/3142028.png"
                    class="img-fluid"
                    style="max-width:320px;">
            </div>
        </div>
    </div>
</section>

<div class="container">
    <div class="row g-4 mb-4">
        <div class="col-md-4">
            <div class="stats-card">
                <div class="stats-icon primary"><i class="bi bi-images"></i></div>
                <div>
                    <div class="stats-value">{{ $totalDetections }}</div>
                    <div class="stats-title">Total Deteksi</div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="stats-card">
                <div class="stats-icon info"><i class="bi bi-cpu-fill"></i></div>
                <div>
                    <div class="stats-value">AI</div>
                    <div class="stats-title">TensorFlow Lite</div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="stats-card">
                <div class="stats-icon warning"><i class="bi bi-recycle"></i></div>
                <div>
                    <div class="stats-value">{{ $totalCategories }}</div>
                    <div class="stats-title">Kategori Sampah</div>
                </div>
            </div>
        </div>
    </div>

    <div class="content-card">
        <div class="d-flex justify-content-between align-items-center flex-wrap gap-3 mb-4">
            <div>
                <h3 class="fw-bold mb-1">Daftar Riwayat</h3>
                <p class="text-muted mb-0">Seluruh hasil deteksi AI yang pernah dilakukan.</p>
            </div>
            <a href="/predict" class="btn btn-success">
                <i class="bi bi-plus-circle-fill me-2"></i>
                Deteksi Baru
            </a>
        </div>

        @if($histories->count())
            <div class="row g-4">
                @foreach($histories as $history)
                    <div class="col-lg-6">
                        <div class="content-card border h-100">
                            <div class="row g-3 align-items-center">
                                <div class="col-4">
                                    @if($history->image)
                                        <img
                                            src="{{ asset('storage/'.$history->image) }}"
                                            class="img-fluid rounded-4 shadow-sm w-100"
                                            style="height:150px;object-fit:cover;">
                                    @else
                                        <div class="rounded-4 d-flex align-items-center justify-content-center bg-light" style="height:150px;">
                                            <i class="bi bi-image fs-1 text-secondary"></i>
                                        </div>
                                    @endif
                                </div>
                                <div class="col-8">
                                    <div class="d-flex justify-content-between align-items-start mb-3">
                                        <div>
                                            <span class="custom-badge success">{{ $history->category->name ?? '-' }}</span>
                                        </div>
                                        <small class="text-muted">{{ $history->created_at->format('d M Y') }}</small>
                                    </div>
                                    <h4 class="fw-bold mb-2">{{ $history->category->name ?? 'Tidak Diketahui' }}</h4>
                                    <p class="text-muted small mb-3">
                                        {{ \Illuminate\Support\Str::limit($history->category->description ?? '-', 90) }}
                                    </p>
                                    <div class="mb-2">
                                        <div class="d-flex justify-content-between mb-1">
                                            <small>Confidence</small>
                                            <small>{{ number_format($history->confidence,1) }}%</small>
                                        </div>
                                        <div class="progress">
                                            <div class="progress-bar bg-success" style="width:{{ $history->confidence }}%"></div>
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-between align-items-center mt-4">
                                        <div>
                                            @if(($history->category->recyclable ?? '') == 'Ya')
                                                <span class="badge bg-success">Bisa Didaur Ulang</span>
                                            @else
                                                <span class="badge bg-danger">Tidak Bisa Didaur Ulang</span>
                                            @endif
                                        </div>
                                        <small class="text-muted">{{ $history->created_at->format('H:i') }}</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            @if($histories->hasPages())
                <div class="pagination-wrapper mt-4 pt-3 border-top">
                    <div class="d-flex flex-column flex-sm-row justify-content-between align-items-center gap-3">
                        <small class="text-muted">
                            Menampilkan <strong>{{ $histories->firstItem() }}</strong> &ndash;
                            <strong>{{ $histories->lastItem() }}</strong> dari
                            <strong>{{ $histories->total() }}</strong> data
                        </small>
                        <nav aria-label="Navigasi halaman riwayat">
                            {{ $histories->links('pagination::bootstrap-5') }}
                        </nav>
                    </div>
                </div>
            @endif

        @else
            <div class="py-5 text-center">
                <div class="mx-auto mb-4 rounded-circle d-flex align-items-center justify-content-center" style="width:130px;height:130px;background:#f1f5f9;">
                    <i class="bi bi-clock-history" style="font-size:60px;color:#94a3b8;"></i>
                </div>
                <h3 class="fw-bold">Belum Ada Riwayat</h3>
                <p class="text-muted mt-3 mb-4">Anda belum pernah melakukan deteksi sampah menggunakan AI.</p>
                <a href="/predict" class="btn btn-success btn-lg">
                    <i class="bi bi-camera-fill me-2"></i>
                    Mulai Deteksi
                </a>
            </div>
        @endif
    </div>
</div>

@endsection