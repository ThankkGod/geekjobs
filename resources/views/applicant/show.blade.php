@extends('agent.section.main')
@section('title', 'Applicant applied jobs')
@section('content')



    <div class="px-3">

        <!-- Start Content-->
        <div class="container-fluid">

            <!-- start page title -->
            <div class="py-3 py-lg-4">
                <div class="row">
                    <div class="col-lg-6">
                        <h4 class="page-title mb-0">Agent</h4>
                    </div>
                    <div class="col-lg-6">
                        <div class="d-none d-lg-block">
                            <ol class="breadcrumb m-0 float-end">
                                <li class="breadcrumb-item"><a href="#!">Back</a></li>
                                <li class="breadcrumb-item"><a href="{{ route('agent.profile') }}">Dashboard</a></li>
                                <li class="breadcrumb-item active">Applied Applicants</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end page title -->

            <section class="applied-applicant-index">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-md-12">
                            <div class="">
                                 <table class="table">
                                    <tr>
                                        <th>Job Title</th>
                                        <th>Job Description</th>
                                    </tr>
                                     <tr>
                                        <td>{!! $post->title !!}</td>
                                        <td>{!! $post->description !!}</td>
                                        
                                     </tr>
                              
                                </table>
                            </div>

                        

                            <p class="lead">Applicant Details</p>
                            <div class="d-flex justify-content-between">
                            
                                <table class="table">
                                    <tr>
                                        <th>Applicant Name</th>
                                        <th>Applicant Email</th>
                                        <th>Applicant Phone</th>
                                        <th>Applicant Location</th>
                                        <th>Resume / CV</th>
                                    </tr>
                                     @foreach ($post->users as $user)
                                     <tr>
                                        <td>{!! $user->name  !!}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>{!! $user->phone  !!}</td>
                                        <td>{!! $user->address  !!}</td>
                                        <td><a href="{{ $user->resume }}" class="btn btn-info" target="_black" >Download resume</a></td>
                                     </tr>
                                @endforeach
                                </table>
                               

                            </div>
                        </div>
                    </div>
                </div>
            </section>

        </div> <!-- container -->

    </div>





@endsection
