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
                </div>
            </div>
            @endforeach

        </div>
    </div>
</div>
@endsection