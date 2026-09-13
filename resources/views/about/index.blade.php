@extends('layout.app')
@section('title', 'About us')
@section('content')
    <!--== Start Page Header Area Wrapper ==-->
    <div class="page-header-area sec-overlay sec-overlay-black" data-bg-img="assets/img/photos/bg2.jpg">
        <div class="container pt--0 pb--0">
            <div class="row">
                <div class="col-12">
                    <div class="page-header-content">
                        <h2 class="title">About us</h2>
                        <nav class="breadcrumb-area">
                            <ul class="breadcrumb justify-content-center">
                                <li><a href="{{ route('home.index') }}">Home</a></li>
                                <li class="breadcrumb-sep">//</li>
                                <li>About us</li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--== End Page Header Area Wrapper ==-->


    <!---  Who we are section  -->

    <section class="pb-5">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="image-container">
                        <img src="{{ asset('frontend/assets/img/about/about.jpg') }}" style="width:500px; height: 400px;"
                            alt="" class="img-fluid rounded-3">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="text-container">
                        <h2 class="fw-semibold">Who We Are</h2>
                        <p class="lead">Lorem ipsum dolor sit amet consectetur adipisicing elit. Labore sunt itaque
                            recusandae rem vero reiciendis laboriosam molestias qui non, repellat aspernatur officiis, autem
                            facere, minima quae deserunt quibusdam voluptate! Eum eos magni blanditiis consequatur vero
                            numquam odit optio accusamus impedit, eaque facere. Vitae corrupti nesciunt quas autem commodi,
                            exercitationem reiciendis.</p>
                        <p class="lead">Lorem ipsum dolor sit amet consectetur adipisicing elit. Labore sunt itaque
                            recusandae rem vero reiciendis laboriosam </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!---  Our Mission   -->
    <section class="">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="text-container">
                        <h2 class="fw-semibold">Our Mission</h2>
                        <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Fugiat, dolorum dolorem? Sequi ullam
                            distinctio, totam ea dolor minus rerum repellat velit, obcaecati, libero nulla ab nisi fugit
                            provident vel odit consequatur consequuntur magnam nostrum quod. Ea aperiam eius ipsam eveniet
                            aliquid asperiores impedit hic. Facere temporibus corporis repudiandae iusto dolores.</p>
                        <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Fugiat, dolorum dolorem? Sequi ullam
                            distinctio, totam ea dolor minus rerum repellat velit, obcaecati, libero nulla ab nisi fugit
                            provident vel odit consequatur consequuntur magnam nostrum quod. Ea aperiam eius ipsam eveniet
                            aliquid asperiores impedit hic. Facere temporibus corporis repudiandae iusto dolores.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <img src="{{ asset('frontend/assets/img/about/mission.jpg') }}" style="width: 300px; height: 400px;"
                        alt="" class="img-fluid rounded-3">
                </div>
            </div>
        </div>
    </section>

    <!---  Our VIsion   -->
    <section class="">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <img src="{{ asset('frontend/assets/img/about/mission.jpg') }}" style="width: 300px; height: 400px;"
                        alt="" class="img-fluid rounded-3">
                </div>
                <div class="col-md-8">
                    <div class="text-container">
                        <h2 class="fw-semibold">Our Vision</h2>
                        <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Fugiat, dolorum dolorem? Sequi ullam
                            distinctio, totam ea dolor minus rerum repellat velit, obcaecati, libero nulla ab nisi fugit
                            provident vel odit consequatur consequuntur magnam nostrum quod. Ea aperiam eius ipsam eveniet
                            aliquid asperiores impedit hic. Facere temporibus corporis repudiandae iusto dolores.</p>
                        <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Fugiat, dolorum dolorem? Sequi ullam
                            distinctio, totam ea dolor minus rerum repellat velit, obcaecati, libero nulla ab nisi fugit
                            provident vel odit consequatur consequuntur magnam nostrum quod. Ea aperiam eius ipsam eveniet
                            aliquid asperiores impedit hic. Facere temporibus corporis repudiandae iusto dolores.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!---  Our Team  -->
    <section style="margin-top: -100px;">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="text-container mb-5">
                        <h2 class="fw-semibold">Our Team</h2>
                        <p class="lead">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Quod provident deleniti
                            neque aspernatur ea iste consectetur modi et dolor, dicta excepturi voluptas temporibus
                            dignissimos nostrum.</p>

                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <img src="{{ asset('frontend/assets/img/about/team.jpg') }}" style="width: 300px; height: 400px;"
                        alt="" class="img-fluid rounded-3 mb-3">
                </div>
                <div class="col-md-4">
                    <img src="{{ asset('frontend/assets/img/about/team.jpg') }}" style="width: 300px; height: 400px;"
                        alt="" class="img-fluid rounded-3 mb-3">
                </div>
                <div class="col-md-4">
                    <img src="{{ asset('frontend/assets/img/about/team.jpg') }}" style="width: 300px; height: 400px;"
                        alt="" class="img-fluid rounded-3 mb-3">
                </div>
            </div>

    </section>
@endsection
