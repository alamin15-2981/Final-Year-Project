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
            <img src="{{ asset('storage/img/users/register/cover/'.$info['cover_photo']) }}" alt="...photo" class="img-fluid w-100 object-fit-cover img-thumbnail" id="user-home-cover-pic">

            <!-- Navigation Menu -->
            <x-user-navbar />
            <h1 class="text-end h5 my-4">🅲🅰🆁🅴🅴🆁 🅸🅽🅷🅰🅽🅲🅴</h1>

            <div class="row">
                <!-- profile photo display -->
                <div class="col-xxl-12 text-end">

                    <figure class="figure">
                        <img src="{{ asset('storage/img/users/register/profile/'.$info['profile_photo']) }}" alt="...photo" class="img-fluid img-thumbnail shadow-sm figure-img rounded-circle" id="profile_photo_size">
                        <figcaption class="figure-caption text-center">{{ $info["name"] }}</figcaption>
                    </figure>

                </div>

                <!-- Idea share form -->
                <div class="col-xxl-12 mt-2 border p-4">

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
            <h1 class="text-end mt-4 h5"><i class="fa-sharp fa-solid fa-signs-post"></i> Your Post</h1>
            <div class="row my-5">

            @foreach($jobs as $item)
                <div class="col-xxl-6">
                    <div class="card p-3 border rounded shadow-sm">
                        <div>
                            <img src="{{ asset('storage/img/users/register/profile/'.$item['profile_photo']) }}" alt="...photo" class="img-fluid img-thumbnail" id="profile-small-img">
                            <span>{{ $item["name"] }}</span> <br>
                        </div>
                        <div class="text-end">
                            <span>{{ $item["updated_at"] }}</span> <br>
                            <i class="fa-solid fa-pen-to-square me-3 cursor-pointer" data-bs-toggle="modal" data-bs-target="#updateModal"></i>

                            <a href="{{ URL::to('user_profile_data_delete/'.$item['id']) }}">
                                <i class="fa-solid fa-trash cursor-pointer"></i>
                            </a>
                        </div>
                        <strong class="text-center my-3"># {{ $item["title"] }}</strong>
                        <p class="text-justify my-3">{{ $item["description"] }}</p>

                        <!-- Update Modal -->
                        <div class="modal fade" id="updateModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <img src="{{ asset('storage/img/users/register/profile/'.$item['profile_photo']) }}" alt="...photo" class="img-fluid img-thumbnail" id="profile-small-img">
                                        <span>{{ $item["name"] }}</span>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{ URL::to('user_profile_data_update/'.$item['id']) }}" method="POST" class="my-4">
                                            @csrf
                                            @method("POST")
                                            <div class="mb-3">
                                                <label class="form-label">Title</label>
                                                <input type="text" name="title" placeholder="Write Text" required class="form-control" value="{{ $item['title'] }}">
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">Description</label>
                                                <textarea name="description" class="form-control" cols="40" rows="7" placeholder="Description" required>{{ $item["description"] }}</textarea>
                                            </div>
                                            <div class="mb-3">
                                                <input type="submit" name="btn" value="Update" class="btn btn-sm btn-primary w-100 text-bold">
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                @endforeach

            </div>
        @endif

        </div>
    </div>
</div>
@endsection