<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="Geek Craft - Job Portal Website Template Using Bootstrap 5" />
    <meta name="keywords" content="accessories, digital products, electronic html, modern, products, responsive" />
    <meta name="author" content="Geek Craft Technologies limited" />
    @foreach (\App\Models\General::latest()->get() as $title )
        <title>{{ $title->name  }} - @yield('title')</title>
    @endforeach
    
    {{-- <style>
        .has-submenu  span {
            margin: 0px !important;
            padding: 0px !important;
        }
    </style> --}}

    <!--== Favicon ==-->
    <link rel="shortcut icon" href="{{ asset('frontend/assets/img/favicon.ico') }}" type="image/x-icon" />

    <!--== Google Fonts ==-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Jost:ital,wght@0,300;0,400;0,500;0,600;0,700;1,400&display=swap"
        rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500&display=swap" rel="stylesheet">


    <!--== Bootstrap CSS ==-->
    <link href="{{ asset('frontend/assets/css/bootstrap.min.css') }}" rel="stylesheet" />
    <!--== Icofont Icon CSS ==-->
    <link href="{{ asset('frontend/assets/css/icofont.css') }}" rel="stylesheet" />
    <!--== Swiper CSS ==-->
    <link href="{{ asset('frontend/assets/css/swiper.min.css') }}" rel="stylesheet" />
    <!--== Fancybox Min CSS ==-->
    <link href="{{ asset('frontend/assets/css/fancybox.min.css') }}" rel="stylesheet" />
    <!--== Aos Min CSS ==-->
    <link href="{{ asset('frontend/assets/css/aos.min.css') }}" rel="stylesheet" />

    <!--== Main Style CSS ==-->
    <link href="{{ asset('frontend/assets/css/style.css') }}" rel="stylesheet" />
</head>

<body>

    <!--wrapper start-->
    <div class="wrapper">

        <!--== Start Header Wrapper ==-->
        <header class="header-area transparent">
            <div class="container">
                <div class="row no-gutter align-items-center position-relative">
                    <div class="col-12">
                        <div class="header-align">
                            <div class="header-align-start">
                                <div class="header-logo-area">
                                    <a href="index.html">
                                        @foreach (\App\Models\General::latest()->take(1)->get() as $logo )
                                            <img class="logo-main" src="{{ asset($logo->logo) }}"
                                            alt="Logo" />
                                        @endforeach

                                        @foreach (\App\Models\General::latest()->take(1)->get() as $logo )
                                        <img class="logo-light" src="{{ asset($logo->logo) }}) }}"
                                            alt="Logo" />
                                        @endforeach
                                        
                                    </a>
                                </div>
                            </div>
                            <div class="header-align-center">
                                <div class="header-navigation-area position-relative">
                                    <ul class="main-menu nav">
                                        <li class="{{ Route::is('home.index')?'active':''}}"><a href="{{ route('home.index') }}"><span>Home</span></a></li>
                                        <li class="{{ Route::is('about.index')?'active':''}}"><a href="{{ route('about.index')}}"><span>About</span></a></li>
                                        <li><a href="contact.html"><span>Contact</span></a></li>
                                    </ul>
                                </div>
                            </div>
                            @guest
                                <div class="header-align-end">
                                    <div class=" d-flex gap-3 header-action-area">
                                        <a class="btn-registration" href="{{ route('create.register') }}"><span>+</span>
                                            Registration</a>
                                        <a class="btn-registration" href="{{ route('login') }}"><span>+</span> Login</a>
                                        <button class="btn-menu" type="button" data-bs-toggle="offcanvas"
                                            data-bs-target="#AsideOffcanvasMenu" aria-controls="AsideOffcanvasMenu">
                                            <i class="icofont-navigation-menu"></i>
                                        </button>
                                    </div>
                                </div>
                            @else
                                <div class="header-align-end">
                                    <div class="header-action-area">
                                        <li class="has-submenu btn btn-success px-3 py-2"><a href="#/"><span
                                                    class="text-white ">{{ auth()->user()->name ?? 'Anonymous' }}</span></a>
                                            <ul class="submenu-nav">
                                                <li><a href="{{ route('user.profile.index') }}"><span>Profile</span></a></li>
                                                <li><a href="{{ route('candidate.profile.setting') }}"><span>Account settings</span></a></li>
                                                <li><a href="{{ route('save.job.index') }}"><span>Saved jobs</span></a></li>
                                                <li><a href="#!" id="logout" ><span>Logout</span></a>
                                                <form id="form-logout" action="{{ route('logout') }}" method="POST">
                                                  @csrf
                                                  @method('DELETE')
                                                </form>
                                                </li>
                                                
                                            </ul>
                                        </li>
                                        <button class="btn-menu" type="button" data-bs-toggle="offcanvas"
                                            data-bs-target="#AsideOffcanvasMenu" aria-controls="AsideOffcanvasMenu">
                                            <i class="icofont-navigation-menu"></i>
                                        </button>
                                    </div>
                                </div>
                            @endguest
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!--== End Header Wrapper ==-->

        <main class="main-content">
            @yield('content')
        </main>

        <!--== Start Footer Area Wrapper ==-->
        <footer class="footer-area">
            <!--== Start Footer Top ==-->
            <div class="footer-top">
                <div class="container pt--0 pb--0">
                    <div class="row">
                        <div class="col-lg-5">
                            <div class="footer-newsletter-content">
                                <h4 class="title">Subscribe for everyday job newsletter.</h4>
                            </div>
                        </div>
                        <div class="col-lg-7">
                            <div class="footer-newsletter-form">
                                <form action="#">
                                    <input type="email" placeholder="Enter your email">
                                    <button type="submit" class="btn-newsletter">Subscribe Now</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--== End Footer Top ==-->

            <!--== Start Footer Main ==-->
            <div class="footer-main">
                <div class="container pt--0 pb--0">
                    <div class="row">
                        <div class="col-md-6 col-lg-3">
                            <div class="widget-item widget-about">
                                <div class="widget-logo-area">
                                    
                                    @foreach (\App\Models\General::latest()->take(1)->get() as $logo )
                                        <a href="{{route('home.index')}}">
                                        <img class="logo-main"
                                            src="{{ asset($logo ->logo) }}"
                                            alt="Logo" />
                                    </a>
                                    @endforeach
                                </div>
                                <p class="desc">That necessitat ecommerce platform that optimi your store popularised
                                    the release</p>
                                <div class="social-icons">
                                    <a href="https://www.facebook.com" target="_blank" rel="noopener"><i
                                            class="icofont-facebook"></i></a>
                                    <a href="https://www.skype.com" target="_blank" rel="noopener"><i
                                            class="icofont-skype"></i></a>
                                    <a href="https://twitter.com" target="_blank" rel="noopener"><i
                                            class="icofont-twitter"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-9">
                            <div class="row">
                                <div class="col-md-3 col-lg-3">
                                    <div class="widget-item nav-menu-item1">
                                        <h4 class="widget-title">Company</h4>
                                        <h4 class="widget-collapsed-title collapsed" data-bs-toggle="collapse"
                                            data-bs-target="#widgetId-1">Company</h4>
                                        <div id="widgetId-1" class="collapse widget-collapse-body">
                                            <div class="collapse-body">
                                                <div class="widget-menu-wrap">
                                                    <ul class="nav-menu">
                                                        <li><a href="about-us.html">About Us</a></li>
                                                        <li><a href="about-us.html">Why Extobot</a></li>
                                                        <li><a href="contact.html">Contact With Us</a></li>
                                                        <li><a href="contact.html">Our Partners</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 col-lg-3">
                                    <div class="widget-item nav-menu-item2">
                                        <h4 class="widget-title">Resources</h4>
                                        <h4 class="widget-collapsed-title collapsed" data-bs-toggle="collapse"
                                            data-bs-target="#widgetId-2">Resources</h4>
                                        <div id="widgetId-2" class="collapse widget-collapse-body">
                                            <div class="collapse-body">
                                                <div class="widget-menu-wrap">
                                                    <ul class="nav-menu">
                                                        <li><a href="account-login.html">Quick Links</a></li>
                                                        <li><a href="job.html">Job Packages</a></li>
                                                        <li><a href="job.html">Post New Job</a></li>
                                                        <li><a href="job.html">Jobs Listing</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 col-lg-3">
                                    <div class="widget-item nav-menu-item3">
                                        <h4 class="widget-title">Legal</h4>
                                        <h4 class="widget-collapsed-title collapsed" data-bs-toggle="collapse"
                                            data-bs-target="#widgetId-3">Legal</h4>
                                        <div id="widgetId-3" class="collapse widget-collapse-body">
                                            <div class="collapse-body">
                                                <div class="widget-menu-wrap">
                                                    <ul class="nav-menu">
                                                        <li><a href="account-login.html">Affiliate</a></li>
                                                        <li><a href="blog.html">Blog</a></li>
                                                        <li><a href="account-login.html">Help & Support</a></li>
                                                        <li><a href="job.html">Careers</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 col-lg-3">
                                    <div class="widget-item nav-menu-item4">
                                        <h4 class="widget-title">Products</h4>
                                        <h4 class="widget-collapsed-title collapsed" data-bs-toggle="collapse"
                                            data-bs-target="#widgetId-4">Products</h4>
                                        <div id="widgetId-4" class="collapse widget-collapse-body">
                                            <div class="collapse-body">
                                                <div class="widget-menu-wrap">
                                                    <ul class="nav-menu">
                                                        <li><a href="account-login.html">Star a Trial</a></li>
                                                        <li><a href="about-us.html">How It Works</a></li>
                                                        <li><a href="account-login.html">Features</a></li>
                                                        <li><a href="about-us.html">Price & Planing</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--== End Footer Main ==-->

            <!--== Start Footer Bottom ==-->
            <div class="footer-bottom">
                <div class="container pt--0 pb--0">
                    <div class="row">
                        <div class="col-12">
                            @foreach (\App\Models\General::latest()->take(1)->get() as $applicationGeneral )
                               <div class="footer-bottom-content">
                                <p class="copyright text-capitalize">© {{ date('Y') }}  {{  $applicationGeneral->name }}. Developed & Designed By {{  $applicationGeneral->description }}.</a></p>
                            </div> 
                            @endforeach
                            
                        </div>
                    </div>
                </div>
            </div>
            <!--== End Footer Bottom ==-->
        </footer>
        <!--== End Footer Area Wrapper ==-->

        <!--== Scroll Top Button ==-->
        <div id="scroll-to-top" class="scroll-to-top"><span class="icofont-rounded-up"></span></div>

        <!--== Start Aside Menu ==-->
        <aside class="off-canvas-wrapper offcanvas offcanvas-start" tabindex="-1" id="AsideOffcanvasMenu"
            aria-labelledby="offcanvasExampleLabel">
            <div class="offcanvas-header">
                <h1 class="d-none" id="offcanvasExampleLabel">Aside Menu</h1>
                <button class="btn-menu-close" data-bs-dismiss="offcanvas" aria-label="Close">menu <i
                        class="icofont-simple-left"></i></button>
            </div>
            <div class="offcanvas-body">
                <!-- Mobile Menu Start -->
                <div class="mobile-menu-items">
                    <ul class="nav-menu">
                        <li><a href="{{ route('home.index') }}">Home</a></li>
                        <li><a href="{{ route('about.index') }}">Contact</a></li>
                        <li><a href="#">Contact</a></li>
                    </ul>
                </div>
                <!-- Mobile Menu End -->
            </div>
        </aside>
        <!--== End Aside Menu ==-->
    </div>

    <!--=======================Javascript============================-->
    <script>
      let logout = document.getElementById('logout');
      let form = document.getElementById('form-logout');
      logout.addEventListener('click', function(){
        form.submit();
      });
    </script>
    <!--=== jQuery Modernizr Min Js ===-->
    <script src="{{ asset('frontend/assets/js/modernizr.js') }}"></script>
    <!--=== jQuery Min Js ===-->
    <script src="{{ asset('frontend/assets/js/jquery-main.js') }}"></script>
    <!--=== jQuery Migration Min Js ===-->
    <script src="{{ asset('frontend/assets/js/jquery-migrate.js') }}"></script>
    <!--=== jQuery Popper Min Js ===-->
    <script src="{{ asset('frontend/assets/js/popper.min.js') }}"></script>
    <!--=== jQuery Bootstrap Min Js ===-->
    <script src="{{ asset('frontend/assets/js/bootstrap.min.js') }}"></script>
    <!--=== jQuery Swiper Min Js ===-->
    <script src="{{ asset('frontend/assets/js/swiper.min.js') }}"></script>
    <!--=== jQuery Fancybox Min Js ===-->
    <script src="{{ asset('frontend/assets/js/fancybox.min.js') }}"></script>
    <!--=== jQuery Aos Min Js ===-->
    <script src="{{ asset('frontend/assets/js/aos.min.js') }}"></script>
    <!--=== jQuery Counterup Min Js ===-->
    <script src="{{ asset('frontend/assets/js/counterup.js') }}"></script>
    <!--=== jQuery Waypoint Js ===-->
    <script src="{{ asset('frontend/assets/js/waypoint.js') }}"></script>

    <!--=== jQuery Custom Js ===-->
    <script src="{{ asset('frontend/assets/js/custom.js') }}"></script>

</body>

</html>
