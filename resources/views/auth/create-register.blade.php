@extends('layout.app')
@section('title', 'Create Account')
@section('content')

    <!--== Start Page Header Area Wrapper ==-->
    <div class="page-header-area sec-overlay sec-overlay-black" data-bg-img="assets/img/photos/bg2.jpg">
        <div class="container pt--0 pb--0">
            <div class="row">
                <div class="col-12">
                    <div class="page-header-content">
                        <h2 class="title">Register </h2>
                        <nav class="breadcrumb-area">
                            <ul class="breadcrumb justify-content-center">
                                <li><a href="{{ route('home.index') }}">Home</a></li>
                                <li class="breadcrumb-sep">//</li>
                                <li>Registration</li>
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
                <div class="col-md-10 col-lg-7 col-xl-6">
                    @include('inc.message')
                    <div class="login-register-form-wrap register-form-wrap">
                        <div class="login-register-form">
                            <div class="form-title">
                                <h4 class="title">Register Now</h4>
                            </div>
                            <ul class="nav nav-pills" id="pills-tab" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link active" id="candidate-tab" data-bs-toggle="pill"
                                        data-bs-target="#candidate" type="button" role="tab" aria-controls="candidate"
                                        aria-selected="true"><i class="icofont-businessman"></i> Candidate</button>
                                </li>
                            </ul>
                            <div class="tab-content" id="pills-tabContent">
                                <div class="tab-pane fade show active" id="candidate" role="tabpanel"
                                    aria-labelledby="candidate-tab">
                                    <form action="{{ route('auth.candidate.store') }}" method="POST">
                                        @csrf
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <input class="form-control @error('name') is-invalid @enderror"
                                                        type="text" name="name" value="{{ old('name') }}"
                                                        placeholder="Full Name">
                                                </div>
                                                <span class="text-danger">
                                                    @error('name')
                                                        {{ $message }}
                                                    @enderror
                                                </span>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <input class="form-control @error('email') is-invalid @enderror"
                                                        type="email" name="email" value="{{ old('email') }}"
                                                        placeholder="Email">
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
                                                    <input
                                                        class="form-control  @error('password_confirmation') is-invalid @enderror"
                                                        type="password" name="password_confirmation"
                                                        placeholder="Confirm Password">
                                                </div>
                                                <span class="text-danger">
                                                    @error('password_confirmation')
                                                        {{ $message }}
                                                    @enderror
                                                </span>
                                            </div>
                                            {{-- <div class="col-12">
                          <div class="form-group">
                            <div class="remember-forgot-info">
                              <div class="remember">
                                <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                                <label class="form-check-label" for="defaultCheck1">Accept our terms and conditions and privacy policy.</label>
                              </div>
                            </div>
                          </div>
                        </div> --}}
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <button type="submit" class="btn-theme">Register Now</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="">
                                <p>Already have an account? <a href="{{ route('login') }}">Login</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--== End Login Area Wrapper ==-->

@endsection
