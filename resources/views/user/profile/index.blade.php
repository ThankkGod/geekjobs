@extends('layout.app')
@section('title', 'Candidate profile')
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

    <!--== Start Team Details Area Wrapper ==-->
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
                            <a href="{{ route('candidate.profile.setting') }}" class="btn-theme btn-light">Account
                                Settings</a>
                            {{-- <button type="button" class="btn-theme">Download Resume</button> --}}
                        </div>
                    </div>
                </div>
            </div>

            <section class="education-detail">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="card rounded-4 border-0">
                                <div class="card-header">
                                    <div class="d-flex justify-content-between">
                                        <span> About Candidate</span>
                                        <div><span><a href="{{ route('personals.index') }}"
                                                    class="btn btn-outline-success">View</a> </span>
                                            @if ($created)
                                            @else
                                                <span><a href="{{ route('personals.create') }}"
                                                        class="btn btn-outline-success">Create</a></span>
                                            @endif
                                        </div>


                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="">
                                        @forelse ($personals as $personal)
                                            <div class="mt-0">Profession Name: {{ $personal->profession_name }}</d>
                                                <div class="mt-0">Nationality: {{ $personal->nationality }}</div>
                                                <div class="mt-0">State: {{ $personal->state }}</div>
                                                <div class="mt-0">Language: {{ $personal->state }}</div>
                                                <p class="desc">Career Objective: {{ $personal->career_objective }}</p>
                                            @empty
                                                <p class=" text-danger">Create your personal details</p>
                                        @endforelse
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card rounded-4 border-0">
                            <div class="card-header">
                                <div class="d-flex justify-content-between">
                                    <span> Education</span>
                                    <div><span><a href="{{ route('educations.index') }}"
                                                class="btn btn-outline-success">View
                                                all</a></span>
                                        <span><a href="{{ route('educations.create') }}"
                                                class="btn btn-outline-success">Create</a></span>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="">
                                    @forelse ($educations as $education)
                                        <div class="mt-0">Certificate Name: {{ $education->certificate_name }}</d>
                                            <div class="mt-0">School Name: {{ $education->school_name }}</div>
                                            <div class="mt-0">School Location: {{ $education->school_location }}</div>
                                            <div class="mt-0">Graduation year: {{ $education->graduation_year }}</div>
                                            <hr>
                                        @empty
                                            <p class=" text-danger">Create your educational details</p>
                                    @endforelse
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
        </div>
    </section>


    <section class="work-detail" style="margin-top: -150px">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="card rounded-4 border-0">
                        <div class="card-header">
                            <div class="d-flex justify-content-between">
                                <span> Work Experience</span>
                                <div><span><a href="{{ route('works.index') }}" class="btn btn-outline-success">View</a>
                                    </span>
                                    @if ($created)
                                    @else
                                        <span><a href="{{ route('works.create') }}"
                                                class="btn btn-outline-success">Create</a></span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="">
                                @forelse ($works as $work)
                                    <div class="mt-0">Work Name: {{ $work->work_name }}</d>
                                        <div class="mt-0">Company Name: {{ $work->company_name }}</div>
                                        <div class="mt-0">Work Start Date: {{ $work->start_date }}</div>
                                        <div class="mt-0">Work End Date: {{ $work->end_date }}</div>
                                        <p class="desc">Work Responsibilities: {{ $work->work_description }}</p>
                                        <hr>
                                    @empty
                                        <p class=" text-danger">Create your work experience</p>
                                @endforelse
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{-- <div class="col-md-6">
                        <div class="card rounded-4 border-0">
                            <div class="card-header">
                                <div class="d-flex justify-content-between">
                                    <span> Education</span>
                                    <div><span><a href="{{ route('educations.index') }}"
                                                class="btn btn-outline-success">View
                                                all</a></span>
                                        <span><a href="{{ route('educations.create') }}"
                                                class="btn btn-outline-success">Create</a></span>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="">
                                    @forelse ($educations as $education)
                                        <div class="mt-0">Certificate Name: {{ $education->certificate_name }}</d>
                                            <div class="mt-0">School Name: {{ $education->school_name }}</div>
                                            <div class="mt-0">School Location: {{ $education->school_location }}</div>
                                            <div class="mt-0 mb-3">Graduation year: {{ $education->graduation_year }}</div>
                                            <hr>
                                        @empty
                                            <p class=" text-danger">Create your educational details</p>
                                    @endforelse
                                </div>
                            </div>
                        </div>
                    </div>
                </div> --}}
        </div>
        </div>
    </section>



@endsection
