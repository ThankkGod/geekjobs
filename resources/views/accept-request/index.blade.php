@extends('admin.section.main')
@section('title', 'Admin accept agent request')
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
                                        <li class="breadcrumb-item active">Agent Request</li>
                                    </ol>
                                   </div>
                                </div>
                            </div>
                        </div>
                        <!-- end page title -->  
                        
                    </div> <!-- container -->

                </div> <!-- content -->

                <section class="Accept-agent-request">
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-md-12">
                               <div class="card border-0 rounded-4">
                                <div class="card-header">
                                   <form action="{{ route('admin.accept.agent.request') }}" method="GET">
                                     <div class="input-group">
                                        <input type="search" name="search" id="" class="form-control" value="{{ Request('search') }}">
                                        <button type="submit" class="btn btn-primary">Search</button>
                                        <a href="{{ route('admin.accept.agent.request') }}"  class="btn btn-success">Cleaar</a>
                                    </div>
                                   </form>
                                </div>
                                <div class="card-body">
                                     <table class="table">
                                    <tr>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>Message</th>
                                        <th>Actions</th>
                                    </tr>
                                    @forelse ($acceptAgentRequests as $acceptAgentRequest)
                                          <tr>
                                        <td>{{ $acceptAgentRequest->company_name }}</td>
                                        <td>{{ $acceptAgentRequest->company_email }}</td>
                                        <td>{{ $acceptAgentRequest->company_phone }}</td>
                                        <td>{{ $acceptAgentRequest->company_message }}</td>
                                        <td>
                                            <a href="#!" class="btn btn-danger" onclick="event.preventDefault(); if(confirm('Are your sure?')) document.getElementById('del{{ $acceptAgentRequest->id }}').submit();">Del</a>
                                            <form id="del{{ $acceptAgentRequest->id }}" action="{{ route('admin.accept.request.destroy', $acceptAgentRequest->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                            </form>
                                        </td>
                                    </tr>
                                    @empty
                                          <tr>
                                        <td> <p class="text-danger lead">There no Agent Request</p></td>
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