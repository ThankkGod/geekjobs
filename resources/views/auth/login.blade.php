@extends('layout.app')
@section('title', 'Login')
@section('content')


    <!--== Start Page Header Area Wrapper ==-->
    <div class="page-header-area sec-overlay sec-overlay-black" data-bg-img="assets/img/photos/bg2.jpg">
        <div class="container pt--0 pb--0">
            <div class="row">
                <div class="col-12">
                    <div class="page-header-content">
                        <h2 class="title">Login </h2>
                        <nav class="breadcrumb-area">
                            <ul class="breadcrumb justify-content-center">
                                <li><a href="{{ route('home.index') }}">Home</a></li>
                                <li class="breadcrumb-sep">//</li>
                                <li>Login</li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--== End Page Header Area Wrapper ==-->

    <!--== Start Login Area Wrapper ==-->
    <section class="account-login-area">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8 col-lg-7 col-xl-6">
                    <div class="login-register-form-wrap">
                        <div class="login-register-form">
                            <div class="form-title">
                                <h4 class="title">Login</h4>
                            </div>
                            <form action="{{ route('auth.login') }}" method="POST">
                                @csrf
                                <div class="row">

                                    <div class="col-12">
                                        <div class="form-group">
                                            <input class="form-control @error('email') is-invalid @enderror" type="email"
                                                name="email" value="{{ old('email') }}" placeholder="Email">
                                        </div>
                                        <span class="text-danger">
                                            @error('email')
                                                {{ $message }}
                                            @enderror
                                        </span>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <input class="form-control  @error('password') is-invalid @enderror"
                                                type="password" name="password" placeholder="Password">
                                        </div>
                                        <span class="text-danger">
                                            @error('password')
                                                {{ $message }}
                                            @enderror
                                        </span>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <div class="remember-forgot-info">
                                                <div class="remember">
                                                    <input class="form-check-input" type="checkbox" name="remember" value="{{ old('remember')?"checked":"" }}"
                                                        id="defaultCheck1">
                                                    <label class="form-check-label" for="defaultCheck1">Remember me</label>
                                                </div>
                                                <div class="forgot-password">
                                                    <a href="#/">Forgot Password?</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <button type="submit" class="btn-theme">Login</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <div class="login-register-form-info">
                                <p>Don't you have an account? <a href="{{ route('create.register') }}">Register</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--== End Login Area Wrapper ==-->

@endsection
