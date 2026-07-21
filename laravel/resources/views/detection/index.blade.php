
@extends('layouts.app')

@section('title','Deteksi Sampah AI')

@section('content')

<section class="hero-section rounded-5 mb-5">

    <div class="container">

        <div class="row align-items-center gy-5">

            <div class="col-lg-7">

                <div class="hero-content">

                    <span class="hero-badge">

                        <i class="bi bi-cpu-fill"></i>

                        Artificial Intelligence

                    </span>

                    <h1 class="hero-title">

                        Deteksi Sampah AI

                    </h1>

                    <p class="hero-description">

                        Upload foto sampah yang ingin dikenali.

                        Sistem AI akan menganalisis gambar, menentukan kategori sampah,

                        kemudian memberikan informasi serta rekomendasi pengelolaan yang tepat.

                    </p>

                </div>

            </div>

            <div class="col-lg-5 text-center">

                <img

                    src="https://cdn-icons-png.flaticon.com/512/3082/3082037.png"

                    class="img-fluid"

                    style="max-width:330px;">

            </div>

        </div>

    </div>

</section>

<div class="container">

    <div class="row g-4">

        <div class="col-lg-5">

            <div class="content-card">

                <h3 class="content-title">

                    <i class="bi bi-cloud-arrow-up-fill text-success me-2"></i>

                    Upload Gambar

                </h3>

                @if($errors->has('ai'))

                    <div class="alert alert-danger rounded-4">

                        <i class="bi bi-exclamation-circle-fill me-2"></i>

                        {{ $errors->first('ai') }}

                    </div>

                @endif

                <form

                    id="predictForm"

                    action="/predict"

                    method="POST"

                    enctype="multipart/form-data">

                    @csrf

                    @if(!empty($uploadedImage))

                        <div id="uploadedPreview" class="uploaded-preview mb-3">

                            <img

                                src="{{ $uploadedImage }}"

                                class="uploaded-img rounded-4">

                            <div class="uploaded-overlay rounded-4" onclick="document.getElementById('imageInput').click();">

                                <i class="bi bi-camera-fill"></i>

                                <span>Ganti Gambar</span>

                            </div>

                        </div>

                        <input

                            type="file"

                            class="form-control"

                            id="imageInput"

                            name="image"

                            accept="image/*"

                            hidden

                            required>

                        <button

                            id="submitBtn"

                            class="btn btn-success btn-lg w-100">

                            <span id="btnText">

                                <i class="bi bi-stars me-2"></i>

                                Analisis Ulang

                            </span>

                            <span

                                id="loadingSpinner"

                                class="d-none">

                                <span class="spinner-border spinner-border-sm me-2"></span>

                                AI Sedang Menganalisis...

                            </span>

                        </button>

                    @else

                        <div

                            id="uploadArea"

                            class="border rounded-4 p-4 text-center mb-4"

                            style="border-style:dashed !important;cursor:pointer;">

                            <div class="mb-3">

                                <i class="bi bi-cloud-arrow-up-fill text-success"

                                    style="font-size:70px;"></i>

                            </div>

                            <h5>

                                Klik atau Drag & Drop

                            </h5>

                            <p class="text-muted mb-3">

                                JPG, PNG, JPEG

                            </p>

                            <input

                                type="file"

                                class="form-control"

                                id="imageInput"

                                name="image"

                                accept="image/*"

                                hidden

                                required>

                            <button

                                type="button"

                                id="chooseImage"

                                class="btn btn-success">

                                <i class="bi bi-image-fill me-2"></i>

                                Pilih Gambar

                            </button>

                        </div>

                        <div class="text-center mb-4">

                            <img

                                id="previewImage"

                                class="img-fluid rounded-4 shadow d-none"

                                style="max-height:320px;object-fit:cover;">

                        </div>

                        <button

                            id="submitBtn"

                            class="btn btn-success btn-lg w-100">

                            <span id="btnText">

                                <i class="bi bi-stars me-2"></i>

                                Mulai Analisis AI

                            </span>

                            <span

                                id="loadingSpinner"

                                class="d-none">

                                <span class="spinner-border spinner-border-sm me-2"></span>

                                AI Sedang Menganalisis...

                            </span>

                        </button>

                    @endif

                </form>

            </div>

        </div>

        <div class="col-lg-7">

            <div class="content-card">

                <h3 class="content-title">

                    <i class="bi bi-bar-chart-fill text-success me-2"></i>

                    Hasil Analisis AI

                </h3>
                @isset($result)

    @if(!$result['success'])

        <div class="alert alert-warning rounded-4">

            <div class="d-flex">

                <div class="me-3">

                    <i class="bi bi-exclamation-triangle-fill fs-1"></i>

                </div>

                <div>

                    <h5 class="fw-bold">

                        Gambar Tidak Dapat Dikenali

                    </h5>

                    <p class="mb-0">

                        {{ $result['message'] }}

                    </p>

                </div>

            </div>

        </div>

    @else

        @if($category)

            <div class="d-flex align-items-center gap-3 mb-3">

                <div

                    class="rounded-circle d-flex align-items-center justify-content-center shadow flex-shrink-0"

                    style="width:64px;height:64px;background:#dcfce7;">

                    <i

                        class="bi {{ $category->icon }}"

                        style="font-size:30px;color:#16a34a;">

                    </i>

                </div>

                <div class="flex-grow-1">

                    <span class="custom-badge success" style="font-size:11px;padding:4px 12px;">

                        HASIL DETEKSI

                    </span>

                    <h4 class="fw-bold mb-0 mt-1">

                        {{ $result['category'] }}

                    </h4>

                </div>

            </div>

        @else

            <div class="text-center mb-3">

                <span class="custom-badge success" style="font-size:11px;padding:4px 12px;">

                    HASIL DETEKSI

                </span>

                <h4 class="fw-bold mb-0 mt-2">

                    {{ $result['category'] }}

                </h4>

            </div>

        @endif

        <div class="d-flex justify-content-between align-items-center mb-2 px-1">

            <span class="small fw-semibold">Keyakinan AI</span>

            <span class="small fw-bold text-success">{{ number_format($result['confidence'],1) }}%</span>

        </div>

        <div class="progress mb-3" style="height:8px;">

            <div

                class="progress-bar bg-success"

                role="progressbar"

                style="width: {{ $result['confidence'] }}%">

            </div>

        </div>

        @if($category)

            <div class="d-flex gap-2 mb-3 flex-wrap">

                <span class="badge bg-light text-dark border" style="font-size:12px;padding:6px 12px;">

                    <i class="bi bi-tag-fill text-success me-1"></i> {{ $category->type }}

                </span>

                <span class="badge border {{ $category->bin_color === 'Hijau' ? 'bg-success bg-opacity-10 text-success border-success' : ($category->bin_color === 'Kuning' ? 'bg-warning bg-opacity-10 text-warning border-warning' : 'bg-danger bg-opacity-10 text-danger border-danger') }}" style="font-size:12px;padding:6px 12px;">

                    <i class="bi bi-trash-fill me-1"></i> {{ $category->bin_color }}

                </span>

                @if($category->recyclable === 'Ya')

                    <span class="badge bg-success" style="font-size:12px;padding:6px 12px;">

                        <i class="bi bi-recycle me-1"></i> Daur Ulang

                    </span>

                @else

                    <span class="badge bg-danger" style="font-size:12px;padding:6px 12px;">

                        <i class="bi bi-x-circle me-1"></i> Tidak Daur Ulang

                    </span>

                @endif

            </div>

            <div class="accordion mb-3" id="detailAccordion">

                <div class="accordion-item border-0 mb-1" style="background:var(--gray-100);border-radius:12px!important;">

                    <h2 class="accordion-header">

                        <button class="accordion-button collapsed fw-semibold small py-2" type="button" data-bs-toggle="collapse" data-bs-target="#collapseDesc" style="background:transparent;box-shadow:none;">

                            <i class="bi bi-book-fill text-success me-2"></i> Deskripsi

                        </button>

                    </h2>

                    <div id="collapseDesc" class="accordion-collapse collapse" data-bs-parent="#detailAccordion">

                        <div class="accordion-body small text-muted py-2 px-3" style="background:#fff;">

                            {{ $category->description }}

                        </div>

                    </div>

                </div>

                <div class="accordion-item border-0" style="background:var(--gray-100);border-radius:12px!important;">

                    <h2 class="accordion-header">

                        <button class="accordion-button collapsed fw-semibold small py-2" type="button" data-bs-toggle="collapse" data-bs-target="#collapseRec" style="background:transparent;box-shadow:none;">

                            <i class="bi bi-lightbulb-fill text-warning me-2"></i> Rekomendasi Pengelolaan

                        </button>

                    </h2>

                    <div id="collapseRec" class="accordion-collapse collapse" data-bs-parent="#detailAccordion">

                        <div class="accordion-body small text-muted py-2 px-3" style="background:#fff;">

                            {{ $category->recommendation }}

                        </div>

                    </div>

                </div>

            </div>

        @else

            <div class="text-center py-2 mb-2" style="background:var(--gray-100);border-radius:12px;">

                <i class="bi bi-question-circle text-muted small"></i>

                <span class="small ms-1 text-muted">

                    Kategori <strong>{{ $result['category'] }}</strong> belum terdaftar.

                </span>

            </div>

        @endif

        @if(isset($result['top_predictions']) && count($result['top_predictions']) > 0)

            <div class="accordion" id="topPredAccordion">

                <div class="accordion-item border-0" style="background:var(--gray-100);border-radius:12px!important;">

                    <h2 class="accordion-header">

                        <button class="accordion-button collapsed fw-semibold small py-2" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTop" style="background:transparent;box-shadow:none;">

                            <i class="bi bi-bar-chart-fill text-success me-2"></i> Top Prediction

                        </button>

                    </h2>

                    <div id="collapseTop" class="accordion-collapse collapse" data-bs-parent="#topPredAccordion">

                        <div class="accordion-body py-2 px-3" style="background:#fff;">

                            @foreach($result['top_predictions'] as $item)

                                <div class="mb-2">

                                    <div class="d-flex justify-content-between mb-1">

                                        <span class="small">{{ $item['label'] }}</span>

                                        <strong class="small text-success">{{ number_format($item['confidence'],2) }}%</strong>

                                    </div>

                                    <div class="progress" style="height:5px;">

                                        <div

                                            class="progress-bar bg-success"

                                            style="width:{{ $item['confidence'] }}%">

                                        </div>

                                    </div>

                                </div>

                            @endforeach

                        </div>

                    </div>

                </div>

            </div>

        @endif

    @endif

@else

    <div class="text-center py-4">

        <div

            class="mx-auto mb-3 rounded-circle d-flex align-items-center justify-content-center"

            style="width:80px;height:80px;background:#f1f5f9;">

            <i

                class="bi bi-camera"

                style="font-size:40px;color:#94a3b8;">

            </i>

        </div>

        <h5 class="fw-bold">

            Belum Ada Analisis

        </h5>

        <p class="text-muted mt-2 small">

            Upload gambar sampah lalu tekan <strong>Mulai Analisis AI</strong> untuk melihat hasil prediksi.

        </p>

    </div>

@endisset

</div>

</div>

</div>

</div>
<script>

const imageInput = document.getElementById('imageInput');
const form = document.getElementById('predictForm');
const submitBtn = document.getElementById('submitBtn');
const btnText = document.getElementById('btnText');
const loadingSpinner = document.getElementById('loadingSpinner');

const uploadArea = document.getElementById('uploadArea');
const chooseButton = document.getElementById('chooseImage');
const previewImage = document.getElementById('previewImage');
const uploadedPreview = document.getElementById('uploadedPreview');

if (chooseButton) {
    chooseButton.addEventListener('click', function(e) {
        e.stopPropagation();
        imageInput.click();
    });
}

if (uploadArea) {
    uploadArea.addEventListener('click', function() {
        imageInput.click();
    });

    uploadArea.addEventListener('dragover', function(e) {
        e.preventDefault();
        uploadArea.classList.add('border-success');
        uploadArea.classList.add('bg-light');
    });

    uploadArea.addEventListener('dragleave', function() {
        uploadArea.classList.remove('border-success');
        uploadArea.classList.remove('bg-light');
    });

    uploadArea.addEventListener('drop', function(e) {
        e.preventDefault();
        uploadArea.classList.remove('border-success');
        uploadArea.classList.remove('bg-light');
        if (e.dataTransfer.files.length) {
            imageInput.files = e.dataTransfer.files;
            showPreview(e.dataTransfer.files[0]);
        }
    });
}

imageInput.addEventListener('change', function() {
    if (!this.files.length) return;

    var file = this.files[0];

    if (!file.type.startsWith("image/")) {
        alert("File harus berupa gambar.");
        imageInput.value = '';
        return;
    }

    var objectUrl = URL.createObjectURL(file);

    if (uploadedPreview) {
        var img = uploadedPreview.querySelector('.uploaded-img');
        if (img) img.src = objectUrl;
        form.submit();
        return;
    }

    if (previewImage) {
        previewImage.src = objectUrl;
        previewImage.classList.remove('d-none');
    }
});

function showPreview(file) {
    if (!file.type.startsWith("image/")) {
        alert("File harus berupa gambar.");
        imageInput.value = '';
        return;
    }
    previewImage.src = URL.createObjectURL(file);
    previewImage.classList.remove('d-none');
}

form.addEventListener('submit', function() {
    submitBtn.disabled = true;
    btnText.classList.add('d-none');
    loadingSpinner.classList.remove('d-none');
});
</script>
@endsection