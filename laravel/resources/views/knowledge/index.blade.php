@extends('layouts.app')

@section('title', 'Knowledge Base')

@section('content')

<div class="container py-4">

    <div class="text-center mb-5">

        <span class="badge bg-success px-3 py-2 mb-3">

            Edukasi Sampah

        </span>

        <h2 class="fw-bold">

            Knowledge Base

        </h2>

        <p class="text-muted mx-auto" style="max-width:650px;">

            Pelajari berbagai jenis sampah beserta cara pengelolaannya agar
            dapat membantu menjaga lingkungan menjadi lebih bersih dan sehat.

        </p>

    </div>

    <div class="row justify-content-center mb-5">

        <div class="col-lg-6">

            <input
                type="text"
                class="form-control form-control-lg"
                id="searchCategory"
                placeholder="Cari kategori sampah...">

        </div>

    </div>

    <div class="row g-4" id="categoryContainer">

        @forelse($categories as $category)

            @php

                $slug = \Illuminate\Support\Str::slug($category->name);

                $icon = null;

                foreach (['svg','png','jpg','jpeg','webp'] as $ext) {

                    if (file_exists(public_path("images/categories/{$slug}.{$ext}"))) {

                        $icon = asset("images/categories/{$slug}.{$ext}");

                        break;

                    }

                }

            @endphp

            <div class="col-md-6 col-lg-4 category-item">

                <div class="card border-0 shadow-sm rounded-4 h-100">

                    <div class="card-body d-flex flex-column">

                        <div class="d-flex align-items-center mb-3">

                            @if($icon)

                                <img
                                    src="{{ $icon }}"
                                    alt="{{ $category->name }}"
                                    class="category-icon me-3">

                            @else

                                <div
                                    class="category-icon bg-success text-white d-flex align-items-center justify-content-center me-3">

                                    <i class="bi bi-recycle fs-4"></i>

                                </div>

                            @endif

                            <div>

                                <h5 class="fw-bold mb-1">

                                    {{ $category->name }}

                                </h5>

                                <small class="text-muted">

                                    {{ $category->type }}

                                </small>

                            </div>

                        </div>

                        <p class="text-muted flex-grow-1">

                            {{ \Illuminate\Support\Str::limit($category->description,120) }}

                        </p>

                        <div class="mb-3">

                            @if($category->recyclable === 'Ya')

                                <span class="badge bg-success">

                                    Dapat Didaur Ulang

                                </span>

                            @else

                                <span class="badge bg-danger">

                                    Tidak Dapat Didaur Ulang

                                </span>

                            @endif

                        </div>

                        <a
                            href="{{ route('knowledge.show',$category) }}"
                            class="btn btn-success rounded-pill mt-auto">

                            Lihat Detail

                        </a>

                    </div>

                </div>

            </div>

        @empty

            <div class="col-12">

                <div class="alert alert-warning rounded-4">

                    Belum ada data kategori.

                </div>

            </div>

        @endforelse

    </div>

</div>
<script>

const search = document.getElementById('searchCategory');

if (search) {

    search.addEventListener('keyup', function () {

        const keyword = this.value.toLowerCase().trim();

        document.querySelectorAll('.category-item').forEach(function (card) {

            const text = card.innerText.toLowerCase();

            card.style.display = text.includes(keyword)
                ? ''
                : 'none';

        });

    });

}

</script>

@endsection