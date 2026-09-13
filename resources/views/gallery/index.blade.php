@extends('admin.section.main')
@section('title', 'Gallery')
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
                                <li class="breadcrumb-item"><a href="{{ route('gallery.create') }}">Create</a></li>
                                <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
                                <li class="breadcrumb-item active">Create gallery</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end page title -->

        </div> <!-- container -->
    </div>

    <section class="gallery-index py-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card border-0 rounded-4">
                        <div class="card-body">
                            <table class="table">
                               <tr>
                                    <th>Image</th>
                                    <th>Title</th>
                                    <th>Content</th>
                                    <th>Actions</th>
                                </tr>
                                @forelse ($galleries as $gallery)
                                     <tr>
                                    <td>
                                        <img src="{{ asset($gallery->gallery_image) }}" class="rounded-3" width="50" alt="">
                                    </td>
                                    <td>{!! $gallery->gallery_title !!}</td>
                                    <td>{!! $gallery->gallery_description !!}</td>
                                    <td class="d-flex gap-2">
                                        <a href="{{ route('gallery.edit', $gallery->slug) }}" class="btn btn-info" title="Edit">  <i class="mdi mdi-circle-edit-outline"></i> </a>
                                        <a href="#!" class="btn btn-danger"  title="Delete" onclick="event.preventDefault(); if(confirm('Are you sure?')) document.getElementById('del-des{{ $gallery->slug }}').submit();" >  <i class="mdi mdi-delete"></i> </a>

                                        <form id="del-des{{ $gallery->slug }}" action="{{ route('gallery.destroy', $gallery->slug) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                        </form>
                                    </td>
                                </tr>
                                @empty
                                    <tr>
                                        <td colspan="4">
                                            <p class="text-danger lead text-center">You need to Create Gallery</p>
                                        </td>
                                    </tr>
                                @endforelse
                                
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
