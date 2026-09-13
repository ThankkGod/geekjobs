@extends('layout.app')
@section('title', 'agent send request')
@section('content')
    <!--== Start Page Header Area Wrapper ==-->
    <div class="page-header-area sec-overlay sec-overlay-black" data-bg-img="assets/img/photos/bg2.jpg">
        <div class="container pt--0 pb--0">
            <div class="row">
                <div class="col-12">
                    <div class="page-header-content">
                        <h2 class="title">Send Request </h2>
                        <nav class="breadcrumb-area">
                            <ul class="breadcrumb justify-content-center">
                                <li><a href="{{ route('home.index') }}">Home</a></li>
                                <li class="breadcrumb-sep">//</li>
                                {{-- <li>Saved Jobs</li> --}}
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--== End Page Header Area Wrapper ==-->

    <section class="my-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    @if($errors->any())
                    @foreach ($errors->all() as $error )
                    <div class="alert alert-danger mb-2">
                            {{ $error }}
                    </div>
                    @endforeach
                    @endif
                    <form action="{{ route('send.request.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <input type="text" name="company_name" id="" placeholder="Company Name" value="{{ old('company_name') }}" class="form-control">
                        </div>
                         <div class="mb-3">
                            <input type="email" name="company_email" placeholder="Company Email" value="{{ old('company_email') }}" id="" class="form-control">
                        </div>
                        <div class="mb-3">
                            <input type="number" name="company_phone" placeholder="Company Phone Number" value="{{ old('company_phone') }}" id="" class="form-control">
                        </div>
                        <div class="mb-3 form-group">
                            <label for="">Message</label>
                        <textarea class="form-control" name="company_message" id="" rows="3">{{ old('company_message') }} </textarea>
                        </div>

                           <div class="mb-3">
                        <button type="submit" class="btn btn-success py-3 px-5"> Send Request</button>
                        </div>
                      
                    </form>
                </div>
            </div>
        </div>
    </section>

@endsection