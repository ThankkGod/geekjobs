@extends('layout.app')
@section('title', 'Home')
@section('content')
    <!--== Start Hero Area Wrapper ==-->
    <section class="home-slider-area">
        {{ dd($galleries->pluck('gallery_image')) }}
            <div class="home-slider-container default-slider-container">
                <div class="home-slider-wrapper slider-default">
                    <div class="slider-content-area" data-bg-img="{{ asset($gallery->gallery_image) }}">
                        <div class="container pt--0 pb--0">
                            <div class="slider-container">
                                <div class="row justify-content-center align-items-center">
                                    <div class="col-12 col-lg-8">

                                        <div class="slider-content">
                                            <h2 class="title"><span class="counter"
                                                    data-counterup-delay="80">{{ $jobsCount }}</span> jobs
                                                available <br>{{ $gallery->gallery_title }}</h2>
                                            <p class="desc">{{ $gallery->gallery_description }}</p>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="job-search-wrap">
                                            <div class="job-search-form">
                                                <form action="{{ route('home.index') }}" method="GET">
                                                    <div class="row row-gutter-10">
                                                        <div class="col-lg-auto col-sm-6 col-12 flex-grow-1">
                                                            <div class="form-group">
                                                                <input type="text" name="search" class="form-control"
                                                                    placeholder="Job title or keywords">
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-auto col-sm-6 col-12 flex-grow-1">
                                                            <div class="form-group">
                                                                <button type="submit" class="btn-form-search"><i
                                                                        class="icofont-search-1"></i></button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        @endforeach
        <div class="container pt--0 pb--0">
            <div class="row">
                <div class="col-12">
                    <div class="play-video-btn">
                        <a href="https://www.youtube.com/mcvqOUtcAJg" class="video-popup">
                            <img src="{{ asset('frontend/assets/img/icons/play.png') }}" alt="Image-HasTech">
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="home-slider-shape">
            <img class="shape1" data-aos="fade-down" data-aos-duration="1500"
                src="{{ asset('frontend/assets/img/slider/vector1.png') }}" width="270" height="234"
                alt="Image-HasTech">
            <img class="shape2" data-aos="fade-left" data-aos-duration="2000"
                src="{{ asset('frontend/assets/img/slider/vector2.png') }}" width="201" height="346"
                alt="Image-HasTech">
            <img class="shape3" data-aos="fade-right" data-aos-duration="2000"
                src="{{ asset('frontend/assets/img/slider/vector3.png') }}" width="276" height="432"
                alt="Image-HasTech">
            <img class="shape4" data-aos="flip-left" data-aos-duration="1500"
                src="{{ asset('frontend/assets/img/slider/vector4.png') }}" width="127" height="121"
                alt="Image-HasTech">
        </div>
    </section>
    <!--== End Hero Area Wrapper ==-->

    <!--== Start search Job Area Wrapper ==-->
    {{-- <section class="recent-job-area bg-color-gray">
        <div class="container" data-aos="fade-down">
            <div class="row">
                <div class="col-12">
                    <div class="section-title text-center">
                        <h3 class="title">Recent Job Circulars</h3>
                        <div class="desc">
                            <p>Many desktop publishing packages and web page editors</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach ($jobsSearches as $jobsSearch)
                    <div class="col-md-6 col-lg-4">
                        <!--== Start Recent Job Item ==-->
                        <div class="recent-job-item">
                            <div class="company-info">
                                <div class="logo">
                                    <a href="#!"><img src="{{ asset($jobsSearch->user->profile_pic) }}" width="75"
                                            height="75" alt="Job Image"></a>
                                </div>
                                <div class="content">
                                    <h4 class="name"><a href="#!">{{ $jobsSearch->user->name }}</a></h4>
                                    <p class="address">{{ $job->loaction }}</p>
                                </div>
                            </div>
                            <div class="main-content">
                                <h3 class="title"><a
                                        href="{{ route('show.post.index', $job->slug) }}">{{ $job->title }}</a></h3>
                                <div class="d-flex justify-content-between">
                                    <span class="work-type">{{ $job->job_type }}</span>
                                    <span class="work-type">{{ $job->experince_level }}</span>
                                </div>
                                <p class="desc">{{ Str::limit($job->description, 50) }}</p>
                            </div>
                            <div class="d-flex justify-content-between my-2 ">
                                @if ($job->status === 'available')
                                    <span class="badge bg-success py-2">{{ ucfirst($job->status) }}</span>
                                @endif
                                @if ($job->status === 'expired')
                                    <span class="badge bg-danger py-2">{{ ucfirst($job->status) }}</span>
                                @endif
                                <span class="badge bg-secondary py-2">Vacant {{ $job->vacancy }}</span>
                            </div>
                            <div class="recent-job-info">
                                <div class="salary">
                                    <h4 class="fs-5">NGN {{ number_format($job->salary) }} </h4>
                                    <p> /monthly</p>
                                </div>
                                <a class="btn-theme btn-sm" href="{{ route('show.post.index', $job->slug) }}">Apply
                                    Now</a>
                            </div>
                        </div>
                        <!--== End Recent Job Item ==-->
                    </div>
                @endforeach
            </div>
        </div>
    </section> --}}
    <!--== End search Job Area Wrapper ==-->



    <!--== Start Job Category Area Wrapper ==-->
    <section class="job-category-area">
        <div class="container" data-aos="fade-down">
            <div class="row">
                <div class="col-12">
                    <div class="section-title text-center">
                        <h3 class="title">Popular Category</h3>
                        <div class="desc">
                            <p>Many desktop publishing packages and web page editors</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row row-gutter-20">
                @forelse ($categories as $category)
                    <div class="col-sm-6 col-lg-3">
                        <!--== Start Job Category Item ==-->

                        <div class="job-category-item">
                            <div class="content">
                                <h3 class="title"><a
                                        href="{{ route('jobs.category', $category->slug) }}">{{ $category->name }}<span>({{ $category->posts->count() }})</span></a>
                                </h3>
                            </div>
                            <a class="overlay-link" href="{{ route('jobs.category', $category->slug) }}"></a>
                        </div>
                        <!--== End Job Category Item ==-->
                    </div>
                @empty
                @endforelse
            </div>
        </div>
    </section>
    <!--== End Job Category Area Wrapper ==-->

    <!--== Start Recent Job Area Wrapper ==-->
    <section class="recent-job-area bg-color-gray">
        <div class="container" data-aos="fade-down">
            <div class="row">
                <div class="col-12">
                    <div class="section-title text-center">
                        <h3 class="title">Recent Jobs</h3>
                        <div class="desc">
                            <p>Many desktop publishing packages and web page editors</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach ($jobs as $job)
                    <div class="col-md-6 col-lg-4">
                        <!--== Start Recent Job Item ==-->
                        <div class="recent-job-item">
                            <div class="company-info">
                                <div class="logo">
                                    <a href="#!"><img src="{{ asset($job->user->profile_pic) }}" width="75"
                                            height="75" alt="Job Image"></a>
                                </div>
                                <div class="content">
                                    <h4 class="name"><a href="#!">{{ $job->user->name }}</a></h4>
                                    <p class="address">{{ $job->loaction }}</p>
                                </div>
                            </div>
                            <div class="main-content">
                                <h3 class="title"><a
                                        href="{{ route('show.post.index', $job->slug) }}">{{ $job->title }}</a></h3>
                                <div class="d-flex justify-content-between">
                                    <span class="work-type">{{ $job->job_type }}</span>
                                    <span class="work-type">{{ $job->experince_level }}</span>
                                </div>
                                <p class="desc">{{ Str::limit($job->description, 50) }}</p>
                            </div>
                            <div class="d-flex justify-content-between my-2 ">
                                @if ($job->status === 'available')
                                    <span class="badge bg-success py-2">{{ ucfirst($job->status) }}</span>
                                @endif
                                @if ($job->status === 'expired')
                                    <span class="badge bg-danger py-2">{{ ucfirst($job->status) }}</span>
                                @endif
                                <span class="badge bg-secondary py-2">Vacant {{ $job->vacancy }}</span>
                            </div>
                            <div class="recent-job-info">
                                <div class="salary">
                                    <h4 class="fs-5">NGN {{ number_format($job->salary) }} </h4>
                                    <p> /monthly</p>
                                </div>
                                <a class="btn-theme btn-sm" href="{{ route('show.post.index', $job->slug) }}">Apply
                                    Now</a>
                            </div>
                        </div>
                        <!--== End Recent Job Item ==-->
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <!--== End Recent Job Area Wrapper ==-->


    <!--== Start Work Process Area Wrapper ==-->
    <section class="work-process-area">
        <div class="container" data-aos="fade-down">
            <div class="row">
                <div class="col-12">
                    <div class="section-title text-center">
                        <h3 class="title">How It Work?</h3>
                        <div class="desc">
                            <p>Many desktop publishing packages and web page editors</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="working-process-content-wrap">
                        <div class="working-col">
                            <!--== Start Work Process ==-->
                            <div class="working-process-item">
                                <div class="icon-box">
                                    <div class="inner">
                                        <img class="icon-img"
                                            src="{{ asset('frontend/assets/img/icons/w1.png"') }} alt="Image-HasTech">
                                        <img class="icon-hover"
                                            src="{{ asset('frontend/assets/img/icons/w1-hover.png') }}"
                                            alt="Image-HasTech">
                                    </div>
                                </div>
                                <div class="content">
                                    <h4 class="title">Create an Account</h4>
                                    <p class="desc">It is long established fact reader distracted readable content</p>
                                </div>
                                <div class="shape-arrow-icon">
                                    <img class="shape-icon"
                                        src="{{ asset('frontend/assets/img/icons/right-arrow.png') }}"
                                        alt="Image-HasTech">
                                    <img class="shape-icon-hover"
                                        src="{{ asset('frontend/assets/img/icons/right-arrow2.png') }}"
                                        alt="Image-HasTech">
                                </div>
                            </div>
                            <!--== End Work Process ==-->
                        </div>
                        <div class="working-col">
                            <!--== Start Work Process ==-->
                            <div class="working-process-item">
                                <div class="icon-box">
                                    <div class="inner">
                                        <img class="icon-img"
                                            src="{{ asset('frontend/assets/img/icons/w2.png"') }} alt="Image-HasTech">
                                        <img class="icon-hover"
                                            src="{{ asset('frontend/assets/img/icons/w2-hover.png') }}"
                                            alt="Image-HasTech">
                                    </div>
                                </div>
                                <div class="content">
                                    <h4 class="title">CV/Resume</h4>
                                    <p class="desc">It is long established fact reader distracted readable content</p>
                                </div>
                                <div class="shape-arrow-icon">
                                    <img class="shape-icon"
                                        src="{{ asset('frontend/assets/img/icons/right-arrow.png') }}"
                                        alt="Image-HasTech">
                                    <img class="shape-icon-hover"
                                        src="{{ asset('frontend/assets/img/icons/right-arrow2.png') }}"
                                        alt="Image-HasTech">
                                </div>
                            </div>
                            <!--== End Work Process ==-->
                        </div>
                        <div class="working-col">
                            <!--== Start Work Process ==-->
                            <div class="working-process-item">
                                <div class="icon-box">
                                    <div class="inner">
                                        <img class="icon-img"
                                            src="{{ asset('frontend/assets/img/icons/w3.png"') }} alt="Image-HasTech">
                                        <img class="icon-hover"
                                            src="{{ asset('frontend/assets/img/icons/w3-hover.png') }}"
                                            alt="Image-HasTech">
                                    </div>
                                </div>
                                <div class="content">
                                    <h4 class="title">Find Your Job</h4>
                                    <p class="desc">It is long established fact reader distracted readable content</p>
                                </div>
                                <div class="shape-arrow-icon">
                                    <img class="shape-icon"
                                        src="{{ asset('frontend/assets/img/icons/right-arrow.png') }}"
                                        alt="Image-HasTech">
                                    <img class="shape-icon-hover"
                                        src="{{ asset('frontend/assets/img/icons/right-arrow2.png') }}"
                                        alt="Image-HasTech">
                                </div>
                            </div>
                            <!--== End Work Process ==-->
                        </div>
                        <div class="working-col">
                            <!--== Start Work Process ==-->
                            <div class="working-process-item">
                                <div class="icon-box">
                                    <div class="inner">
                                        <img class="icon-img"
                                            src="{{ asset('frontend/assets/img/icons/w4.png"') }} alt="Image-HasTech">
                                        <img class="icon-hover"
                                            src="{{ asset('frontend/assets/img/icons/w4-hover.png') }}"
                                            alt="Image-HasTech">
                                    </div>
                                </div>
                                <div class="content">
                                    <h4 class="title">Save & Apply</h4>
                                    <p class="desc">It is long established fact reader distracted readable content</p>
                                </div>
                                <div class="shape-arrow-icon d-none">
                                    <img class="shape-icon"
                                        src="{{ asset('frontend/assets/img/icons/right-arrow.png') }}"
                                        alt="Image-HasTech">
                                    <img class="shape-icon-hover"
                                        src="{{ asset('frontend/assets/img/icons/right-arrow2.png') }}"
                                        alt="Image-HasTech">
                                </div>
                            </div>
                            <!--== End Work Process ==-->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--== End Work Process Area Wrapper ==-->

    <!--== Start Divider Area Wrapper ==-->
    <section class="sec-overlay sec-overlay-theme bg-img"
        data-bg-img="{{ asset('frontend/assets/img/photos/bg1.jpg') }}">
        <div class="container pt--0 pb--0">
            <div class="row justify-content-center divider-style1">
                <div class="col-lg-10 col-xl-7">
                    <div class="divider-content text-center">
                        <h4 class="sub-title text-uppercase" data-aos="fade-down">Become an Agent</h4>
                        <h2 class="title" data-aos="fade-down">Would like posting  <br>Your Jobs on our Portal</h2>
                        <div class="divider-btn-group">
                            <a class="btn-divider btn  btn-success py-3 px-4" href="{{ route('send.request') }}">
                                {{-- <img src="{{ asset('frontend/assets/img/photos/mac-os.png') }}" width="201"
                                    height="63" class="icon" alt="Image-HasTech"> --}} Send Request
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="bg-layer-style1"></div>
        <div class="bg-layer-style2"></div>
    </section>
    <!--== End Divider Area Wrapper ==-->

    <!--== Start Team Area Wrapper ==-->
    <section class="recent-job-area bg-color-gray">
        <div class="container" data-aos="fade-down">
            <div class="row">
                <div class="col-12">
                    <div class="section-title text-center">
                        <h3 class="title">Our Jobs</h3>
                        <div class="desc">
                            <p>Many desktop publishing packages</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach ($ourJobs as $ourJob)
                    <div class="col-md-6 col-lg-4">
                        <!--== Start Recent Job Item ==-->
                        <div class="recent-job-item">
                            <div class="company-info">
                                <div class="logo">
                                    <a href="#!"><img src="{{ asset($ourJob->user->profile_pic) }}" width="75"
                                            height="75" alt="Job Image"></a>
                                </div>
                                <div class="content">
                                    <h4 class="name"><a href="#!">{{ $ourJob->user->name }}</a></h4>
                                    <p class="address">{{ $ourJob->loaction }}</p>
                                </div>
                            </div>
                            <div class="main-content">
                                <h3 class="title"><a
                                        href="{{ route('show.post.index', $ourJob->slug) }}">{{ $ourJob->title }}</a>
                                </h3>
                                <div class="d-flex justify-content-between">
                                    <span class="work-type">{{ $ourJob->job_type }}</span>
                                    <span class="work-type">{{ $ourJob->experince_level }}</span>
                                </div>
                                <p class="desc">{{ Str::limit($ourJob->description, 50) }}</p>
                            </div>
                            <div class="d-flex justify-content-between my-2">
                                @if ($ourJob->status === 'available')
                                    <span class="badge bg-success py-2">{{ ucfirst($ourJob->status) }}</span>
                                @endif
                                @if ($ourJob->status === 'expired')
                                    <span class="badge bg-danger py-2">{{ ucfirst($ourJob->status) }}</span>
                                @endif
                                <span class="badge bg-secondary py-2">Vacant {{ $ourJob->vacancy }}</span>
                            </div>
                            <div class="recent-job-info">
                                <div class="salary">
                                    <h4 class="fs-5">NGN {{ number_format($ourJob->salary) }} </h4>
                                    <p> /monthly</p>
                                </div>
                                <a class="btn-theme btn-sm" href="{{ route('show.post.index', $ourJob->slug) }}">Apply
                                    Now</a>
                            </div>
                        </div>
                        <!--== End Recent Job Item ==-->
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <!--== End Team Area Wrapper ==-->


    <!--== Start Brand Logo Area Wrapper ==-->
    <div class="brand-logo-area">
        <div class="container pt--0 pb--0" data-aos="fade-down">
            <div class="row">
                <div class="col-12">
                    <div class="brand-logo-content">
                        <div class="swiper brand-logo-slider-container">
                            <div class="swiper-wrapper">
                                 @foreach ($ourJobs as $ourJob)
                                <div class="swiper-slide">
                                    <!--== Start Brand Logo Item ==-->
                                    <div class="brand-logo-item ">
                                       <a href="{{ route('show.post.index', $ourJob->slug) }}"> <img src="{{ asset($ourJob->user->profile_pic) }}"
                                            alt="Image" class="rounded-3" ></a>
                                            
                                    </div>
                                    <p class="text-center">{{ $ourJob->title}}</p>
                                    <!--== End Brand Logo Item ==-->
                                </div>
                                @endforeach
                    
                            </div>
                        </div>
                        <!--== Add Swiper Arrows ==-->
                        <div class="swiper-btn-wrap">
                            <div class="brand-swiper-btn-prev">
                                <i class="icofont-long-arrow-left"></i>
                            </div>
                            <div class="brand-swiper-btn-next">
                                <i class="icofont-long-arrow-right"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--== End Brand Logo Area Wrapper ==-->

    <!--== Start Testimonial Area Wrapper ==-->
    <section class="testimonial-area bg-color-gray">
        <div class="container" data-aos="fade-down">
            <div class="row">
                <div class="col-12">
                    <div class="section-title text-center">
                        <h3 class="title">Our Happy Clients</h3>
                        <div class="desc">
                            <p>Many desktop publishing packages and web page editors</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="swiper testi-slider-container">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide">
                                <!--== Start Testimonial Item ==-->
                                <div class="testimonial-item">
                                    <div class="testi-inner-content">
                                        <div class="testi-author">
                                            <div class="testi-thumb">
                                                <img src="{{ asset('frontend/assets/img/testimonial/1.jpg') }}"
                                                    width="75" height="75" alt="Image-HasTech">
                                            </div>
                                            <div class="testi-info">
                                                <h4 class="name">Roselia Hamets</h4>
                                                <span class="designation">Hiring Manager</span>
                                            </div>
                                        </div>
                                        <div class="testi-content">
                                            <p class="desc">It is a long established fact that reader will distracted the
                                                readable content page looking at its layout point using that has
                                                more-or-less normal distribution of letters opposed using content making.
                                            </p>
                                            <div class="rating-box">
                                                <i class="icofont-star"></i>
                                                <i class="icofont-star"></i>
                                                <i class="icofont-star"></i>
                                                <i class="icofont-star"></i>
                                                <i class="icofont-star"></i>
                                            </div>
                                            <div class="testi-quote"><img
                                                    src="{{ asset('frontend/assets/img/icons/quote1.png') }}"
                                                    alt="Image-HasTech"></div>
                                        </div>
                                    </div>
                                </div>
                                <!--== End Testimonial Item ==-->
                            </div>
                            <div class="swiper-slide">
                                <!--== Start Testimonial Item ==-->
                                <div class="testimonial-item">
                                    <div class="testi-inner-content">
                                        <div class="testi-author">
                                            <div class="testi-thumb">
                                                <img src="{{ asset('frontend/assets/img/testimonial/2.jpg') }}"
                                                    width="75" height="75" alt="Image-HasTech">
                                            </div>
                                            <div class="testi-info">
                                                <h4 class="name">Assunta Manson</h4>
                                                <span class="designation">Hiring Manager</span>
                                            </div>
                                        </div>
                                        <div class="testi-content">
                                            <p class="desc">It is a long established fact that reader will distracted the
                                                readable content page looking at its layout point using that has
                                                more-or-less normal distribution of letters opposed using content making.
                                            </p>
                                            <div class="rating-box">
                                                <i class="icofont-star"></i>
                                                <i class="icofont-star"></i>
                                                <i class="icofont-star"></i>
                                                <i class="icofont-star"></i>
                                                <i class="icofont-star"></i>
                                            </div>
                                            <div class="testi-quote"><img
                                                    src="{{ asset('frontend/assets/img/icons/quote1.png') }}"
                                                    alt="Image-HasTech"></div>
                                        </div>
                                    </div>
                                </div>
                                <!--== End Testimonial Item ==-->
                            </div>
                            <div class="swiper-slide">
                                <!--== Start Testimonial Item ==-->
                                <div class="testimonial-item">
                                    <div class="testi-inner-content">
                                        <div class="testi-author">
                                            <div class="testi-thumb">
                                                <img src="{{ asset('frontend/assets/img/testimonial/3.jpg') }}"
                                                    width="75" height="75" alt="Image-HasTech">
                                            </div>
                                            <div class="testi-info">
                                                <h4 class="name">Amira Shepard</h4>
                                                <span class="designation">Hiring Manager</span>
                                            </div>
                                        </div>
                                        <div class="testi-content">
                                            <p class="desc">It is a long established fact that reader will distracted the
                                                readable content page looking at its layout point using that has
                                                more-or-less normal distribution of letters opposed using content making.
                                            </p>
                                            <div class="rating-box">
                                                <i class="icofont-star"></i>
                                                <i class="icofont-star"></i>
                                                <i class="icofont-star"></i>
                                                <i class="icofont-star"></i>
                                                <i class="icofont-star"></i>
                                            </div>
                                            <div class="testi-quote"><img
                                                    src="{{ asset('frontend/assets/img/icons/quote1.png') }}"
                                                    alt="Image-HasTech"></div>
                                        </div>
                                    </div>
                                </div>
                                <!--== End Testimonial Item ==-->
                            </div>
                            <div class="swiper-slide">
                                <!--== Start Testimonial Item ==-->
                                <div class="testimonial-item">
                                    <div class="testi-inner-content">
                                        <div class="testi-author">
                                            <div class="testi-thumb">
                                                <img src="{{ asset('frontend/assets/img/testimonial/4.jpg') }}"
                                                    width="75" height="75" alt="Image-HasTech">
                                            </div>
                                            <div class="testi-info">
                                                <h4 class="name">Joshua George</h4>
                                                <span class="designation">Hiring Manager</span>
                                            </div>
                                        </div>
                                        <div class="testi-content">
                                            <p class="desc">It is a long established fact that reader will distracted the
                                                readable content page looking at its layout point using that has
                                                more-or-less normal distribution of letters opposed using content making.
                                            </p>
                                            <div class="rating-box">
                                                <i class="icofont-star"></i>
                                                <i class="icofont-star"></i>
                                                <i class="icofont-star"></i>
                                                <i class="icofont-star"></i>
                                                <i class="icofont-star"></i>
                                            </div>
                                            <div class="testi-quote"><img
                                                    src="{{ asset('frontend/assets/img/icons/quote1.png') }}"
                                                    alt="Image-HasTech"></div>
                                        </div>
                                    </div>
                                </div>
                                <!--== End Testimonial Item ==-->
                            </div>
                            <div class="swiper-slide">
                                <!--== Start Testimonial Item ==-->
                                <div class="testimonial-item">
                                    <div class="testi-inner-content">
                                        <div class="testi-author">
                                            <div class="testi-thumb">
                                                <img src="{{ asset('frontend/assets/img/testimonial/5.jpg') }}"
                                                    width="75" height="75" alt="Image-HasTech">
                                            </div>
                                            <div class="testi-info">
                                                <h4 class="name">Rosie Patton</h4>
                                                <span class="designation">Hiring Manager</span>
                                            </div>
                                        </div>
                                        <div class="testi-content">
                                            <p class="desc">It is a long established fact that reader will distracted the
                                                readable content page looking at its layout point using that has
                                                more-or-less normal distribution of letters opposed using content making.
                                            </p>
                                            <div class="rating-box">
                                                <i class="icofont-star"></i>
                                                <i class="icofont-star"></i>
                                                <i class="icofont-star"></i>
                                                <i class="icofont-star"></i>
                                                <i class="icofont-star"></i>
                                            </div>
                                            <div class="testi-quote"><img
                                                    src="{{ asset('frontend/assets/img/icons/quote1.png') }}"
                                                    alt="Image-HasTech"></div>
                                        </div>
                                    </div>
                                </div>
                                <!--== End Testimonial Item ==-->
                            </div>
                        </div>

                        <!--== Add Swiper Pagination ==-->
                        <div class="swiper-pagination"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--== End Testimonial Area Wrapper ==-->

    {{-- <!--== Start Blog Area Wrapper ==-->
    <section class="blog-area blog-home-area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-title text-center">
                        <h3 class="title">Recent News Articles</h3>
                        <div class="desc">
                            <p>Many desktop publishing packages and web page editors</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row align-items-center post-home-style row-gutter-40">
                <div class="col-md-6 col-lg-4" data-aos="fade-right">
                    <!--== Start Blog Post Item ==-->
                    <div class="post-item">
                        <div class="thumb">
                            <a href="blog-details.html"><img src="{{ asset('frontend/assets/img/blog/1.jpg') }}"
                                    alt="Image" width="370" height="270"></a>
                        </div>
                        <div class="content">
                            <div class="author">By <a href="blog.html">Walter Houston</a></div>
                            <h4 class="title"><a href="blog-details.html">It long established fact that reader will
                                    distracted the readable.</a></h4>
                            <div class="meta">
                                <span class="post-date">03 April, 2022</span>
                                <span class="dots"></span>
                                <span class="post-time">10 min read</span>
                            </div>
                        </div>
                    </div>
                    <!--== End Blog Post Item ==-->
                </div>
                <div class="col-md-6 col-lg-4" data-aos="fade-left">
                    <!--== Start Blog Post Item ==-->
                    <div class="post-item">
                        <div class="thumb mb--0">
                            <a href="blog-details.html"><img src="{{ asset('frontend/assets/img/blog/h1.jpg') }}"
                                    alt="Image" width="370" height="440"></a>
                        </div>
                    </div>
                    <!--== End Blog Post Item ==-->
                </div>
                <div class="col-lg-4" data-aos="fade-left">
                    <div class="post-home-list-style">
                        <!--== Start Blog Post Item ==-->
                        <div class="post-item">
                            <div class="content">
                                <div class="author">By <a href="blog.html">Walter Houston</a></div>
                                <h4 class="title"><a href="blog-details.html">Established fact and readeren will
                                        distracted the readable content.</a></h4>
                                <div class="meta">
                                    <span class="post-date">03 April, 2022</span>
                                    <span class="dots"></span>
                                    <span class="post-time">10 min read</span>
                                </div>
                            </div>
                        </div>
                        <!--== End Blog Post Item ==-->

                        <!--== Start Blog Post Item ==-->
                        <div class="post-item">
                            <div class="content">
                                <div class="author">By <a href="blog.html">Walter Houston</a></div>
                                <h4 class="title"><a href="blog-details.html">With WooLentor's drag-and drop interface
                                        for creating...</a></h4>
                                <div class="meta">
                                    <span class="post-date">03 April, 2022</span>
                                    <span class="dots"></span>
                                    <span class="post-time">10 min read</span>
                                </div>
                            </div>
                        </div>
                        <!--== End Blog Post Item ==-->
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- == End Blog Area Wrapper == --> --}}

@endsection
