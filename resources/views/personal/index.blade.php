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
                        <div class="card-header">
                            <div class="d-flex justify-content-between">
                                <span>About me</span> 
                                @if($created)
                                {{-- <span><a href="#!"  class="btn btn-outline-success" disabled >Already Created</a></span> --}}
                                @else
                                <span><a href="{{ route('personals.create') }}" class="btn btn-outline-success">Create</a></span>
                                @endif
                            </div>
                        </div>
                        <div class="card-body">
                           <table class="table">
                            <thead>
                                <tr>
                                    <th>Profession</th>
                                    <th>Nationality</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($personals as $personal)
                                <tr>
                                    <td>{{ $personal->profession_name }}</td>
                                    <td>{{ $personal->nationality }}</td>
                                    <td>
                                      <a href="{{ route('personals.edit', $personal->slug) }}" class="">
                                                    <img src="{{ asset('frontend/icons/editing.png') }}" width="25"
                                                        alt="" class="img-fluid">
                                                </a>
                                                <a href="#!"
                                                    onclick="event.preventDefault(); if(confirm('Are you sure?')) document.getElementById('del-form{{ $personal->slug }}').submit();">
                                                    <img src="{{ asset('frontend/icons/delete.png') }}" width="20"
                                                        alt="" class="img-fluid">

                                                </a>
                                                <form id="del-form{{ $personal->slug }}"
                                                    action="{{ route('personals.destroy', $personal->slug) }}"
                                                    method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                </form>
                                    </td>
                                       @empty
                                    <td colspan="6"><p class="text-danger text-center">Create your Personal information</p></td>
                                @endforelse
                                </tr>
                            </tbody>
                           </table>
                        </div>
                    </div>
                </div>
               
            </div>
        </div>
    </section>

@endsection


