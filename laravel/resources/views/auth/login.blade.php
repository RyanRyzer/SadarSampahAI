@extends('layouts.app')

@section('title','Login')

@section('content')

<div class="row justify-content-center">

    <div class="col-md-5 col-lg-4">

        <div class="card shadow">

            <div class="card-body p-4">

                <div class="text-center mb-4">

                    <h2 class="text-success">

                        ♻️ Sadar Sampah AI

                    </h2>

                    <p class="text-muted">

                        Masuk ke akun Anda

                    </p>

                </div>

                @if(session('success'))

                    <div class="alert alert-success">

                        {{ session('success') }}

                    </div>

                @endif

                @if($errors->any())

                    <div class="alert alert-danger">

                        {{ $errors->first() }}

                    </div>

                @endif

                <form method="POST" action="/login">

                    @csrf

                    <div class="mb-3">

                        <label>Email</label>

                        <input
                            type="email"
                            name="email"
                            class="form-control"
                            required>

                    </div>

                    <div class="mb-4">

                        <label>Password</label>

                        <input
                            type="password"
                            name="password"
                            class="form-control"
                            required>

                    </div>

                    <button class="btn btn-success w-100">

                        Login

                    </button>

                </form>

                <hr>

                <div class="text-center">

                    Belum punya akun?

                    <a href="/register">

                        Daftar

                    </a>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection