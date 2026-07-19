@extends('layouts.app')

@section('title', $category->name)

@section('content')

<div class="container py-4">

    <div class="mb-4">

        <a href="{{ route('knowledge.index') }}" class="btn btn-outline-secondary rounded-pill">
            ← Kembali
        </a>

    </div>

    <div class="card border-0 shadow rounded-4 overflow-hidden">

        <div class="card-body p-5">

            <div class="row align-items-center">

                <div class="col-lg-8">

                    <div class="d-flex align-items-center mb-4">

                        @php

    $slug = \Illuminate\Support\Str::slug($category->name);

    $icon = null;

    foreach (['svg','png','jpg','jpeg','webp'] as $ext){

        if(file_exists(public_path("images/categories/{$slug}.{$ext}"))){

            $icon = asset("images/categories/{$slug}.{$ext}");

            break;

        }

    }

@endphp

@if($icon)

    <img
        src="{{ $icon }}"
        alt="{{ $category->name }}"
        class="detail-category-icon me-4">

@else

    <div
        class="detail-category-icon bg-success text-white d-flex justify-content-center align-items-center me-4">

        <i class="bi bi-recycle fs-1"></i>

    </div>

@endif

                        <div>

                            <h2 class="fw-bold mb-1">

                                {{ $category->name }}

                            </h2>

                            <span class="badge bg-success">

                                {{ $category->type }}

                            </span>

                        </div>

                    </div>

                    <p class="text-muted fs-5">

                        {{ $category->description }}

                    </p>

                </div>

                <div class="col-lg-4">

                    <div class="card bg-light border-0">

                        <div class="card-body">

                            <h5 class="fw-bold mb-4">

                                Informasi Singkat

                            </h5>

                            <div class="mb-3">

                                <small class="text-muted d-block">

                                    Dapat Didaur Ulang

                                </small>

                                @if($category->recyclable === 'Ya')

<span class="badge bg-success">

Ya

</span>

@else

<span class="badge bg-danger">

Tidak

</span>

@endif

                            </div>

                            <div class="mb-3">

                                <small class="text-muted d-block">

                                    Warna Tempat Sampah

                                </small>

                                <strong>

                                    {{ $category->bin_color }}

                                </strong>

                            </div>

                            <div>

                                <small class="text-muted d-block">

                                    Jenis

                                </small>

                                <strong>

                                    {{ $category->type }}

                                </strong>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

    <div class="row mt-4">

        <div class="col-lg-6 mb-4">

            <div class="card border-0 shadow-sm rounded-4 h-100">

                <div class="card-body">

                    <h4 class="fw-bold mb-3">

                        Cara Pengelolaan

                    </h4>

                    <p class="text-muted mb-0">

                        {{ $category->recommendation }}

                    </p>

                </div>

            </div>

        </div>

        <div class="col-lg-6 mb-4">

            <div class="card border-0 shadow-sm rounded-4 h-100">

                <div class="card-body">

                    <h4 class="fw-bold mb-3">

                        Tips Singkat

                    </h4>

                    <ul class="mb-0">

                        @if($category->recyclable === 'Ya')

                            <li>Bersihkan sampah sebelum dibuang.</li>
                            <li>Pisahkan dari sampah organik.</li>
                            <li>Manfaatkan bank sampah atau tempat daur ulang.</li>

                        @else

                            <li>Buang pada tempat sampah yang sesuai.</li>
                            <li>Kurangi penggunaan produk sejenis bila memungkinkan.</li>
                            <li>Jangan mencampur dengan sampah yang bisa didaur ulang.</li>

                        @endif

                    </ul>

                </div>

            </div>

        </div>

    </div>

    <div class="card border-0 shadow-sm rounded-4">

        <div class="card-body text-center py-5">

            <h3 class="fw-bold mb-3">

                Sudah Mengenali Jenis Sampah Ini?

            </h3>

            <p class="text-muted mb-4">

                Sekarang coba lakukan deteksi menggunakan AI dan pastikan sampah dibuang sesuai kategorinya.

            </p>

            <a href="{{ route('prediction.index') }}" class="btn btn-success btn-lg rounded-pill px-5">

                Deteksi Sampah Sekarang

            </a>

        </div>

    </div>

</div>

@endsection