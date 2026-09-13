
@extends('agent.section.main')
@section('title', $post->title)
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
                                <li class="breadcrumb-item"><a href="{{ route('posts.index') }}">Back</a></li>
                                <li class="breadcrumb-item"><a href="{{ route('agent.dashboard.index') }}">Dashboard</a></li>
                                <li class="breadcrumb-item active">Job Details</li>
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
                                <div class="row">
                                      <div class="row">
                                    <div class="col-md-8">
                                        <tr>
                                            <td>Job Feature Image:</td>
                                            <td> <img src="{{asset($post->feature_image) }}" width="300" alt="job feature image" class="img-fluid rounded-3"></td>
                                        </tr>
                                    </div>
                                </div>
                                    <div class="col-md-8">
                                        <tr>
                                            <td>Title:</td>
                                            <td>{{ $post->title }}</td>
                                        </tr>
                                    </div>
                                </div>
                                 <div class="row">
                                    <div class="col-md-8">
                                        <tr>
                                            <td>Job Type:</td>
                                            <td>{{ $post->job_type }}</td>
                                        </tr>
                                    </div>
                                </div>
                                 <div class="row">
                                    <div class="col-md-8">
                                        <tr>
                                            <td>Experience Level:</td>
                                            <td>{{ $post->experince_level }}</td>
                                        </tr>
                                    </div>
                                </div>
                                   <div class="row">
                                    <div class="col-md-8">
                                        <tr>
                                            <td>Salary:</td>
                                            <td> NGN {{ number_format($post->salary,2) }}</td>
                                        </tr>
                                    </div>
                                </div>
                                   <div class="row">
                                    <div class="col-md-8">
                                        <tr>
                                            <td>Vacancy:</td>
                                            <td> {{ $post->vacancy }}</td>
                                        </tr>
                                    </div>
                                </div>
                                   <div class="row">
                                    <div class="col-md-8">
                                        <tr>
                                            <td>Job Category:</td>
                                            <td> {{ $post->category->name }}</td>
                                        </tr>
                                    </div>
                                </div>
                                   <div class="row">
                                    <div class="col-md-8">
                                        <tr>
                                            <td>Location:</td>
                                            <td> {{ $post->location }}</td>
                                        </tr>
                                    </div>
                                </div>
                                   <div class="row">
                                    <div class="col-md-8">
                                        <tr>
                                            <td>Application Closing date:</td>
                                            <td> {{ Carbon\Carbon::parse($post->application_deadline)->format('d-m-Y') }}</td>
                                        </tr>
                                    </div>
                                </div>
                                   <div class="row">
                                    <div class="col-md-8">
                                        <tr>
                                            <td>Job Status:</td>
                                            <td> 
                                                <form action="{{ route('post.job.status', $post->slug) }}" method="POST">
                                                    @csrf 
                                                    @method('PUT')
                                                   @if ($post->status === 'available' )
                                                    <span class="badge bg-success px-4 py-2">{{ ucfirst($post->status) }}</span>
                                                @endif
                                                 @if ($post->status === 'expired' )
                                                    <span class="badge bg-danger px-4 py-2">{{ ucfirst($post->status) }}</span>
                                                @endif
                                                    <input type="checkbox" onchange="this.form.submit();" name="status" class="form-check-input px-2 py-2 ms-2 mt-2 bg-success"  {{ $post->status ==='available'?'Checked':'' }} id="" >
                                                </form>
                                            </td>
                                        </tr>
                                    </div>
                                </div>
                                   <div class="row">
                                    <div class="col-md-8">
                                        <tr>
                                            <td>Publish Date:</td>
                                            <td> 

                                                     <form action="{{ route('post.job.change', $post->slug) }}" method="POST">
                                                    @csrf 
                                                    @method('PUT')
                                                   @if ($post->published_at === 'published' )
                                                    <span class="badge bg-success px-4 py-2">{{ ucfirst($post->published_at) }}</span>
                                                @endif
                                                 @if ($post->published_at === 'pending' )
                                                    <span class="badge bg-danger px-4 py-2">{{ ucfirst($post->published_at) }}</span>
                                                @endif
                                                    <input type="checkbox" onchange="this.form.submit();" name="published_at" class="form-check-input px-2 py-2 ms-2 mt-2 bg-success"  {{ $post->published_at  ==='published'?'Checked':'' }} id="" >
                                                </form>
                                            </td>
                                        </tr>
                                    </div>
                                </div>
                                   <div class="row">
                                    <div class="col-md-8">
                                        <tr>
                                            <td>Job Expiration Date:</td>
                                            <td> {{ $post->job_expired }}</td>
                                        </tr>
                                    </div>
                                </div>
                                  <div class="row">
                                    <div class="col-md-8">
                                        <tr>
                                            <td>Job gender Requirement:</td>
                                            <td> {{ Str::ucfirst($post->gender) }}</td>
                                        </tr>
                                    </div>
                                </div>
                                   <div class="row">
                                    <div class="col-md-8">
                                        <tr>
                                            <td>Job Responsibilities:</td>
                                            <td> {!! $post->responsibilities !!}</td>
                                        </tr>
                                    </div>
                                </div>
                                 <div class="row">
                                    <div class="col-md-8">
                                        <tr>
                                            <td>Job Requirements:</td>
                                            <td> {!! $post->requirement !!}</td>
                                        </tr>
                                    </div>
                                </div>
                                  <div class="row">
                                    <div class="col-md-8">
                                        <tr>
                                            <td>Job Description:</td>
                                            <td> {!! $post->description !!}</td>
                                        </tr>
                                    </div>
                                </div>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </div> <!-- content -->

@endsection
