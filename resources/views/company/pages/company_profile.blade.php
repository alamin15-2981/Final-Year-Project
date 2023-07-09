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
            <div class="position-relative">
                <img src="{{ asset('storage/img/company/register/cover/'.$info['cover_photo']) }}" alt="...photo" class="img-fluid w-100 object-fit-cover img-thumbnail" id="user-home-cover-pic">

                <!-- profile photo display -->
                <div style="width: 150px;height: 150px;top: 213px;right: 85px;z-index: 10;" class="position-absolute rounded-circle">
                    <img src="{{ asset('storage/img/company/register/profile/'.$info['profile_photo']) }}" alt="...photo" class="img-thumbnail rounded-circle" width="150px" height="150px" style="width: 150px;height: 150px;top: 213px;right: 85px;z-index: 10;">
                </div>
            </div>


            <!-- Navigation Menu -->
            <x-company-navbar />
            <h1 class="text-end h5 my-4">🅲🅰🆁🅴🅴🆁 🅸🅽🅷🅰🅽🅲🅴</h1>

            <div class="row">

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
            <div class="row">

                @foreach($jobs as $item)
                <div class="col-xxl-6 mb-4">
                    <div class="card p-3 border-0 shadow">
                        <div>
                            <img src="{{ asset('storage/img/company/register/profile/'.$item['profile_photo']) }}" alt="...photo" class="img-fluid img-thumbnail" id="profile-small-img">
                            <span>{{ $item["name"] }}</span> <br>
                        </div>
                        <div class="text-end">
                            <span>{{ $item["updated_at"] }}</span> <br>

                            <a href="{{ URL::to('/company_update_information/'.$item['id'].'/company_job_post') }}">
                                <i class="fa-solid fa-pen-to-square me-3 cursor-pointer" data-bs-toggle="modal" data-bs-target="#updateModal"></i>
                            </a>

                            <a href="{{ URL::to('company_job_delete/'.$item['id']) }}">
                                <i class="fa-solid fa-trash cursor-pointer"></i>
                            </a>
                        </div>
                        <strong class="text-center my-3"># {{ $item["title"] }}</strong>
                        <p class="text-justify my-3">{{ $item["description"] }}</p>

                        <a href="{{ URL::to('company_job_comment/'.$item['id']) }}" class="btn btn-sm text-end mx-3 text-decoration-underline text-primary">
                            Watch Resume
                        </a>


                    </div>
                </div>
                @endforeach

            </div>
            @endif

        </div>
    </div>
</div>
@endsection