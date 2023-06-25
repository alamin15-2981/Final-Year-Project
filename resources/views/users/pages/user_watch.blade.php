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

            @if(count($newArr))

            <h4 class="text-uppercase text-bold mb-4" style="margin-top: 75px;"><i class="fa-solid fa-arrow-up-wide-short"></i> Watch</h4>

            <!-- Video watch -->
            <div class="row">

                @foreach($newArr as $item)
                <div class="col-xxl-6">
                    <div class="card p-3 border-0 shadow rounded">
                        <div>
                            <img src="{{ asset('storage/img/company/register/profile/'.$item['profile_photo']) }}" alt="...photo" class="img-fluid img-thumbnail" id="profile-small-img">
                            <span>{{ $item["name"] }}</span> <br>
                        </div>
                        <div class="text-end">
                            <span>{{ $item["updated_at"] }}</span> <br>
                        </div>
                        <iframe class="ratio ratio-16x9 mt-4" src="{{ $item['url'] }}" title="YouTube video player" frameborder="0" allowfullscreen></iframe>
                        <p class="text-justify my-3">{{ $item["description"] }}</p>
                    </div>
                </div>
                @endforeach

            </div>

        @endif

        </div>
    </div>
</div>
@endsection