@extends('admin.section.main')
@section('title', 'Edit general setting')
@section('content')
    <div class="container-fluid">

        <!-- start page title -->
        <div class="py-3 py-lg-4">
            <div class="row">
                <div class="col-lg-6">
                    <h4 class="page-title mb-0">General Settings</h4>
                </div>
                <div class="col-lg-6">
                    <div class="d-none d-lg-block">
                        <ol class="breadcrumb m-0 float-end">
                            <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active">General Setting Update</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <!-- end page title -->

    </div> <!-- container -->

    {{-- Admin application setting  --}}
    <div class="row">
        <div class="col md-6">
            <div class="text-container">
                <div class="card border-0 rounded-3">
                    <div class="card-header">
                        <a href="{{ route('admin.edit.profile') }}" class="btn btn-primary">Back</a>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('admin.general.settings.update', $generalSettingEdit->id) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div>
                                <label for="" class="form-label">Application Name</label>
                                <input type="text" name="name"value="{{ $generalSettingEdit->name }}" id=""
                                    class="form-control mb-3 @error('name')is-invalid @enderror">
                                <span class="invalid-feedback text-danger">
                                    @error('name')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>
                            <div>
                                <label for="" class="form-label">Application Design by Company name</label>
                                <input type="text" name="description" value="{{ $generalSettingEdit->description }}"
                                    id="" class="form-control mb-3 @error('description')is-invalid @enderror">
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


                            <img src="{{ asset($generalSettingEdit->logo) }}" width="70" alt=""
                                class="img-circle">
                            <p class="ms-2  my-4">{{ $generalSettingEdit->name }}</p>
                            <p class="ms-2  my-4">{{ $generalSettingEdit->description }}</p>
                            <div>




                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
