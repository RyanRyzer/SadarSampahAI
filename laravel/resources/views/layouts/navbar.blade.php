<nav class="navbar navbar-expand-lg app-navbar sticky-top">

    <div class="container">

        <a href="{{ auth()->check() ? url('/dashboard') : url('/') }}"
            class="navbar-brand d-flex align-items-center">

            <div class="brand-icon">

                <i class="bi bi-recycle"></i>

            </div>

            <div class="ms-2">

                <div class="brand-title">
                    Sadar Sampah AI
                </div>

                <small class="brand-subtitle">
                    Smart Waste Management
                </small>

            </div>

        </a>

        <button
            class="navbar-toggler border-0 shadow-none"
            type="button"
            data-bs-toggle="collapse"
            data-bs-target="#mainNavbar">

            <i class="bi bi-list fs-2"></i>

        </button>

        <div
            class="collapse navbar-collapse"
            id="mainNavbar">

            @auth

                <ul class="navbar-nav mx-auto">

    <li class="nav-item">

        <a
            href="{{ url('/dashboard') }}"
            class="nav-link {{ request()->is('dashboard') ? 'active' : '' }}">

            <i class="bi bi-grid-1x2-fill me-2"></i>

            Dashboard

        </a>

    </li>

    <li class="nav-item">

        <a
            href="{{ url('/predict') }}"
            class="nav-link {{ request()->is('predict') ? 'active' : '' }}">

            <i class="bi bi-camera-fill me-2"></i>

            Deteksi AI

        </a>

    </li>

    <li class="nav-item">

        <a
            href="{{ url('/history') }}"
            class="nav-link {{ request()->is('history') ? 'active' : '' }}">

            <i class="bi bi-clock-history me-2"></i>

            Riwayat

        </a>

    </li>

    <li class="nav-item">

        <a
            href="{{ route('knowledge.index') }}"
            class="nav-link {{ request()->is('knowledge*') ? 'active' : '' }}">

            <i class="bi bi-book-fill me-2"></i>

            Knowledge Base

        </a>

    </li>

    <li class="nav-item">

        <a
            href="{{ url('/about') }}"
            class="nav-link {{ request()->is('about') ? 'active' : '' }}">

            <i class="bi bi-info-circle-fill me-2"></i>

            Tentang

        </a>

    </li>

</ul>

                <div class="dropdown mt-3 mt-lg-0">

                    <button
                        class="btn user-dropdown dropdown-toggle"
                        data-bs-toggle="dropdown">

                        <div class="user-avatar">

                             @if(auth()->user()->photo)

                                <img
                                    src="{{ asset('storage/'.auth()->user()->photo) }}"
                                    alt="Profile">

                            @else

                                {{ strtoupper(substr(auth()->user()->name,0,1)) }}

                            @endif

                        </div>

                        <div class="user-detail d-none d-md-block">

                            <div class="user-name">

                                   {{ auth()->user()->name }}

                            </div>

                            <small>

                                {{ auth()->user()->email }}

                            </small>

                        </div>

                    </button>

                    <ul class="dropdown-menu dropdown-menu-end border-0 shadow-lg rounded-4">

                        <li>

                            <a
                                href="{{ url('/profile') }}"
                                class="dropdown-item">

                                <i class="bi bi-person-circle me-2"></i>

                                Profil

                            </a>

                        </li>

                        <li>

                            <a
                                href="{{ url('/history') }}"
                                class="dropdown-item">

                                <i class="bi bi-clock-history me-2"></i>

                                Riwayat

                            </a>

                        </li>

                        <li>

                            <hr class="dropdown-divider">

                        </li>

                        <li>

                            <form
                                action="{{ url('/logout') }}"
                                method="POST">

                                @csrf

                                <button
                                    class="dropdown-item text-danger">

                                    <i class="bi bi-box-arrow-right me-2"></i>

                                    Logout

                                </button>

                            </form>

                        </li>

                    </ul>

                </div>

            @endauth

            @guest

                <ul class="navbar-nav ms-auto align-items-lg-center">

                    <li class="nav-item">

                        <a
                            href="{{ url('/login') }}"
                            class="nav-link">

                            Login

                        </a>

                    </li>

                    <li class="nav-item ms-lg-3 mt-3 mt-lg-0">

                        <a
                            href="{{ url('/register') }}"
                            class="btn btn-success rounded-pill px-4">

                            <i class="bi bi-person-plus-fill me-2"></i>

                            Register

                        </a>

                    </li>

                </ul>

            @endguest

        </div>

    </div>

</nav>