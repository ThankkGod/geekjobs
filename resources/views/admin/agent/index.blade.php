@extends('admin.section.main')
@section('title', 'All agents')
@section('content')

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
                            <li class="breadcrumb-item active">All Agent</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <!-- end page title -->
    </div>
    <!-- container -->

    <!-- View all agent -->
    <section class="view-all-agent py-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card border-0 rounded-3">
                        <div class="card-header">
                            <div class="">
                                <div class="row">
                                    <div class="col-sm-4 col-md-4">
                                        <span><a href="{{ route('agents.create') }}" class="btn btn-primary"> <i
                                                    class="mdi mdi-account-circle"></i> Create Agent Account</a></span>
                                    </div>
                                    <div class="  col-lg-8  mt-3 mt-md-0">
                                        <span>
                                            <form action="{{ route('agents.index') }}" method="GET">
                                                <div class="input-group">
                                                    <input type="search" name="search" value="{{ Request('search') }}" id=""
                                                        class="form-control">
                                                    <button class="btn btn-primary"><i class="mdi mdi-account-search"></i>
                                                        search</button> 
                                                        <span><a href="{{ route('agents.index') }}" class="btn btn-success rounded-start-0"> <i class="mdi mdi-restore"></i> clear</a></span>
                                                </div>

                                            </form>
                                        </span>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="card-body">
                            <table id="datatable-buttons" class="table table-striped dt-responsive nowrap w-100">
                                <thead>
                                    <tr>
                                        <th>S/N</th>
                                        <th>Agent Name</th>
                                        <th>Role</th>
                                        <th>Status</th>
                                        <th colspan="3" class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                     @forelse($users as $key => $user)
                                    <tr>
                                        <td>{{ $key +1 }}</td>
                                        <td>{{ ucfirst($user->name )}}</td>
                                        <td>{{ ucfirst($user->role )}}</td>
                                        <td>
                                        @if($user->status ==='unblock')
                                        <span class="badge rounded-3 bg-success py-2 px-3"> {{ ucfirst($user->status) }}</span>
                                        @else
                                         <span class="badge rounded-3 bg-danger py-2 px-3"> {{ ucfirst($user->status) }}</span>
                                        @endif
                                        </td>
                                        <td>
                                            <a href="{{ route('agents.show', $user->id) }}" class="btn btn-info"> <i class="mdi mdi-eye-outline"></i></a>

                                        </td>
                                        <td>
                                            <a href="{{ route('agents.edit', $user->id) }}" class="btn btn-warning"> <i
                                                    class="mdi mdi-account-edit-outline"></i></a>
                                        </td>
                                        <td>
                                            <a href="#!" class="btn btn-danger" onclick="event.preventDefault(); if(confirm('Are you sure?')) document.getElementById('form-del{{ $user->id }}').submit();" > <i
                                                    class="mdi mdi-delete-forever-outline"></i></a>
                                                    <form id="form-del{{ $user->id }}" action="{{ route('agents.destroy', $user->id) }}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                    </form>
                                        </td>

                                    </tr>
                                    
                                    @empty
                                       <td colspan="5">
                                            <p class="text-danger text-center fs-4">No Agents match your search </p>
                                        </td>

                                    </tr>
                                       
                                    @endforelse
                                     <div>
                                            @if($users->count())
                                            {{$users->links()}}
                                            @endif
                                        </div>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


@endsection

