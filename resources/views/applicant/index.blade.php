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
                        <div class="col-md-8">
                            
                            <table class="table">
                                <tr>
                                    <th>S/N</th>
                                    <th>Title</th>
                                    <th>Job status</th>
                                    <th>Actions</th>
                                </tr>

                                @forelse ($appliedApplicants as $appliedApplicant)
                                 <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{!! $appliedApplicant->title !!}</td>
                                        <td>
                                            @if($appliedApplicant->status === 'available')
                                            <span class="badge bg-success px-4 rounded-4 py-2">{{ $appliedApplicant->status }}</span>
                                            @endif
                                             @if($appliedApplicant->status === 'expired')
                                            <span class="badge bg-danger  px-4 rounded-4 py-2">{{ $appliedApplicant->status }}</span>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{ route('applied.applied.show', $appliedApplicant->slug) }}" class="btn btn-info">View Applicant</a>
                                        </td>

                                    </tr>
                                @empty
                                @endforelse

                            </table>
                        </div>
                    </div>
                </div>
            </section>

        </div> <!-- container -->

    </div>





@endsection
