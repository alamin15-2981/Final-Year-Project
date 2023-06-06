@extends("users.layouts.master")

<!-- Title For Application -->
@section("user-title")
User Home Page
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

      <h4 class="text-uppercase text-bold mb-4" style="margin-top: 75px;"><i class="fa-solid fa-arrow-up-wide-short"></i> Job Categories</h4>

      <!-- Job Catergory Section -->
      <div class="row gy-3">

        @foreach($info as $data)
        <div class="col-xxl-4" id="user-home-job-category">
          <a href="{{ route('user_job_show') }}" class="text-decoration-none text-dark">
            <div class="rounded p-3 position-relative">
              <i class="fa-sharp fa-solid fa-arrow-right me-4"></i>
              {{ $data['title'] }}
              <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-info">
                99+
              </span>
            </div>
          </a>
        </div>
        @endforeach

      </div>


      <h4 class="text-uppercase text-bold mb-4" style="margin-top: 125px;"><i class="fa-solid fa-arrow-up-wide-short"></i> Special Offers</h4>

      <div class="row gy-3">

        @foreach($offers as $item)
        <div class="col-xxl-6">
          <div class="border rounded p-3 shadow-sm cursor-pointer">
            <div>
              <img src="{{ asset('storage/img/company/register/profile/'.$item['profile_photo']) }}" alt="...photo" class="img-fluid img-thumbnail" id="profile-small-img">
              <span>{{ $item["name"] }}</span> <br>
            </div>
            <strong class="ms-4 d-block text-center"># {{ $item["title"] }}</strong>
            <div class="text-end">
              <span>{{ $item["updated_at"] }}</span> <br>
            </div>
            <p class="text-justify ms-4">{{ $item["description"] }}</p>
          </div>
        </div>
        @endforeach

      </div>

    </div>
  </div>
</div>
@endsection