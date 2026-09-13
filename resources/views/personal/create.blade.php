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
                                        alt="Image">
                                @else
                                    <img src="{{ asset('frontend/imgcandidate/user.png') }}" width="130" height="130"
                                        alt="Image">
                                @endif
                            </div>
                            <div class="content">
                                <h4 class="title">{{ auth()->user()->name }}</h4>
                                <ul class="info-list">
                                    <li><i class="icofont-location-pin"></i> {{ auth()->user()->address }}</li>
                                    <li><i class="icofont-phone"></i> {{ auth()->user()->phone }}</li>
                                </ul>
                            </div>
                        </div>
                        <div class="team-details-btn">
                            <a href="{{ route('user.profile.index') }}" class="btn-theme btn-light">
                                Back</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

 

    <!--About and Technical skill section ----->
    <section style="margin-top: -140px"class="profile-setting pb-5 ">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    @if ($errors->any())
                        @foreach ($errors->all() as $error )
                            <div class="alert alert-danger">{{ $error }}</div>
                        @endforeach
                    @endif
                    <!-- Form About me -->
                    <div class="card border-0 rounded-2">
                        <div class="card-header">
                            <div class="d-flex justify-content-between">
                                <span>About me</span> <span><a href="" class="btn btn-outline-success">Edit</a></span>
                            </div>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('personals.store') }}" method="POST">
                                @csrf
                                <div class="mb-3">
                                    <input type="text"  name="title" value="{{ old('title') }}" placeholder="Profession name" class="form-control" id="">
                                </div>
                                <div class="mb-3">
                                    <input type="text"  name="nationality" value="{{ old('nationality') }}" placeholder="Nationality" class="form-control" id="">
                                </div>
                                <div class="mb-3">
                                    <input type="text"  name="state" placeholder="State" value="{{ old('state') }}" class="form-control" id="">
                                </div>
                                <div class="mb-3">
                                    <input type="text"  name="language" placeholder="Language Spoken" value="{{ old('language') }}" class="form-control" id="">
                                </div>
                                <div class="mb-3">
                                    <textarea name="career_objective" class="form-control" placeholder="Career Objective" id="">{{ old('career_objective') }}</textarea>
                                </div>
                                <div class="mb-3">
                                    <button class="btn-theme">Create Data </button>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
               
            </div>
        </div>
    </section>

@endsection


