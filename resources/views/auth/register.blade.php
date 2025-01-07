@extends('layouts.app')

@section('content')
<section class="text-center text-lg-start" style="background-color: #BFBFBF">
    <style>
        .cascading-right {
            margin-right: -50px;
        }

        @media (max-width: 991.98px) {
            .cascading-right {
                margin-right: 0;
            }
        }
    </style>

    <div class="container py-4">
        <div class="row g-0 align-items-center">
            <div class="col-lg-6 mb-5 mb-lg-0">
                <div class="card cascading-right bg-body-tertiary" style="backdrop-filter: blur(30px);">
                    <div class="card-body p-5 shadow-50 text-center">
                        <h2 class="fw-bold mb-5">Sign up now</h2>
                        <form method="POST" action="{{ route('register') }}">
                            @csrf

                            <div class="row">
                                <div class="col-md-6 mb-4">
                                    <div class="form-outline">
                                        <input id="username" type="text" placeholder="Username"
                                            class="form-control @error('username') is-invalid @enderror"
                                            name="username" value="{{ old('username') }}" required />
                                        @error('username')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6 mb-4">
                                    <div class="form-outline">
                                        <input id="name" type="text" placeholder="Full Name"
                                            class="form-control @error('name') is-invalid @enderror" name="name"
                                            value="{{ old('name') }}" required />
                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="form-outline mb-4">
                                <select id="role" class="form-control @error('role') is-invalid @enderror" name="role"
                                    required>
                                    <option value="">-Pilih Role-</option>
                                    <option value="admin" {{ old('role') == 'admin' ? 'selected' : '' }}>Admin</option>
                                    <option value="staff" {{ old('role') == 'staff' ? 'selected' : '' }}>Staff</option>
                                </select>
                                @error('role')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-outline mb-4">
                                <input id="no_telepon" type="text" placeholder="Nomor Telepon"
                                    class="form-control @error('no_telepon') is-invalid @enderror" name="no_telepon"
                                    value="{{ old('no_telepon') }}" required />
                                @error('no_telepon')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-outline mb-4">
                                <input id="email" type="email" placeholder="Email Address"
                                    class="form-control @error('email') is-invalid @enderror" name="email"
                                    value="{{ old('email') }}" required />
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-outline mb-4">
                                <input id="password" type="password" placeholder="Password"
                                    class="form-control @error('password') is-invalid @enderror" name="password"
                                    required />
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-outline mb-4">
                                <input id="password-confirm" type="password" placeholder="Confirm Password"
                                    class="form-control" name="password_confirmation" required />
                            </div>

                            <button type="submit" class="btn btn-primary btn-block mb-4">Sign up</button>

                        </form>
                        <p class="mb-5 pb-lg-2 font-weight-bold" style="color: black;">Has have an Account? <a href="{{ route('login') }}"
                            style="color: #393f81; text-decoration: none; font-weight: bold" >Login</a></p>
                    </div>
                </div>
            </div>

            <div class="col-lg-6 mb-5 mb-lg-0">
                <img src="/img/regis.jpg" class="w-100 rounded-4 shadow-4" alt=""
                style="height: 98vh"/>
            </div>
        </div>
    </div>
</section>
@endsection

@php
$hideNavbar = true;
@endphp
