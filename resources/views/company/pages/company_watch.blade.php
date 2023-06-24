@extends("company.layouts.master")

<!-- Title For Application -->
@section("user-title")
Company Watch Page
@endsection

<!-- Main Content Body -->
@section("company-content-body")
<div class="container my-5 border shadow-sm p-3">
    <div class="row">
        <div class="col-xxl-12">

            <!-- User Home Cover Photo -->
            <img src="{{ asset('assets/users/img/user/user_home_cover.jpg') }}" alt="...photo" class="img-fluid w-100 object-fit-cover img-thumbnail" id="user-home-cover-pic">

            <!-- Navigation Menu -->
            <x-company-navbar />
            <h1 class="text-end h5 my-4">🅲🅰🆁🅴🅴🆁 🅸🅽🅷🅰🅽🅲🅴</h1>

            @if(session("watch_post_success"))
            <div class="alert alert-success text-center">
                {{ session("watch_post_success") }}
            </div>
            @endif

            <h4 class="text-uppercase text-bold mb-4" style="margin-top: 75px;"><i class="fa-solid fa-arrow-up-wide-short"></i> Watch</h4>

            <form action="{{ route('company_watch_data') }}" method="POST">
                @csrf
                @method("POST")
                <div class="mb-3">
                    <label class="form-label">Url <span class="text-success">(Only Youtube Video Embed Url Acceptable Like -> https://www.youtube.com/embed/cNfINi5CNbY)*</span></label>
                    <input type="url" name="title" class="form-control" placeholder="Video Url" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Description</label>
                    <textarea name="description" class="form-control" cols="40" rows="7" placeholder="Description" required></textarea>
                </div>
                <div class="mb-3">
                    <input type="submit" name="btn" value="Submit" class="btn btn-sm btn-primary w-100 text-bold">
                </div>
            </form>

            @if(count($newArr))
            <!-- Video watch -->
            <h4 class="text-uppercase text-bold mb-4 text-end h6" style="margin-top: 75px;"><i class="fa-solid fa-arrow-up-wide-short"></i> Your Watch Video</h4>

            <div class="row my-4">

                @foreach($newArr as $item)
                <div class="col-xxl-6">
                    <div class="card p-3 border rounded shadow-sm">
                        <div>
                            <img src="{{ asset('storage/img/company/register/profile/'.$item['profile_photo']) }}" alt="...photo" class="img-fluid img-thumbnail" id="profile-small-img">
                            <span>{{ $item["name"] }}</span> <br>
                        </div>
                        <div class="text-end">
                            <span>{{ $item["updated_at"] }}</span> <br>

                            <i class="fa-solid fa-pen-to-square me-3 cursor-pointer" data-bs-toggle="modal" data-bs-target="#updateModal"></i>

                            <a href="{{ URL::to('/company_watch_delete/'.$item['id']) }}">
                                <i class="fa-solid fa-trash cursor-pointer"></i>
                            </a>
                        </div>
                        <iframe class="ratio ratio-16x9 mt-4" src="{{ $item['url'] }}" title="YouTube video player" frameborder="0" allowfullscreen></iframe>
                        <p class="text-justify my-3">{{ $item["description"] }}</p>

                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                            Feedback
                        </button>
                    </div>


                    <!-- Update Modal -->
                    <div class="modal fade" id="updateModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <img src="{{ asset('storage/img/company/register/profile/'.$item['profile_photo']) }}" alt="...photo" class="img-fluid img-thumbnail" id="profile-small-img">
                                    <span>{{ $item['name'] }}</span>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form action="{{ URL::to('/company_watch_update/'.$item['id']) }}" method="POST" class="my-4">
                                        @csrf
                                        @method("POST")
                                        <div class="mb-3">
                                            <label class="form-label">Title</label>
                                            <input type="text" name="title" placeholder="Write Text" required class="form-control" value="{{ $item['url'] }}">
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Description</label>
                                            <textarea name="description" class="form-control" cols="40" rows="7" placeholder="Description" required>{{ $item['description'] }}</textarea>
                                        </div>
                                        <div class="mb-3">
                                            <input type="submit" name="btn" value="Update" class="btn btn-sm btn-primary w-100 text-bold">
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <img src="{{ asset('storage/img/company/register/profile/'.$item['profile_photo']) }}" alt="...photo" class="img-fluid img-thumbnail" id="profile-small-img">
                                    <span>{{ $item['name'] }}</span>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form action="{{ route('company_watch_feedback') }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        @method("POST")
                                        <div class="mb-3">
                                            <label class="form-label">Comment</label>
                                            <textarea name="comment" cols="40" rows="7" placeholder="Message" required class="form-control"></textarea>
                                        </div>
                                        <div class="mb-3">
                                            <input type="submit" name="btn" value="Upload" class="btn btn-sm btn-primary w-100">
                                        </div>
                                    </form>
                                </div>
                                @foreach($feedback as $data)
                                <div class="my-4 px-3 shadow-sm">
                                    <img src="{{ asset('storage/img/company/register/profile/'.$item['profile_photo']) }}" alt="...photo" class="img-fluid img-thumbnail" id="profile-small-img">
                                    <span>{{ $item["name"] }}</span>
                                    <a href="{{ URL::to('/company_watch_delete_feedback/'.$data['id']) }}">
                                        <i class="fa-solid fa-trash cursor-pointer float-end"></i>
                                    </a>
                                    <p class="text-justify">{{ $data["comment"] }}</p>
                                </div>
                                @endforeach
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