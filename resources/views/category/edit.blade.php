@extends('admin.section.main')
@section('title', 'Update category')

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
                                <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
                                <li class="breadcrumb-item active">Update category</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end page title -->
        </div> <!-- container -->
    </div>

    <section class="create-job py-5 px-3">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="d-flex justify-content-between">
                        <h3 class="fs-4 mb-4">Update Category</h3> <span><a href="{{ route('categories.create') }}" class="btn btn-primary rounded-end-5"> <i class="mdi mdi-chevron-left"></i> Back</a></span>
                    </div>
                    <div class="mb-4">
                        <form action="{{ route('categories.update', $category->slug) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="mb-3 ">
                                <div class="input-group">
                                    <input type="text" name="name" id=""
                                        class="form-control form-control-lg @error('name') is-invalid @enderror "
                                        placeholder=" Category Name" value="{{ old('name', $category->name) }}">
                                    <button type="submit" class="btn btn-primary rounded-end-4"> <i class="mdi mdi-update"></i> Update</button>
                                    @error('name')
                                        <span class="invalid-feedback text-danger">{{ $message }}</span>
                                    @enderror

                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            
            </div>
        </div>
    </section>

@endsection
