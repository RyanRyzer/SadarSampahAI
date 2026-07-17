
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

                </form>

            </div>

        </div>

        <div class="col-lg-7">

            <div class="content-card h-100">

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

        <div class="text-center mb-4">

            @if($category)

                <div
                    class="mx-auto mb-4 rounded-circle d-flex align-items-center justify-content-center shadow"

                    style="width:130px;height:130px;background:#dcfce7;">

                    <i

                        class="bi {{ $category->icon }}"

                        style="font-size:70px;color:#16a34a;">

                    </i>

                </div>

            @endif

            <span class="custom-badge success">

                HASIL DETEKSI

            </span>

            <h2 class="mt-3 fw-bold">

                {{ $result['category'] }}

            </h2>

        </div>

        <div class="content-card border mb-4">

            <div class="d-flex justify-content-between mb-2">

                <strong>

                    Tingkat Keyakinan AI

                </strong>

                <strong class="text-success">

                    {{ number_format($result['confidence'],1) }}%

                </strong>

            </div>

            <div class="progress" style="height:14px;">

                <div

                    class="progress-bar bg-success"

                    role="progressbar"

                    style="width: {{ $result['confidence'] }}%">

                </div>

            </div>

        </div>

        @if($category)

            <div class="row g-3 mb-4">

                <div class="col-md-6">

                    <div class="content-card border h-100">

                        <div class="mb-3">

                            <span class="custom-badge">

                                Jenis Sampah

                            </span>

                        </div>

                        <h4 class="fw-bold">

                            {{ $category->type }}

                        </h4>

                        <p class="text-muted mb-0">

                            Berdasarkan hasil analisis AI.

                        </p>

                    </div>

                </div>

                <div class="col-md-6">

                    <div class="content-card border h-100">

                        <div class="mb-3">

                            <span class="custom-badge">

                                Daur Ulang

                            </span>

                        </div>

                        @if($category->recyclable=="Ya")

                            <span class="badge bg-success fs-6">

                                Bisa Didaur Ulang

                            </span>

                        @else

                            <span class="badge bg-danger fs-6">

                                Tidak Bisa Didaur Ulang

                            </span>

                        @endif

                    </div>

                </div>

            </div>

            <div class="content-card border mb-4">

                <h4 class="fw-bold mb-3">

                    <i class="bi bi-book-fill text-success me-2"></i>

                    Deskripsi

                </h4>

                <p class="mb-0">

                    {{ $category->description }}

                </p>

            </div>

            <div class="content-card border mb-4">

                <h4 class="fw-bold mb-3">

                    <i class="bi bi-lightbulb-fill text-warning me-2"></i>

                    Rekomendasi Pengelolaan

                </h4>

                <p class="mb-0">

                    {{ $category->recommendation }}

                </p>

            </div>

        @endif

        @if(isset($result['top_predictions']))

            <div class="content-card border">

                <h4 class="fw-bold mb-4">

                    <i class="bi bi-bar-chart-fill text-success me-2"></i>

                    Top Prediction

                </h4>

                @foreach($result['top_predictions'] as $item)

                    <div class="mb-4">

                        <div class="d-flex justify-content-between mb-2">

                            <span>

                                {{ $item['label'] }}

                            </span>

                            <strong>

                                {{ number_format($item['confidence'],2) }}%

                            </strong>

                        </div>

                        <div class="progress">

                            <div

                                class="progress-bar bg-success"

                                style="width:{{ $item['confidence'] }}%">

                            </div>

                        </div>

                    </div>

                @endforeach

            </div>

        @endif

    @endif

@else

    <div class="text-center py-5">

        <div

            class="mx-auto mb-4 rounded-circle d-flex align-items-center justify-content-center"

            style="width:120px;height:120px;background:#f1f5f9;">

            <i

                class="bi bi-camera"

                style="font-size:60px;color:#94a3b8;">

            </i>

        </div>

        <h3>

            Belum Ada Analisis

        </h3>

        <p class="text-muted mt-3">

            Upload gambar sampah pada panel sebelah kiri,

            kemudian tekan tombol

            <strong>Mulai Analisis AI</strong>

            untuk melihat hasil prediksi.

        </p>

    </div>

@endisset

</div>

</div>

</div>

</div>
<script>

const uploadArea = document.getElementById('uploadArea');
const chooseButton = document.getElementById('chooseImage');
const imageInput = document.getElementById('imageInput');
const previewImage = document.getElementById('previewImage');

const form = document.getElementById('predictForm');
const submitBtn = document.getElementById('submitBtn');
const btnText = document.getElementById('btnText');
const loadingSpinner = document.getElementById('loadingSpinner');

chooseButton.addEventListener('click', () => {
    imageInput.click();
});

uploadArea.addEventListener('click', () => {
    imageInput.click();
});

imageInput.addEventListener('change', function () {

    if(this.files.length){
        showPreview(this.files[0]);
    }

});

uploadArea.addEventListener('dragover', function(e){

    e.preventDefault();

    uploadArea.classList.add('border-success');
    uploadArea.classList.add('bg-light');

});

uploadArea.addEventListener('dragleave', function(){

    uploadArea.classList.remove('border-success');
    uploadArea.classList.remove('bg-light');

});

uploadArea.addEventListener('drop', function(e){

    e.preventDefault();

    uploadArea.classList.remove('border-success');
    uploadArea.classList.remove('bg-light');

    if(e.dataTransfer.files.length){

        imageInput.files = e.dataTransfer.files;

        showPreview(e.dataTransfer.files[0]);

    }

});

function showPreview(file){

    if(!file.type.startsWith("image/")){

        alert("File harus berupa gambar.");

        imageInput.value='';

        return;

    }

    previewImage.src = URL.createObjectURL(file);

    previewImage.classList.remove('d-none');

}

form.addEventListener('submit',function(){

    submitBtn.disabled = true;

    btnText.classList.add('d-none');

    loadingSpinner.classList.remove('d-none');

});
</script>
@endsection