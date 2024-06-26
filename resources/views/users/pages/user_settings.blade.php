@extends("users.layouts.master")

<!-- Title For Application -->
@section("user-title")
    User Settings Page
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

                <h4 class="text-uppercase text-bold mb-4" style="margin-top: 75px;"><i class="fa-solid fa-arrow-up-wide-short"></i> Settings</h4>

                <!-- Video watch --> 
                <div class="row">
                    <div class="col-xxl-12">
                        <div class="table-responsive">
                            <table class="table table-borderless table-hover align-middle" style="font-size: 20px;">
                                <tr>
                                    <td>Name</td>
                                    <td>{{ $info["name"] }}</td>
                                </tr>
                                <tr>
                                    <td>Email</td>
                                    <td>{{ $info["email"] }}</td>
                                </tr>
                                <tr>
                                    <td>Profile Photo</td>
                                    <td>
                                        <img width="160" height="160" class="img-fluid img-thumbnail rounded-full" id="user-settings-img-size" src="{{ asset('storage/img/users/register/profile/'.$info['profile_photo']) }}" alt="...photo">
                                    </td>
                                </tr>
                                <tr>
                                    <td>Cover Photo</td>
                                    <td>
                                        <img width="160" height="160" class="img-fluid img-thumbnail rounded-full" id="user-settings-img-size" src="{{ asset('storage/img/users/register/cover/'.$info['cover_photo']) }}" alt="...photo">
                                    </td>
                                </tr>
                                <tr>
                                    <td>Gender</td>
                                    <td>{{ $info["gender"] }}</td>
                                </tr>
                                <tr>
                                    <td>Birth Date</td>
                                    <td>{{ $info["birth_date"] }}</td>
                                </tr>
                                <tr>
                                    <td>Address</td>
                                    <td>{{ $info["address"] }}</td>
                                </tr>
                            </table>
                        </div>
                        <div class="text-end">
                            
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                            Edit Profile
                            </button>

                            <!-- Modal -->
                            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                    <div class="modal-header">
                                        <img src="{{ asset('storage/img/users/register/profile/'.$info['profile_photo']) }}" alt="...photo" class="img-fluid img-thumbnail" id="profile-small-img">
                                        <span>{{ $info["name"] }}</span>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <!-- form code -->
                                        <form action="{{ URL::to('user_settings_update') }}" method="post" enctype="multipart/form-data" class="my-4 text-start">
                                            @csrf 
                                            @method("POST")
                                            <div class="mb-3">
                                                <label class="form-label">
                                                    <i class="fa-sharp fa-solid fa-user"></i> Name
                                                </label>
                                                <input type="text" name="name" placeholder="Name" class="form-control" required value="{{ $info['name'] }}">
                                            </div>


                                            <div class="mb-3">
                                                <label class="form-label">
                                                    <i class="fa-sharp fa-solid fa-envelope"></i> Email
                                                </label>
                                                <input type="email" name="email" placeholder="Email" class="form-control" required value="{{ $info['email'] }}">
                                            </div>

                                            <div class="mb-3">
                                                <label class="form-label">
                                                    <i class="fa-sharp fa-solid fa-image"></i> Photo
                                                </label>
                                                <input type="file" name="profile_photo" class="form-control" accept="image/*" required>
                                            </div>

                                            <div class="mb-3">
                                                <label class="form-label">
                                                    <i class="fa-sharp fa-solid fa-image"></i> Cover Photo
                                                </label>
                                                <input type="file" name="cover_photo" class="form-control" accept="image/*" required>
                                            </div>

                                            <div class="mb-3">
                                                <label class="form-label">
                                                    <i class="fa-sharp fa-solid fa-calendar-days"></i> Birth Date
                                                </label>
                                                <input type="date" name="birth-date" class="form-control" required value="{{ $info['birth_date'] }}">
                                            </div>


                                            <div class="mb-3">
                                                <label class="form-label">
                                                    <i class="fa-sharp fa-solid fa-address-book"></i> Address
                                                </label>
                                                <textarea name="address" cols="40" rows="5" class="form-control" placeholder="Your Address">
                                                    {{ $info['address'] }}
                                                </textarea>
                                            </div>


                                            <div class="mb-3">
                                                <input type="submit" value="Update" class="btn btn-sm btn-primary text-bold text-light w-100 py-2 text-uppercase">
                                            </div>
                                        </form>
                                    </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection