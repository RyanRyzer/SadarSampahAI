@extends('layouts.app')

@section('title','Register')

@section('content')

<div class="row justify-content-center">

    <div class="col-md-6 col-lg-5">

        <div class="card shadow">

            <div class="card-body p-4">

                <div class="text-center mb-4">

                    <h2 class="text-success">

                        ♻️ Sadar Sampah AI

                    </h2>

                    <p class="text-muted">

                        Buat akun baru

                    </p>

                </div>

                @if($errors->any())

                    <div class="alert alert-danger">

                        {{ $errors->first() }}

                    </div>

                @endif

                <form method="POST" action="/register">

                    @csrf

                    <div class="mb-3">

                        <label>Nama</label>

                        <input
                            type="text"
                            name="name"
                            class="form-control"
                            required>

                    </div>

                    <div class="mb-3">

                        <label>Email</label>

                        <input
                            type="email"
                            name="email"
                            class="form-control"
                            required>

                    </div>

                    <div class="mb-3">

                        <label>Password</label>

                        <input
                            type="password"
                            name="password"
                            class="form-control"
                            required>

                    </div>

                    <div class="mb-4">

                        <label>Konfirmasi Password</label>

                        <input
                            type="password"
                            name="password_confirmation"
                            class="form-control"
                            required>

                    </div>

                    <button class="btn btn-success w-100">

                        Daftar

                    </button>

                </form>

                <hr>

                <div class="text-center">

                    Sudah punya akun?

                    <a href="/login">

                        Login

                    </a>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection