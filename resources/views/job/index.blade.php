@extends('agent.section.main')
@section('title', 'All your jobs')
@section('content')

    <div class="px-3">

                    <!-- Start Content-->
                    <div class="container-fluid">
                        
                        <!-- start page title -->
                        <div class="py-3 py-lg-4">
                            <div class="row">
                                <div class="col-lg-6">Agent</h4>
                                </div>
                                <div class="col-lg-6">
                                   <div class="d-none d-lg-block">
                                    <ol class="breadcrumb m-0 float-end">
                                        <li class="breadcrumb-item"><a href="{{ route('posts.create') }}">Create Job</a></li>
                                        <li class="breadcrumb-item"><a href="{{ route('agent.dashboard.index') }}">Dashboard</a></li>
                                        <li class="breadcrumb-item active">All your Jobs</li>
                                    </ol>
                                   </div>
                                </div>
                            </div>
                        </div>
                        <!-- end page title -->  
                        
                    </div> <!-- container -->

                    <section class="all-jobs py-4">
                        <div class="container">
                            <div class="row justify-content-center">
                                <div class="col-md-8">
                                    <div class="text-table-container">
                                        <table class="table">
                                            <thead>
                                            <tr>
                                                <th>S/N</th>
                                                <th>Job Title</th>
                                                <th>Publish status</th>
                                                <th>Action</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                               @forelse ($posts as $post)
                                                    <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $post->title }}</td>
                                                    <td>
                                                        @if ($post->published_at === 'published')
                                                            <span class="badge bg-primary px-4 py-2">{{ $post->published_at }}</span>
                                                        @endif
                                                          @if ($post->published_at === 'pending')
                                                            <span class="badge bg-danger px-4 py-2">{{ $post->published_at }}</span>
                                                        @endif
                                                    </td>
                                                    <td class="d-flex gap-3">
                                                        <a href="{{ route('posts.show', $post->slug) }}" class="btn btn-info"> <i class="mdi mdi-view-stream-outline"></i> View</a>
                                                        <a href="{{ route('posts.edit', $post->slug) }}" class="btn btn-primary"> <i class="mdi mdi-square-edit-outline"></i> Edit</a>
                                                        <a href="#!" class="btn btn-danger" onclick="event.preventDefault(); if(confirm('Are you sure?')) document.getElementById('del-post{{ $post->slug }}').submit();"> <i class="mdi mdi-delete-forever"></i> Danger</a>
                                                        <form id="del-post{{ $post->slug }}" action="{{ route('posts.destroy', $post->slug) }}" method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                        </form>
                                                    </td>
                                                </tr>
                                               @empty
                                                   <tr>
                                                    <td colspan="3" class="text-danger text-center">Create your own job</td>
                                                   </tr>
                                               @endforelse
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>

                </div> <!-- content -->

@endsection
