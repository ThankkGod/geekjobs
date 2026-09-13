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
                            <li class="breadcrumb-item active">Agent Detail</li>
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
                                        <span><a href="{{ route('agents.index') }}" class="btn btn-primary"> <i
                                                    class="mdi mdi-chevron-left"></i> All agents</a></span>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="card-body">
                            <table id="datatable-buttons" class="table table-striped dt-responsive nowrap w-100">
                                <div class="row">
                                    <tr>
                                        <td>
                                            <div class="col-md-4">
                                                <img src="{{ asset($user->profile_pic) }}" width="70" alt=""
                                                    class="img fluid border rounded-2">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="col-md-4">
                                                {{-- {{ $user->name }} --}}
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="col-md-4">
                                                Company Name:
                                            </div>
                                        </td>
                                        <td>
                                            <div class="col-md-4">
                                                {{ $user->name }}
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="col-md-4">
                                                Company Email:
                                            </div>
                                        </td>
                                        <td>
                                            <div class="col-md-4">
                                                {{ $user->email }}
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="col-md-4">
                                                Company Phone:
                                            </div>
                                        </td>
                                        <td>
                                            <div class="col-md-4">
                                                {{ $user->phone }}
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="col-md-4">
                                                Company Address:
                                            </div>
                                        </td>
                                        <td>
                                            <div class="col-md-4">
                                                {{ $user->address }}
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="col-md-4">
                                                Company Status:
                                            </div>
                                        </td>
                                        <td>
                                            <div class="col-md-4">
                                                 <form action="{{ route('agents.status', $user->id) }}" method="POST">
                                                @csrf
                                                {{-- @method('PUT') --}}
                                                <div class="form-check form-switch">
                                                    <input class="form-check-input" type="checkbox" name="status" role="switch" onchange="this.form.submit()"
                                                        id="switchCheckDefault" {{ $user->status === 'unblock'?'checked':''}}>
                                                    
                                                </div>
                                            </form>

                                                @if ($user->status === 'unblock')
                                                    <span class="badge rounded-3 bg-success py-2 px-3">
                                                        {{ ucfirst($user->status) }}</span>
                                                @else
                                                    <span class="badge rounded-3 bg-danger py-2 px-3">
                                                        {{ ucfirst($user->status) }}</span>
                                                @endif
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="col-md-4">
                                                Role :
                                            </div>
                                        </td>
                                        <td>
                                            <div class="col-md-4">
                                                {{ ucfirst($user->role) }}
                                            </div>
                                        </td>
                                    </tr>
                                </div>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


@endsection
