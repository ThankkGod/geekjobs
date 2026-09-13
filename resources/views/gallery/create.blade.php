@extends('admin.section.main')
@section('title', 'Create gallery')
@section('content')
    <div class="px-3">
        <!-- Start Content-->
        <div class="container-fluid">

            <!-- start page title -->
            <div class="py-3 py-lg-4">
                <div class="row">
                    <div class="col-lg-6">
                        <h4 class="page-title mb-0">Admin</h4>
                    </div>
                    <div class="col-lg-6">
                        <div class="d-none d-lg-block">
                            <ol class="breadcrumb m-0 float-end">
                                <li class="breadcrumb-item"><a href="{{ route('gallery.index') }}">Back</a></li>
                                <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
                                <li class="breadcrumb-item active">Create gallery</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end page title -->

        </div> <!-- container -->

        <section class="create-gallery py-3">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        <form action="{{ route('gallery.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <h3 class="fw-semibold">Create Gallery Information</h3>
                            <div class="mb-3">
                                <input type="text" name="gallery_title" value="{{ old('gallery_title') }}" id="" class="form-control  @error('gallery_title') is-invalid @enderror"
                                    placeholder="Gallery heading title">
                                    @error('gallery_title')
                                    <span class="invalid-feedback text-danger">{{ $message }}</span>
                                    @enderror
                            </div>
                            <div class="mb-3">
                                <input type="text" name="gallery_description" value="{{ old('gallery_description') }}" id="" class="form-control @error('gallery_description') is-invalid @enderror"
                                    placeholder="Gallery description ">
                                    @error('gallery_description')
                                    <span class="invalid-feedback text-danger">{{ $message }}</span>
                                    @enderror
                            </div>
                            <div class="mb-3">
                                <input type="file" name="gallery_image" id="" class="form-control @error('gallery_image') is-invalid @enderror" accept="image/*">
                                 @error('gallery_image')
                                    <span class="invalid-feedback text-danger">{{ $message }}</span>
                                    @enderror
                            </div>
                            <div class="mb-3">
                                 <button type="submit" class="btn btn-primary">Create Gallery</button>
                            </div>
                            </form>
                    </div>
                    
                </div>
            </div>
    </div>
    </section>

    </div> <!-- content -->

@endsection
