@extends('admin.section.main')
@section('title', 'Create category')

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
                                <li class="breadcrumb-item active">Create category</li>
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
            <div class="row">
                <div class="col-md-6">
                    <div class="mb-4">
                        <form action="{{ route('categories.store') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <div class="input-group">
                                    <input type="text" name="name" id=""
                                        class="form-control form-control-lg @error('name') is-invalid @enderror "
                                        placeholder=" Category Name">
                                    <button type="submit" class="btn btn-primary rounded-end-4">Create</button>
                                    @error('name')
                                        <span class="invalid-feedback text-danger">{{ $message }}</span>
                                    @enderror

                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                         <div class="card border-0 rounded-4">
                            <div class="card-header">
                                <!--  Search box -->
                                <form action="{{ route('categories.create') }}" method="GET">
                                    <div class="input-group">
                                        <input type="search" name="search" value="{{ Request('search') }}" id="" class="form-control" placeholder="Search category">
                                        <button type="submit" class="btn btn-primary"> <i class="mdi mdi-card-search-outline"></i> Search</button>
                                        <a href="{{ route('categories.create') }}" class="btn btn-info rounded-end-5"> <i class="mdi mdi-format-clear"></i> Clear</a>
                                    </div>
                                </form>
                            </div>
                            <div class="card-body">
                                  <table class="table fs-5">
                                <thead>
                                    <tr>
                                        <th>S/N</th>
                                        <th>Name</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($categories as $key => $category)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $category->name }}</td>
                                            <td class="d-flex gap-2" >
                                                <a href="{{ route('categories.edit', $category->slug) }}" class="btn btn-info"> <i
                                                        class="mdi mdi-file-edit-outline"></i></a>
                                                <a href="#!" class="btn btn-danger"  onclick="event.preventDefault(); if(confirm('Are you sure?')) document.getElementById('del-cate{{ $category->slug }}').submit();"> <i
                                                        class="mdi mdi-delete-forever-outline"></i></a>
                                                        <form id="del-cate{{ $category->slug }}" action="{{ route('categories.destroy', $category->slug) }}" method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                        </form>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="3" class="text-danger text-center">No search match your record</td>

                                        </tr>
                                    @endforelse
                                </tbody>

                            </table>
                            <div class="me-5">
                                @if ($categories->count())
                                    {{ $categories->links() }}
                                @endif
                            </div>
                            </div>
                          </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
