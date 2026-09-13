@extends('admin.section.main')
@section('title', 'Admin profile')
@section('content')

    <div class="container-fluid">

        <!-- start page title -->
        <div class="py-3 py-lg-4">
            <div class="row">
                <div class="col-lg-6">
                    <h4 class="page-title mb-0">Admin profile</h4>
                </div>
                <div class="col-lg-6">
                    <div class="d-none d-lg-block">
                        <ol class="breadcrumb m-0 float-end">
                            <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active">Admin profile</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <section class="admin-profile-view py-4 px-4">
            <div class="container">
                <div class="row">
                    <div class="card rounded-3">
                        <div class="card-header">
                            <div class="d-flex justify-content-between">
                                <h3 class="fw-medium my-4"> </h3>
                                <div class="my-4"><a href="{{ route('admin.edit.profile') }}" class="btn btn-primary">Account settings</a></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col md-6">
                        <div class="text-container">
                            <div class="card border-0 rounded-3">
                                <div class="card-body">
                                    <p class="card-text mb-3">Name: {{ auth()->user()->name }}</p>
                                    <p class="card-text mb-3">Email: {{ auth()->user()->email }}</p>
                                    <p class="card-text mb-3">Role: {{ ucfirst(auth()->user()->role) }}</p>
                                    <p class="card-text mb-3">Status: {{ ucfirst(auth()->user()->status) }}</p>
                                    <p class="card-text mb-3">Phone: {{ auth()->user()->phone }}</p>
                                    <p class="card-text mb-3">Address: {{ auth()->user()->address }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col md-6">
                        <div class="text-container">
                            <div class="card border-0 rounded-3">
                                <div class="card-body">
                                    <div class="card-title">
                                        @if (auth()->user()->profile_pic)
                                            <img src="{{ asset(auth()->user()->profile_pic) }}" width="100"
                                                alt="" class="img-circle">
                                        @else
                                            <div>
                                                <img src="{{ asset('backend/imguser/user.png') }}" width="100"
                                                    alt="" class="img-circle  shadow">

                                                <p class="ms-2  my-4">Profile Picture</p>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </div> <!-- container -->



@endsection
