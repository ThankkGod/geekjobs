@extends('admin.section.main')
@section('title', 'Admin edit profile')
@section('content')

    <div class="container">

        <!-- start page title -->
        <div class="py-3 py-lg-4">
            <div class="row">
                <div class="col-lg-6">
                    <h4 class="page-title mb-0">Admin Edit profile</h4>
                </div>
                <div class="col-lg-6">
                    <div class="d-none d-lg-block">
                        <ol class="breadcrumb m-0 float-end">
                            <li class="breadcrumb-item"><a href="{{ route('admin.profile.index') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active">Admin Edit profile</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <!-- end page title -->
    </div> <!-- container -->

    <section class="admin-profile-view py-4 px-4">
        <div class="container">
            <div class="row">
                <div class="card rounded-3">
                    <div class="card-header">
                        <div class="d-flex justify-content-between">
                            <h5 class="fw-medium my-4"> </h5>
                            <div class="my-2"><a href="{{ route('admin.index') }}" class="btn btn-primary">Back</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col md-6">
                    <div class="text-container">
                        <div class="card border-0 rounded-3">
                            <div class="card-body">
                                @if ($errors->any())
                                    @foreach ($errors->all() as $error)
                                        <div class="alert alert-danger"> {{ $error }}</div>
                                    @endforeach
                                @endif

                                <form action="{{ route('admin.update.profile') }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <label for="" class="form-label">Admin Name</label>
                                    <input type="text" name="name" value="{{ auth()->user()->name }}" id=""
                                        class="form-control mb-3">
                                    <label for="" class="form-label">Admin Email</label>
                                    <input type="text" name="email" value="{{ auth()->user()->email }}" id=""
                                        class="form-control mb-3">
                                    <label for="" class="form-label">Admin Phone Number</label>
                                    <input type="text" name="phone" value="{{ auth()->user()->phone }}" id=""
                                        class="form-control mb-3">
                                    <label for="" class="form-label">Admin address</label>
                                    <input type="text" name="address" value="{{ auth()->user()->address }}"
                                        id="" class="form-control mb-3">
                                    <label for="" class="form-label">Admin profile</label>
                                    <input type="file" name="profile_pic" id="" class="form-control mb-3"
                                        accept="image/*">
                                    <button type="submit" class="btn btn-primary px-4">Update</button>
                                </form>
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
                                        <img src="{{ asset(auth()->user()->profile_pic) }}" width="100" alt=""
                                            class="img-circle">
                                        <p class="ms-2  my-4">{{ auth()->user()->name }}</p>
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
    </section>
    {{-- Admin password section --}}
    <section class="admin-password-section py-4">
        <div class="contianer">
            <div class="row">
                <div class="col md-6">
                    <div class="text-container">
                        <div class="card border-0 rounded-3">
                            <div class="card-header">
                                <h3 class="fw-medium mt-4">Change password</h3>
                            </div>
                            <div class="card-body">
                                <form action="{{ route('admin.change.pwd') }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div>
                                        <label for="" class="form-label">Current password</label>
                                        <input type="password" name="current_password" id="current_password"
                                            class="form-control mb-3 @error('current_password')is-invalid @enderror">
                                        <span class="invalid-feedback text-danger">
                                            @error('current_password')
                                                {{ $message }}
                                            @enderror
                                        </span>
                                    </div>
                                    <div>
                                        <label for="" class="form-label">New password</label>
                                        <input type="password" name="password" id="password"
                                            class="form-control mb-3 @error('password')is-invalid @enderror">
                                        <span class="invalid-feedback text-danger">
                                            @error('password')
                                                {{ $message }}
                                            @enderror
                                        </span>
                                    </div>
                                    <div>
                                        <label for="" class="form-label">Re-type password</label>
                                        <input type="password" name="password_confirmation" id="password_confirmation"
                                            class="form-control mb-3 @error('password_confirmation')is-invalid @enderror">
                                        <span class="invalid-feedback text-danger">
                                            @error('password_confirmation')
                                                {{ $message }}
                                            @enderror
                                        </span>

                                    </div>

                                    <div class="form-group mb-4">

                                        <input type="checkbox" name="" class="form-check-input" id=""
                                            onclick="togglePassword()">
                                        <label for="" class="form-check-label"> Show password </label>
                                    </div>
                                    <button type="submit" class="btn btn-primary px-4">Update password</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
    {{-- Admin application setting  --}}
    <section class="admin-application-setting py-4">
        <div class="container">
            <div class="row">
                <div class="col md-6">
                    <div class="text-container">
                        <div class="card border-0 rounded-3">
                            <div class="card-header">
                                <h3 class="fw-medium">General Settings</h3>
                            </div>
                            <div class="card-body">
                                <form action="{{ route('admin.general.settings') }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div>
                                        <label for="" class="form-label">Application Name</label>
                                        <input type="text" name="name" id=""
                                            class="form-control mb-3 @error('name')is-invalid @enderror">
                                        <span class="invalid-feedback text-danger">
                                            @error('name')
                                                {{ $message }}
                                            @enderror
                                        </span>
                                    </div>
                                    <div>
                                        <label for="" class="form-label">Application Design by Company
                                            name</label>
                                        <input type="text" name="description" id=""
                                            class="form-control mb-3 @error('description')is-invalid @enderror">
                                        <span class="invalid-feedback text-danger">
                                            @error('description')
                                                {{ $message }}
                                            @enderror
                                        </span>
                                    </div>
                                    <div>
                                        <label for="" class="form-label">Application Logo</label>
                                        <input type="file" name="logo" id="" accept="image/*"
                                            class="form-control mb-3 @error('logo')is-invalid @enderror">
                                        <span class="invalid-feedback text-danger">
                                            @error('logo')
                                                {{ $message }}
                                            @enderror
                                        </span>
                                    </div>
                                    <button type="submit" class="btn btn-primary px-4">Upload</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col md-6">
                    <div class="text-container">
                        <div class="card border-0 rounded-3">
                            <div class="card-body">
                                <div class="card-title">
                                    @foreach ($applicationGenerals as $applicationGeneral)
                                        <img src="{{ asset($applicationGeneral->logo) }}" width="70" alt=""
                                            class="img-circle">
                                        <p class="ms-2  my-4">{{ $applicationGeneral->name }}</p>
                                        <p class="ms-2  my-4">{{ $applicationGeneral->description }}</p>
                                        <div>
                                            <div>
                                                <p><span><a href="{{ route('admin.general.settings.edit', $applicationGeneral->id) }}"
                                                            class="btn btn-info">Edit</a> </span>
                                                    <span><a href="#!" class="btn btn-danger"
                                                            onclick="event.preventDefault(); if(confirm('Are you sure?')) document.getElementById('form-del{{ $applicationGeneral->id }}').submit();">delete</a>
                                                        <form id="form-del{{ $applicationGeneral->id }}"
                                                            action="{{ route('admin.general.settings.destroy', $applicationGeneral->id) }}"
                                                            method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                        </form>
                                                    </span>
                                                </p>
                                            </div>
                                    @endforeach

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>

@endsection

<script>
    function togglePassword() {
        let current_password = document.getElementById('current_password')
        let password = document.getElementById('password')
        let password_confirmation = document.getElementById('password_confirmation')

        // if(password.type==='pass')

        current_password.type = current_password.type === 'password' ? 'text' : 'password'
        password.type = password.type === 'password' ? 'text' : 'password'
        password_confirmation.type = password_confirmation.type === 'password' ? 'text' : 'password'
    }
</script>
