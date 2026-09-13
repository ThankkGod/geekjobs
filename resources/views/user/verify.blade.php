@extends('layout.app')
@section('title', 'Verify your account')
@section('content')

              <!--== Start Page Header Area Wrapper ==-->
    <div class="page-header-area sec-overlay sec-overlay-black" data-bg-img="assets/img/photos/bg2.jpg">
      <div class="container pt--0 pb--0">
        <div class="row">
          <div class="col-12">
            <div class="page-header-content">
              <h2 class="title">Account verification </h2>
              <nav class="breadcrumb-area">
                <ul class="breadcrumb justify-content-center">
                  <li><a href="{{ route('home.index') }}">Home</a></li>
                  <li class="breadcrumb-sep">//</li>
                  <li>Account verification </li>
                </ul>
              </nav>
            </div>
          </div>
        </div
      </div>
    </div>
    <!--== End Page Header Area Wrapper ==-->



    <section class="very py-5 bg-light">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card border-0 rounded-3">
                        <div class="card-header">Account verification</div>
                        <div class="card-body">
                            <div class="p card-text">Please Check your Email for Verification <a href="{{ route('resend.email') }}" class="btn btn-success py-2 px-4 ms-3">Resend Email</a></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection