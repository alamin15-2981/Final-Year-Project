@extends("users.layouts.master")

<!-- Title For Application -->
@section("user-title")
    User Watch Page
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

                <h4 class="text-uppercase text-bold mb-4" style="margin-top: 75px;"><i class="fa-solid fa-arrow-up-wide-short"></i> Watch</h4>

                <!-- Video watch --> 
                <div class="row">
                    <div class="col-xxl-4">
                        <iframe class="ratio ratio-16x9" src="https://www.youtube.com/embed/iQYBGBzMVXY" title="YouTube video player" frameborder="0" allowfullscreen></iframe>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection