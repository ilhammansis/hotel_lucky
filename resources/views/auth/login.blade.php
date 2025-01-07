@extends('layouts.app')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
@section('content')
<section class="vh-100" style="background-color: #BFBFBF; height:100vh">
    <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col col-xl-10">
                <div class="card" style="border-radius: 1rem;">
                    <div class="row g-0">
                        <div class="col-md- col-lg-5 d-none d-md-block">
                            <img src="/img/image.avif"
                                alt="login form" class="img-fluid" style="border-radius: 1rem 0 0 1rem; height:93vh" />
                        </div>
                        <div class="col-md-6 col-lg-7 d-flex align-items-center">
                            <div class="card-body p-4 p-lg-5 text-black">
                                <form method="POST" action="{{ route('login') }}">
                                    @csrf
                                    <div class="d-flex align-items-center mb-3 pb-1">
                                        <i class="fas fa-cubes fa-2x me-3" style="color: #ff6219;"></i>
                                        <img src="/img/icon.png" alt="" style="height: 100px">
                                    </div>
                                    <h5 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Sign into your account</h5>
                                    <div class="form-outline mb-4">
                                        <input id="email" type="email" class="form-control form-control-lg @error('email') is-invalid @enderror"
                                            name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                        <label class="form-label" for="email">Email address</label>
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-outline mb-4">
                                        <input id="password" type="password" class="form-control form-control-lg @error('password') is-invalid @enderror"
                                            name="password" required autocomplete="current-password">
                                        <label class="form-label" for="password">Password</label>
                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="pt-1 mb-4">
                                        <button class="btn btn-dark btn-lg btn-block" type="submit">Login</button>
                                    </div>
                                    <a class="small text-muted" href="{{ route('password.request') }}" style="text-decoration: none">Forgot password?</a>
                                    <p class="mb-5 pb-lg-2 font-weight-bold" style="color: black;">Don't have an account? <a href="{{ route('register') }}"
                                            style="color: #393f81; text-decoration:none; font-weight: bold;">Register here</a></p>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
@php
    $hideNavbar = true;
@endphp
