@extends("company.layouts.master")

<!-- Title For Application -->
@section("user-title")
Company Profile Page
@endsection

<!-- Main Content Body -->
@section("company-content-body")
<div class="container my-5 border shadow-sm p-3">
    <div class="row">
        <div class="col-xxl-12">

            <!-- User Home Cover Photo -->
            <img src="{{ asset('storage/img/company/register/cover/'.$info['cover_photo']) }}" alt="...photo" class="img-fluid w-100 object-fit-cover img-thumbnail" id="user-home-cover-pic">

            <!-- Navigation Menu -->
            <x-company-navbar />
            <h1 class="text-end h5 my-4">🅲🅰🆁🅴🅴🆁 🅸🅽🅷🅰🅽🅲🅴</h1>

            <div class="row">
                <!-- profile photo display -->
                <div class="col-xxl-12 text-end">

                    <figure class="figure">
                        <img src="{{ asset('storage/img/company/register/profile/'.$info['profile_photo']) }}" alt="...photo" class="img-fluid img-thumbnail shadow-sm figure-img rounded-circle" id="profile_photo_size">
                        <figcaption class="figure-caption text-center">{{ $info["name"] }}</figcaption>
                    </figure>

                </div>

                <!-- Idea share form -->
                <div class="col-xxl-12 p-4">

                    @if(session("job_post_success"))
                    <div class="alert alert-success text-center">
                        {{ session("job_post_success") }}
                    </div>
                    @endif

                    <h1 class="text-center">
                        <i class="fa-solid fa-share-from-square"></i>
                        Job Post
                    </h1>
                    <form action="{{ route('company_job_post') }}" method="POST" class="my-4">
                        @csrf
                        @method("POST")
                        <div class="mb-3">
                            <label class="form-label">Title</label>
                            <select name="title" class="form-control">
                                <option selected disabled>Select An Option</option>
                                <option value="Websites, IT & Software">Websites, IT & Software</option>
                                <option value="Mobile Phones & Computing">Mobile Phones & Computing</option>
                                <option value="Writing & Content">Writing & Content</option>
                                <option value="Design, Media & Architecture">Design, Media & Architecture</option>
                                <option value="Data Entry & Admin">Data Entry & Admin</option>
                                <option value="Engineering & Science">Engineering & Science</option>
                                <option value="Product Sourcing & Manufacturing">Product Sourcing & Manufacturing</option>
                                <option value="Sales & Marketing">Sales & Marketing</option>
                                <option value="Freight, Shipping & Transportation">Freight, Shipping & Transportation</option>
                                <option value="Education">Education</option>
                                <option value="Business, Accounting, Human Resources & Legal">Business, Accounting, Human Resources & Legal</option>
                                <option value="Translation & Languages">Translation & Languages</option>
                                <option value="Trades & Services">Trades & Services</option>
                                <option value="Health & Medicine">Health & Medicine</option>
                                <option value="Jobs for Anyone">Jobs for Anyone</option>
                            </select>
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


            @if(count($jobs))
            <!-- Information Show -->
            <h1 class="text-bold text-end mt-4 h5"><i class="fa-sharp fa-solid fa-signs-post"></i> Your Post</h1>
            <div class="row my-5">

                @foreach($jobs as $item)
                <div class="col-xxl-6">
                    <div class="card p-3 border rounded shadow-sm">
                        <div>
                            <img src="{{ asset('storage/img/company/register/profile/'.$item['profile_photo']) }}" alt="...photo" class="img-fluid img-thumbnail" id="profile-small-img">
                            <span>{{ $item["name"] }}</span> <br>
                        </div>
                        <div class="text-end">
                            <span>{{ $item["updated_at"] }}</span> <br>
                            <i class="fa-solid fa-pen-to-square me-3 cursor-pointer" data-bs-toggle="modal" data-bs-target="#updateModal"></i>

                            <a href="{{ URL::to('company_job_delete/'.$item['id']) }}">
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
                                        <img src="{{ asset('storage/img/company/register/profile/'.$item['profile_photo']) }}" alt="...photo" class="img-fluid img-thumbnail" id="profile-small-img">
                                        <span>{{ $item["name"] }}</span>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{ URL::to('company_job_update/'.$item['id']) }}" method="POST" class="my-4">
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

                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                            Feedback
                        </button>

                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <img src="{{ asset('storage/img/company/register/profile/'.$item['profile_photo']) }}" alt="...photo" class="img-fluid img-thumbnail" id="profile-small-img">
                                        <span>{{ $item["name"] }}</span>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{ route('company_job_feedback') }}" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            @method("POST")
                                            <div class="mb-3">
                                                <label class="form-label">Comment</label>
                                                <input type="hidden" id="inputId" name="job_id">
                                                <textarea name="comment" cols="40" rows="7" placeholder="Message" required class="form-control"></textarea>
                                            </div>
                                            <div class="mb-3">
                                                <input type="submit" name="btn" value="Comment" class="btn btn-sm btn-primary w-100">
                                            </div>
                                        </form>
                                    </div>

                                    @foreach($feedback as $data) 
                                    <div class="my-4 px-3 shadow-sm">
                                        <img src="{{ asset('storage/img/company/register/profile/'.$data['profile_photo']) }}" alt="...photo" class="img-fluid img-thumbnail" id="profile-small-img">
                                        <span>{{ $data['name'] }}</span>
                                        <a href="{{ URL::to('company_job_feedback_delete/'.$data['id']) }}">
                                            <i class="fa-solid fa-trash cursor-pointer float-end"></i>
                                        </a>
                                        <p class="text-justify">{{ $data['comment'] }}</p>
                                    </div>
                                    @endforeach

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