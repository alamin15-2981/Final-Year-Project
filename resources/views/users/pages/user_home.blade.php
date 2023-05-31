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

                  <a href="{{ route('user_job_show') }}" class="text-decoration-none text-dark">
                    <div class="col-xxl-4" id="user-home-job-category">
                      <div class="rounded p-3 position-relative">
                        <i class="fa-sharp fa-solid fa-arrow-right me-4"></i> 
                        Web Design
                        <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-info">
                          99+
                        </span>
                      </div>
                    </div>
                  </a>

                </div>


                <h4 class="text-uppercase text-bold mb-4" style="margin-top: 125px;"><i class="fa-solid fa-arrow-up-wide-short"></i> Special Offers</h4>

                <div class="row gy-3">

                  <div class="col-xxl-4">
                    <div class="border rounded p-3 shadow-sm cursor-pointer">
                      <strong class="ms-4"><i class="fa-solid fa-arrow-up-right-dots me-3"></i> Web Design</strong>
                      <p class="text-justify ms-4">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Tempora recusandae neque maiores odit, laboriosam ea unde ratione. Minus, eos fuga.</p>
                    </div>
                  </div>

                  

                </div>

            </div>
        </div>
    </div>
@endsection