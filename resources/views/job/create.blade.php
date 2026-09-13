@extends('agent.section.main')
@section('title', 'Create Job')
@section('content')

    <div class="px-3">

        <!-- Start Content-->
        <div class="container-fluid">
            <!-- start page title -->
            <div class="py-3 py-lg-4">
                <div class="row">
                    <div class="col-lg-6">
                        <h4 class="page-title mb-0">Agent Create Job Application</h4>
                    </div>
                    <div class="col-lg-6">
                        <div class="d-none d-lg-block">
                            <ol class="breadcrumb m-0 float-end">
                                <li class="breadcrumb-item"><a href="{{ route('posts.index') }}">All jobs</a></li>
                                <li class="breadcrumb-item"><a href="{{ route('agent.dashboard.index') }}">Dashboard</a>
                                </li>
                                <li class="breadcrumb-item active">Create job</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end page title -->
        </div> <!-- container -->
    </div>

    <section class="create-job py-5 px-3">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    @if ($errors->any())
                        @foreach ($errors->all() as $error)
                            <div class="alert alert-danger">{{ $error }}</div>
                        @endforeach
                    @endif
                    <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <input type="text" name="title" value="{{ old('title') }}" id=""
                                class="form-control form-control-lg" placeholder=" Job Title">
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <select name="job_type" id="" class="form-select">
                                        <option value="">Choose job type </option>
                                        <option value="Full time">Full-time </option>
                                        <option value="Part time">Part-time </option>
                                        <option value="Remote">Remote </option>
                                        <option value="Contract">Contract </option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <select name="experince_level" id="" class="form-select">
                                        <option value="">Choose Experience </option>
                                        <option value="Entry">Entry </option>
                                        <option value="Intermediate">Intermediate </option>
                                        <option value="Expert">Expert </option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <input type="number" name="salary" value="{{ old('salary') }}" placeholder="Salary"
                                        id="" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <input type="text" name="location" value="{{ old('location') }}"
                                        placeholder="Job Address" id="" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <select name="vacancy" id="" class="form-select">
                                        <option value="">Choose Vacancy </option>
                                        <option value="1">1 Vacancy </option>
                                        <option value="2">2 Vacancies </option>
                                        <option value="3">3 Vacancies</option>
                                        <option value="4">4 Vacancies</option>
                                        <option value="5">5 Vacancies</option>
                                        <option value="6">6 Vacancies</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <select name="category_id" id="" class="form-select">
                                        <option value="">Choose Job Category </option>
                                        @forelse ($categories as $key => $category)
                                            <option value="{{ $category->id }}"> {{ $category->name }}</option>
                                        @empty
                                            <option value="" class="text-danger">Categories are yet to be created
                                            </option>
                                        @endforelse
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="" class="form-label">Application Deadline</label>
                                    <input type="date" name="application_deadline"
                                        value="{{ old('application_deadline') }}" class="form-control" id="">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="" class="form-label">Feature image</label>
                                    <input type="file" name="feature_image" accept="image/*" class="form-control"
                                        id="">
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <select name="gender" id="" class="form-select">
                                <option value="">Choose Job Gender </option>
                                <option value="male"> Male </option>
                                <option value="female"> Female </option>
                                <option value="no gender specific"> No Gender Specific</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <textarea name="responsibilities" class="form-control" placeholder="Job Responsibilities" id="">{{ old('responsibilities') }}</textarea>
                        </div>
                        <div class="mb-3">
                            <textarea name="requirement" class="form-control" placeholder="Job requirement" id="">{{ old('requirement') }}</textarea>
                        </div>
                        <div class="mb-3">
                            <textarea name="description" class="form-control" placeholder="Job Description" id="">{{ old('description') }}</textarea>
                        </div>
                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary px-5 py-3">Create Job</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>



@endsection
