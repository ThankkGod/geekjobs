@extends('layout.app')
@section('title', 'Home')
@section('content')


    <!--== Start Page Header Area Wrapper ==-->
    <div class="page-header-area sec-overlay sec-overlay-black" data-bg-img="assets/img/photos/bg2.jpg">
        <div class="container pt--0 pb--0">
            <div class="row">
                <div class="col-12">
                    <div class="page-header-content">
                        <h2 class="title text-capitalize">{{ $post->title }} Job Details</h2>
                        <nav class="breadcrumb-area">
                            <ul class="breadcrumb justify-content-center">
                                <li><a href="{{ route('home.index') }}">Home</a></li>
                                <li class="breadcrumb-sep">//</li>
                                <li class="text-capitalize">{{ $post->title }} job</li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--== End Page Header Area Wrapper ==-->


    <!--== Start Job Details Area Wrapper ==-->
    <section class="job-details-area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="job-details-wrap">
                        <div class="job-details-info">
                            <div class="thumb">
                                <img src="{{ asset($post->user->profile_pic) }}" width="130" height="130"
                                    alt="Image-HasTech">
                            </div>
                            <div class="content">
                                <h4 class="title">{{ $post->title }}</h4>
                                <h5 class="sub-title">{{ $post->user->name }}</h5>
                                <ul class="info-list">
                                    <li><i class="icofont-location-pin"></i> {{ $post->user->address }}</li>
                                    {{-- <li><i class="icofont-phone"></i> +88 456 796 457</li> --}}
                                </ul>
                            </div>
                        </div>
                        <div class="job-details-price">
                            <h4 class="title">NGN {{ number_format($post->salary) }} <span>/monthly</span></h4>
                            @if (auth()->check())
                                @if ($alreadyApplied > 0)
                                    <div class="alert alert-danger text-center"> Already Applied</div>
                                @else
                                    @if ($post->status === 'expired')
                                        <div class="alert alert-danger">Job Expired Can't Apply to it</div>
                                    @else
                                        <form action="{{ route('applicant.apply', $post->slug) }}" method="POST">
                                            @csrf
                                            <button type="submit" class="btn-theme">
                                                Apply Now
                                            </button>
                                        </form>
                                    @endif

                                @endif
                            @else
                                <p class="lead text-danger">Please login to apply</p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-7 col-xl-8">
                    <div class="job-details-item">
                        <div class="content">
                            <div>
                                <img src="{{ asset($post->feature_image) }}" width="600" alt=""
                                    class="img-fluid mb-3 rounded-4">
                            </div>
                            <h4 class="title">Job Description</h4>
                            <p class="desc">{!! $post->description !!}</p>
                            {{-- <p class="desc">It is a long established fa$post->descriptionct that a reader will be distracted the readable content of a page when looking atits layout. The point of using is that has more-or-less normal a distribution of letters, as opposed to usin content publishing packages web page editors.</p> --}}
                        </div>
                        <div class="content">
                            <h4 class="title">Responsibilities</h4>
                            <ul class="job-details-list">
                                <li><i class="icofont-check"></i> {!! $post->responsibilities !!}</li>

                            </ul>
                        </div>
                        <div class="content">
                            <h4 class="title">Requirements</h4>
                            <ul class="job-details-list">
                                <li><i class="icofont-check"></i>
                                    {!! $post->requirement !!}
                                </li>

                            </ul>
                        </div>

                    </div>
                </div>
                <div class="col-lg-5 col-xl-4">
                    <div class="job-sidebar">
                        <div class="widget-item">
                            <div class="widget-title">
                                <h3 class="title">Summary</h3>
                            </div>
                            <div class="summery-info">
                                <table class="table">
                                    <tbody>
                                        <tr>
                                            <td class="table-name">Job Type</td>
                                            <td class="dotted">:</td>
                                            <td data-text-color="#03a84e text-capitalize">{{ $post->job_type }}</td>
                                        </tr>
                                        <tr>
                                            <td class="table-name">Category</td>
                                            <td class="dotted">:</td>

                                            <td>{{ $post->category->name }}</td>
                                        </tr>
                                        <tr>
                                            <td class="table-name">Posted</td>
                                            <td class="dotted">:</td>
                                            <td>{{ Carbon\Carbon::parse($post->created_at)->diffForHumans() }}</td>
                                        </tr>
                                        <tr>
                                            <td class="table-name">Job Status</td>
                                            <td class="dotted">:</td>
                                            <td>{{ Str::ucfirst($post->status) }}</td>
                                        </tr>
                                        <tr>
                                            <td class="table-name">Salary</td>
                                            <td class="dotted">:</td>
                                            <td>NGN {{ number_format($post->salary) }} / Monthly</td>
                                        </tr>
                                        <tr>
                                            <td class="table-name">Experience</td>
                                            <td class="dotted">:</td>
                                            <td> {{ $post->experince_level }}</td>
                                        </tr>
                                        <tr>
                                            <td class="table-name">Job Gender Requirement</td>
                                            <td class="dotted">:</td>
                                            <td>{{ Str::ucfirst($post->gender) }}</td>
                                        </tr>
                                        <tr>
                                            <td class="table-name">Applied</td>
                                            <td class="dotted">:</td>
                                            <td>{{ $totalNumberApplicant }} Applicants</td>
                                        </tr>
                                        <tr>
                                            <td class="table-name">Application Deadline</td>
                                            <td class="dotted">:</td>
                                            <td data-text-color="#ff6000">
                                                {{ Carbon\Carbon::Parse($post->application_deadline)->format('d-m-Y') }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                @if (auth()->check())
                                                    @if ($isExpired)
                                                        <div class="alert alert-danger">Can't save Expired job</div>
                                                    
                                                        @elseif ($savedjob)
                                                            <div class="alert alert-danger">You have saved this job</div>
                                                        @else
                                                            <form action="{{ route('save.job.create', $post->slug) }}"
                                                                method="POST">
                                                                @csrf
                                                                <input type="hidden" value="{{ $post->id }}"
                                                                    name="post_id" id="">
                                                                <input type="hidden" value="{{ $post->user_id }}"
                                                                    name="user_id" id="">
                                                                <button class="btn btn-success px-4 py-2">Save job</button>
                                                            </form>
                                                    @endif
                                                @endif


                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--== End Job Details Area Wrapper ==-->
    </main>

@endsection
