@extends("users.layouts.master")

<!-- Title For Application -->
@section("user-title")
User Profile Page
@endsection

<!-- Main Content Body -->
@section("user-content-body")
<div class="container my-5 border shadow-sm p-3">
    <div class="row">
        <div class="col-xxl-12">

            <!-- User Home Cover Photo -->
            <div class="position-relative">
                <img src="{{ asset('storage/img/users/register/cover/'.$info['cover_photo']) }}" alt="...photo" class="img-fluid w-100 object-fit-cover img-thumbnail" id="user-home-cover-pic">

                <!-- profile photo display -->
                <div style="width: 150px;height: 150px;top: 213px;right: 85px;z-index: 10;" class="position-absolute rounded-circle">
                    <img src="{{ asset('storage/img/users/register/profile/'.$info['profile_photo']) }}" alt="...photo" class="rounded-circle img-thumbnail" style="width: 150px;height: 150px;top: 213px;right: 85px;z-index: 10;">
                </div>
            </div>

            <!-- Navigation Menu -->
            <x-user-navbar />
            <h1 class="text-end h5 my-4">🅲🅰🆁🅴🅴🆁 🅸🅽🅷🅰🅽🅲🅴</h1>
       
            <div class="row">

                <!-- Idea share form -->
                <div class="col-xxl-12 mt-2 border-0 p-4">

                    @if(session("idea_post_success"))
                    <div class="alert alert-success text-center">
                        {{ session("idea_post_success") }}
                    </div>
                    @endif


                    <h1 class="text-center h4">
                        <i class="fa-solid fa-share-from-square"></i>
                        Share Your Idea
                    </h1>
                    <form action="{{ route('user_profile_data') }}" method="POST" class="my-4" novalidate>
                        @csrf
                        @method("POST")
                        <div class="mb-3">
                            <label class="form-label">Title</label>
                            <input type="text" name="title" placeholder="Write Text" required class="form-control">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Description</label>
                            <textarea name="description" class="form-control" cols="40" rows="7" placeholder="Description" required></textarea>
                        </div>
                        <div class="mb-3">
                            <input type="submit" name="btn" value="Submit" class="btn btn-sm btn-primary w-100 text-bold">
                        </div>
                    </form>

                </div>
            </div>


            <!-- Information Show -->
            @if(count($jobs))
            <div class="row my-5">

                @foreach($jobs as $item)
                <div class="col-xxl-6">
                    <div class="card p-3 border-0 shadow">
                        <div>
                            <img src="{{ asset('storage/img/users/register/profile/'.$item['profile_photo']) }}" alt="...photo" class="img-fluid img-thumbnail" id="profile-small-img">
                            <span>{{ $item["name"] }}</span> <br>
                        </div>
                        <div class="text-end">
                            <span>{{ $item["updated_at"] }}</span> <br>
                            <a href="{{ URL::to('/users_update_information/'.$item['id']) }}">
                                <i class="fa-solid fa-pen-to-square me-3 cursor-pointer" data-bs-toggle="modal" data-bs-target="#updateModal"></i>
                            </a>

                            <a href="{{ URL::to('user_profile_data_delete/'.$item['id']) }}">
                                <i class="fa-solid fa-trash cursor-pointer"></i>
                            </a>
                        </div>
                        <strong class="text-center my-3"># {{ $item["title"] }}</strong>
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