@extends("users.layouts.master")

<!-- Title For Application -->
@section("user-title")
Job Show
@endsection

<!-- Main Content Body -->
@section("user-content-body")
<div class="container my-5 border shadow-sm p-3">
    <div class="row">
        <div class="col-xxl-12">

            <!-- User Home Cover Photo -->
            <img src="{{ asset('assets/users/img/user/user_home_cover.jpg') }}" alt="...photo" class="img-fluid w-100 object-fit-cover img-thumbnail" id="user-home-cover-pic">

            <!-- Navigation Menu -->
            <x-user-navbar />
            <h1 class="text-end h5 my-4">🅲🅰🆁🅴🅴🆁 🅸🅽🅷🅰🅽🅲🅴</h1>

            <!-- Job Filter -->
            <form action="" method="POST">
                @method("GET")
                <div class="mb-3">
                    <label class="form-label">Jobs</label>
                    <select name="search_title" class="form-control">
                        <option selected disabled>Filter The Job</option>
                        @foreach($info as $item)
                        <option value="{{ $item['title'] }}">{{ $item['title'] }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <input type="submit" value="Filter" class="btn btn-sm btn-info w-100 text-bold text-light">
                </div>
            </form>

            <h4 class="text-uppercase text-bold mb-4" style="margin-top: 75px;"><i class="fa-solid fa-arrow-up-wide-short"></i> Available Jobs</h4>

            <!-- Job Catergory Section -->
            @foreach($jobs as $item)
            <div class="card my-3" id="user-job-card">
                <div class="card-header">
                    <img src="{{ asset('storage/img/company/register/profile/'.$item['profile_photo']) }}" alt="...photo" class="img-fluid img-thumbnail">
                    <span>{{ $item['name'] }}</span>
                </div>
                <div class="card-body">
                    <h5 class="card-title">{{ $item['title'] }}</h5>
                    <p class="card-text text-justify">{{ $item['description'] }}</p>
                </div>
                <div class="card-footer text-body-secondary">
                    <mark>{{ $item['updated_at'] }}</mark>
                    <button class="btn btn-sm btn-primary float-end text-capitalize text-bold" data-bs-toggle="modal" data-bs-target="#exampleModal">upload cv</button>
                    <a href="{{ URL::to('user_job_comment/'.$item['id']) }}" class="btn btn-sm btn-info mx-3">
                        Watch Resume
                    </a>
                </div>

                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <img src="{{ asset('storage/img/users/register/profile/'.$userData['profile_photo']) }}" alt="...photo" class="img-fluid img-thumbnail" id="profile-small-img">
                                <span>{{ $userData["name"] }}</span>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form action="{{ route('user_job_resume_upload') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method("POST")
                                    <div class="mb-3">
                                        <label class="form-label">Upload Resume</label>
                                        <input type="file" name="resume" accept="application/pdf" class="form-control" required>
                                        <input type="hidden" name="user_id" value="{{ $userData['id'] }}">
                                        <input type="hidden" name="job_id" value="{{ $item['id'] }}">
                                    </div>
                                    <div class="mb-3">
                                        <input type="submit" name="btn" value="Upload" class="btn btn-sm btn-primary w-100">
                                    </div>
                                </form>
                            </div>

                        </div>
                    </div>
                </div>

            </div>
            @endforeach

        </div>
    </div>
</div>
@endsection