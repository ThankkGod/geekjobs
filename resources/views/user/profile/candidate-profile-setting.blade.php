@extends('layout.app')
@section('title')
@section('content')

    <!--== Start Page Header Area Wrapper ==-->
    <div class="page-header-area sec-overlay sec-overlay-black" data-bg-img="assets/img/photos/bg2.jpg">
        <div class="container pt--0 pb--0">
            <div class="row">
                <div class="col-12">
                    <div class="page-header-content">
                        <h2 class="title">{{ auth()->user()->name }} Details</h2>
                        <nav class="breadcrumb-area">
                            <ul class="breadcrumb justify-content-center">
                                <li><a href="{{ route('home.index') }}">Home</a></li>
                                <li class="breadcrumb-sep">//</li>
                                <li>{{ auth()->user()->name }} Details</li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--== End Page Header Area Wrapper ==-->

    <section class="team-details-area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="team-details-wrap">
                        <div class="team-details-info">
                            <div class="thumb">
                                @if (auth()->user()->profile_pic)
                                    <img src="{{ asset(auth()->user()->profile_pic) }}" width="130" height="130"
                                        alt="Image-HasTech">
                                @else
                                    <img src="{{ asset('frontend/imgcandidate/user.png') }}" width="130" height="130"
                                        alt="Image-HasTech">
                                @endif
                            </div>
                            <div class="content">
                                <h4 class="title">{{ auth()->user()->name }}</h4>
                                <ul class="info-list">
                                    <li><i class="icofont-location-pin"></i> {{ auth()->user()->name }}</li>
                                    <li><i class="icofont-phone"></i> {{ auth()->user()->phone }}</li>
                                </ul>
                            </div>
                        </div>
                        <div class="team-details-btn">
                            <a href="{{ route('user.profile.index') }}" class="btn-theme btn-light">
                                Back</a>
                           @if (auth()->user()->resume)
                            <a href="{{ asset(auth()->user()->resume) }}" target="_blank" class="btn-theme">Download Resume</a>
                               @else
                               <p class="text-danger">You need to upload your resume / cv</p>
                           @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section style="margin-top: -100px"class="profile-setting pb-5 ">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <!-- Form account Setting  -->
                    <div class="card border-0 rounded-3 mb-5">
                        <div class="card-header">Account Settings</div>
                        <div class="card-body">
                            <form action="{{ route('candidate.profile.update') }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="mb-3">
                                    <label for="" class="form-label">Candidate Name</label>
                                    <input type="text" name="name" value="{{ old('name', auth()->user()->name)}}" id=""
                                        class="form-control @error('name') is-invalid @enderror">  
                                        @error('name')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror

                                </div>
                                <div class="mb-3">
                                    <label for="" class="form-label">Candidate Email</label>
                                    <input type="text" name="email" value="{{ auth()->user()->email }}" id=""
                                        class="form-control @error('email') is-invalid @enderror">
                                          @error('email')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="" class="form-label">Candidate Phone</label>
                                    <input type="text" name="phone" value="{{ auth()->user()->phone }}" id=""
                                        class="form-control @error('phone') is-invalid @enderror">
                                          @error('phone')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="" class="form-label">Candidate Address</label>
                                    <input type="text" name="address" value="{{ auth()->user()->address }}"
                                        id="" class="form-control @error('address') is-invalid @enderror">
                                          @error('address')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="" class="form-label">Candidate Profile picture</label>
                                    <input type="file" name="profile_pic" id="" class="form-control @error('address') is-invalid @enderror">
                                      @error('profile_pic')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <button class="btn-theme">Update Profile</button>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card border-0 rounded-3 mb-5">
                        <div class="card-header">Change password</div>
                        <div class="card-body">
                            <!-- Form password Setting  -->
                            <form action="{{ route('candidate.change.password') }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="mb-3">
                                    <label for="" class="form-label">Current Password</label>
                                    <input type="password" name="current_password" id="current_password"
                                        class="form-control @error('current_password') is-invalid @enderror">
                                    @error('current_password')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="" class="form-label">New Password</label>
                                    <input type="password" name="password" id="password"
                                        class="form-control @error('password') is-invalid @enderror">
                                    @error('password')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="" class="form-label">Re-type Password </label>
                                    <input type="password" name="password_confirmation" id="password_confirmation"
                                        class="form-control @error('password_confirmation') is-invalid @enderror">
                                    @error('password_confirmation')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                                <label for="" class="form-label">
                                    <input type="checkbox" name="" onclick="togglePassword()" id=""
                                        class="form-check-input bg-success">
                                    Show Password
                                </label>
                                <div class="mb-3">
                                    <button class="btn-theme">Change Password </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section style="margin-top:-200px;" class="upload-cv-resume">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="text-container">
                        <h2 class="fw-semibold">Upload CV/Resume</h2>
                        <!--- Form cv uploads -->
                        <form action="{{ route('resume.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <div class="input-group">
                                    <input type="file" name="resume" id="" class="form-control @error('resume') is-invalid @enderror">
                                    <button type="submit" class="btn btn-success">Upload</button>
                                    @error('resume')
                                    <span class="invalid-feedback">{{ $message}}</span>
                                    @enderror
                                </div>
                            </div>
                        </form>
                        
                    </div>
                </div>
            </div>
        </div>
    </section>


@endsection

<script>
    function togglePassword() {
        let current_password = document.getElementById('current_password');
        let password = document.getElementById('password');
        let password_confirmation = document.getElementById('password_confirmation');

        current_password.type = current_password.type === 'password' ? 'text' : 'password';
        password.type = password.type === 'password' ? 'text' : 'password';
        password_confirmation.type = password_confirmation.type === 'password' ? 'text' : 'password';
    }
</script>
