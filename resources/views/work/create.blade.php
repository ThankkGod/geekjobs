@extends('layout.app')
@section('title', 'Create work')
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
                        <div class="card-header">Work Experience </div>
                        <div class="card-body">
                            <!-- Form account Setting  -->
                            <form action="{{ route('works.store') }}" method="POST">
                                @csrf
                                <div class="mb-3">
                                    <input type="text" name="work_name" value="{{ old('work_name') }}"  id="" placeholder="Work Name"
                                        class="form-control">
                                </div>
                                <div class="mb-3">
                                    <input type="text" name="company_name" value="{{ old('company_name') }}" id="" placeholder="Company Name"
                                        class="form-control">
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="" class="form-label">Start Date</label>
                                            <input type="date" name="start_date" value="{{ old('start_date') }}" id="" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="" class="form-label">End Date</label>
                                            <input type="date" name="end_date" value="{{ old('end_date') }}" id="" class="form-control">
                                        </div>

                                    </div>
                                </div>
                                <div class="mb-3">
                                    <textarea name="work_description" class="form-control" placeholder="Work Description" id=""> {{ old('company_name') }} </textarea>
                                </div>
                                <div class="mb-3">
                                    <button type="submit" class="btn-theme">Create Work Experience</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
               
            </div>
        </div>
    </section>

@endsection


