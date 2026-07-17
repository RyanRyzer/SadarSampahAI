<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title', 'Sadar Sampah AI')</title>

    <meta name="description" content="Sadar Sampah AI - Sistem Cerdas Deteksi dan Edukasi Pengelolaan Sampah">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap"
        rel="stylesheet">

    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    @vite([
        'resources/css/app.css',
        'resources/js/app.js'
    ])

    @stack('styles')

</head>

<body>

    <div class="app-wrapper">

        @include('layouts.navbar')

        @if(session('success'))
            <div class="container mt-4">
                <div class="alert alert-success border-0 shadow-sm rounded-4">
                    <i class="bi bi-check-circle-fill me-2"></i>
                    {{ session('success') }}
                </div>
            </div>
        @endif

        @if(session('error'))
            <div class="container mt-4">
                <div class="alert alert-danger border-0 shadow-sm rounded-4">
                    <i class="bi bi-exclamation-circle-fill me-2"></i>
                    {{ session('error') }}
                </div>
            </div>
        @endif

        <main class="main-content">

            @yield('content')

        </main>

        @include('layouts.footer')

    </div>

    @stack('scripts')

</body>

</html>