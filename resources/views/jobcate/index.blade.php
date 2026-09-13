@extends('layout.app')
@section('title', 'Job base on category')
@section('content')
    <!--== Start Page Header Area Wrapper ==-->
    <div class="page-header-area sec-overlay sec-overlay-black" data-bg-img="assets/img/photos/bg2.jpg">
      <div class="container pt--0 pb--0">
        <div class="row">
          <div class="col-12">
            <div class="page-header-content">
              <h2 class="title text-capitalize">{{ $category->name }} Jobs</h2>
              <nav class="breadcrumb-area">
                <ul class="breadcrumb justify-content-center">
                  <li><a href="{{ route('home.index') }}">Home</a></li>
                  <li class="breadcrumb-sep">//</li>
                  <li class="text-capitalize">{{ $category->name }} jobs</li>
                </ul>
              </nav>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!--== End Page Header Area Wrapper ==-->


    <!--== Start Recent Job Area Wrapper ==-->
    <section class="recent-job-area bg-color-gray">
        <div class="container" data-aos="fade-down">
            <div class="row">
                <div class="col-12">
                    <div class="section-title text-center">
                        <h3 class="title text-capitalize">Recent {{ $category->name }} jobs</h3>
                        <div class="desc">
                            <p>Our jobs</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                @forelse ($category->posts as $post)
                    <div class="col-md-6 col-lg-4">
                        <!--== Start Recent Job Item ==-->
                        <div class="recent-job-item">
                            <div class="company-info">
                                <div class="logo">
                                    <a href="{{ route('show.post.index',$post->slug) }}"><img src="{{ asset($post->feature_image) }}"
                                            width="75" height="75" alt="Job Image"></a>
                                </div>
                                <div class="content">
                                    <h4 class="name"><a href="{{ route('show.post.index',$post->slug) }}">{{ $post->title }}</a></h4>
                                    <p class="address">{{ $post->location }}</p>
                                </div>
                            </div>
                            <div class="main-content">
                                <h3 class="title"><a href="{{ route('show.post.index',$post->slug) }}">{{ $category->title }}</a></h3>

                                <div class="d-flex justify-content-between">
                                    <span class="work-type">{{ $post->job_type }}</span>
                                    <span class="work-type">{{ $post->experince_level }}</span>
                                </div>
                                <p class="desc">{{ Str::limit($post->description, 50) }}</p>
                            </div>
                            <div class="d-flex justify-content-between my-2 ">
                                @if ($post->status === 'available')
                                    <span class="badge bg-success py-2">{{ ucfirst($post->status) }}</span>
                                @endif
                                @if ($post->status === 'expired')
                                    <span class="badge bg-danger py-2">{{ ucfirst($post->status) }}</span>
                                @endif
                                <span class="badge bg-secondary py-2">Vacant {{ $post->vacancy }}</span>
                            </div>
                            <div class="recent-job-info">
                                <div class="salary">
                                    <h4 class="fs-5">NGN {{ number_format($post->salary) }} </h4>
                                    <p> /monthly</p>
                                </div>
                                <a class="btn-theme btn-sm" href="{{ route('show.post.index',$post->slug) }}">Apply Now</a>
                            </div>
                        </div>
                        <!--== End Recent Job Item ==-->
                    </div>
                @empty
                <p class="lead text-danger text-center">No job found in this category</p>
                @endforelse
            </div>
        </div>
    </section>
    <!--== End Recent Job Area Wrapper ==-->




    <!--== Start Brand Logo Area Wrapper ==-->
    <div class="brand-logo-area">
        <div class="container pt--0 pb--0" data-aos="fade-down">
            <div class="row">
                <div class="col-12">
                    <div class="brand-logo-content">
                        <div class="swiper brand-logo-slider-container">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide">
                                    <!--== Start Brand Logo Item ==-->
                                    <div class="brand-logo-item">
                                        <img src="{{ asset('frontend/assets/img/brand-logo/1.png') }}"
                                            alt="Image-HasTech">
                                    </div>
                                    <!--== End Brand Logo Item ==-->
                                </div>
                                <div class="swiper-slide">
                                    <!--== Start Brand Logo Item ==-->
                                    <div class="brand-logo-item">
                                        <img src="{{ asset('frontend/assets/img/brand-logo/2.png') }}"
                                            alt="Image-HasTech">
                                    </div>
                                    <!--== End Brand Logo Item ==-->
                                </div>
                                <div class="swiper-slide">
                                    <!--== Start Brand Logo Item ==-->
                                    <div class="brand-logo-item">
                                        <img src="assets/img/brand-logo/3.png" alt="Image-HasTech">
                                    </div>
                                    <!--== End Brand Logo Item ==-->
                                </div>
                                <div class="swiper-slide">
                                    <!--== Start Brand Logo Item ==-->
                                    <div class="brand-logo-item">
                                        <img src="{{ asset('frontend/assets/img/brand-logo/4.png') }}"
                                            alt="Image-HasTech">
                                    </div>
                                    <!--== End Brand Logo Item ==-->
                                </div>
                                <div class="swiper-slide">
                                    <!--== Start Brand Logo Item ==-->
                                    <div class="brand-logo-item">
                                        <img src="{{ asset('frontend/assets/img/brand-logo/5.png') }}"
                                            alt="Image-HasTech">
                                    </div>
                                    <!--== End Brand Logo Item ==-->
                                </div>
                                <div class="swiper-slide">
                                    <!--== Start Brand Logo Item ==-->
                                    <div class="brand-logo-item">
                                        <img src="{{ asset('frontend/assets/img/brand-logo/6.png') }}"
                                            alt="Image-HasTech">
                                    </div>
                                    <!--== End Brand Logo Item ==-->
                                </div>
                                <div class="swiper-slide">
                                    <!--== Start Brand Logo Item ==-->
                                    <div class="brand-logo-item">
                                        <img src="{{ asset('frontend/assets/img/brand-logo/1.png') }}"
                                            alt="Image-HasTech">
                                    </div>
                                    <!--== End Brand Logo Item ==-->
                                </div>
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

    <!--== Start Blog Area Wrapper ==-->
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
    <!-- == End Blog Area Wrapper == -->

@endsection
