@extends('layout.app')
@section('title', 'Candidate save jobs')
@section('content')
    <!--== Start Page Header Area Wrapper ==-->
    <div class="page-header-area sec-overlay sec-overlay-black" data-bg-img="assets/img/photos/bg2.jpg">
        <div class="container pt--0 pb--0">
            <div class="row">
                <div class="col-12">
                    <div class="page-header-content">
                        <h2 class="title">Saved Jobs</h2>
                        <nav class="breadcrumb-area">
                            <ul class="breadcrumb justify-content-center">
                                <li><a href="{{ route('home.index') }}">Home</a></li>
                                <li class="breadcrumb-sep">//</li>
                                <li>Saved Jobs</li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--== End Page Header Area Wrapper ==-->

    <section class="recent-job-area recent-job-inner-area">
        <div class="container">
            <div class="row">
                @forelse ($userSaveJobs as $userSaveJob)
                    <div class="col-md-6 col-lg-4">
                    <!--== Start Recent Job Item ==-->
                    <div class="recent-job-item recent-job-style2-item">
                        <div class="company-info">
                            <div class="logo">
                                <a href="company-details.html"><img src="{{ asset($userSaveJob->post->feature_image) }}" width="75"
                                        height="75" alt="Job Image"></a>
                            </div>
                            <div class="content">
                               @if($userSaveJob->post->status === 'available')
                                <span class="name badge bg-success text-white">{{ ucfirst($userSaveJob->post->status) }}</span>
                               @endif
                               @if($userSaveJob->post->status === 'expired')
                                <span class="name badge bg-danger text-white">{{ ucfirst($userSaveJob->post->status) }}</span>
                               @endif
                                <p class="address">{{ $userSaveJob->post->address }}</p>
                            </div>
                        </div>
                        <div class="main-content">
                                <h3 class="title"><a href="{{ route('show.post.index', $userSaveJob->post->slug ) }}">{{ $userSaveJob->post->title }}</a></h3>
                                <div class="d-flex justify-content-between">
                                    <span class="work-type">{{ $userSaveJob->post->job_type }}</span>
                                    <span  class="work-type">{{ $userSaveJob->post->experince_level }}</span>
                                </div>
                                <p class="desc">{{ Str::limit($userSaveJob->post->description, 50) }}</p>
                            </div>
                       
                       <div class="recent-job-info">
                                <div class="salary">
                                    <h4 class="fs-5">NGN {{ number_format($userSaveJob->post->salary) }} </h4>
                                    <p> /monthly</p>
                                </div>
                                <a class="btn-theme btn-sm text-white" href="{{ route('show.post.index', $userSaveJob->post->slug ) }}">Job details</a>
                            </div>
                            <a href="#!" class="btn btn-danger px-4 py-3" onclick="event.preventDefault(); if(confirm('Are you sure?')) document.getElementById('del-savejob{{ $userSaveJob->id }}').submit();">Remove Job</a>
                            <form id="del-savejob{{ $userSaveJob->id }}" action="{{ route('save.job.destroy', $userSaveJob->id ) }}" method="POST">
                                @csrf 
                                @method('DELETE')
                            </form>
                    </div>
                    <!--== End Recent Job Item ==-->
                </div>
                @empty
                    <p class="lead alert alert-danger text-center">You haven't Saved any job</p>
                @endforelse
                
            </div>
        </div>
    </section>

@endsection
