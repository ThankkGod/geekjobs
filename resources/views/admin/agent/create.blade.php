@extends('admin.section.main')
@section('title', 'Create agent')
@section('content')

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
                            <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active">Admin Create Agent</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <!-- end page title -->
    </div> <!-- container -->

    {{-- Create form --}}
    <section class="create-agent py-5">
        <div class="container">
            <div class="row">
                <div class="card rounded-3">
                    <div class="card-header">
                        <div class="d-flex justify-content-between">
                            <h5 class="fw-medium my-4"> </h5>
                            <div class="my-2"><a href="{{ route('agents.index') }}" class="btn btn-primary"><i class="mdi mdi-chevron-left"></i> Back</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col md-6">
                    <div class="text-container">
                        <div class="card border-0 rounded-3">
                            <div class="card-body">
                                @if ($errors->any())
                                    @foreach ($errors->all() as $error)
                                        <div class="alert alert-danger"> {{ $error }}</div>
                                    @endforeach
                                @endif

                                <form action="{{ route('agents.store') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <label for="" class="form-label">Agent Company Name</label>
                                    <input type="text" name="name" id="" class="form-control mb-3">
                                    <label for="" class="form-label">Agent Company  Email</label>
                                    <input type="text" name="email" id="" class="form-control mb-3">
                                    {{-- <label for="" class="form-label">Password</label>
                                    <input type="password" name="password" id="password" class="form-control mb-3">
                                    <label for="" class="form-label">Re-type Password</label>
                                    <input type="password" name="password_confirmation" id="password_confirmation"
                                        class="form-control mb-3"> --}}
                                  {{-- <div>
                                      <input type="checkbox" id="" onclick="togglePassword()" class="form-check-input mb-3">
                                    <label for="" class="" >Show password</label>
                                  </div> --}}

                                    <button type="submit" class="btn btn-primary px-4">Create Agent</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection

 <script>
        function togglePassword(){
            let password  = document.getElementById('password');
            let password_confirmation  = document.getElementById('password_confirmation');

            password.type = password.type ==='password'?'text':'password'
            password_confirmation.type = password_confirmation.type ==='password'?'text':'password'
        }
 </script>
