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
                <img src="{{ asset('assets/users/img/user/user_home_cover.jpg') }}" alt="...photo" class="img-fluid w-100 object-fit-cover img-thumbnail" id="user-home-cover-pic">

                <!-- Navigation Menu --> 
                <x-user-navbar />
                <h1 class="text-end h5 my-4">🅲🅰🆁🅴🅴🆁 🅸🅽🅷🅰🅽🅲🅴</h1>

                <h4 class="text-uppercase text-bold mb-4" style="margin-top: 75px;"><i class="fa-solid fa-arrow-up-wide-short"></i> Settings</h4>

                <!-- Video watch --> 
                <div class="row">
                    <div class="col-xxl-12">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-hover text-justify">
                                <caption class="text-center">Your's Information</caption>
                                <tr>
                                    <td>Name</td>
                                    <td>Al Amin</td>
                                </tr>
                                <tr>
                                    <td>Email</td>
                                    <td>alamin15-2981@diu.edu.bd</td>
                                </tr>
                                <tr>
                                    <td>Password</td>
                                    <td>alamin@1234</td>
                                </tr>
                                <tr>
                                    <td>Profile Photo</td>
                                    <td>
                                        <img width="60" height="60" class="img-fluid img-thumbnail rounded-circle" id="user-settings-img-size" src="https://i.guim.co.uk/img/media/63de40b99577af9b867a9c57555a432632ba760b/0_266_5616_3370/master/5616.jpg?width=1200&height=1200&quality=85&auto=format&fit=crop&s=93458bbe24b9f88451ea08197888ab8e" alt="...photo">
                                    </td>
                                </tr>
                                <tr>
                                    <td>Cover Photo</td>
                                    <td>
                                        <img width="60" height="60" class="img-fluid img-thumbnail rounded-circle" id="user-settings-img-size" src="https://i.guim.co.uk/img/media/63de40b99577af9b867a9c57555a432632ba760b/0_266_5616_3370/master/5616.jpg?width=1200&height=1200&quality=85&auto=format&fit=crop&s=93458bbe24b9f88451ea08197888ab8e" alt="...photo">
                                    </td>
                                </tr>
                                <tr>
                                    <td>Gender</td>
                                    <td>Male</td>
                                </tr>
                                <tr>
                                    <td>Birth Date</td>
                                    <td>25/11/1998</td>
                                </tr>
                                <tr>
                                    <td>Address</td>
                                    <td>Chandpur,Meherpur</td>
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
                                        <img src="https://media.istockphoto.com/id/1177915762/fr/photo/bel-homme-latin.jpg?s=612x612&w=0&k=20&c=p0fE_GYI2mWBJkVkDncsHK_r8UB-DL5h3W5wJPBqJX0=" alt="...photo" class="img-fluid img-thumbnail" id="profile-small-img">
                                        <span>Md Shovon</span>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <!-- form code -->
                                        <form action="" method="post" enctype="multipart/form-data" class="my-4 text-start">
                                            <div class="mb-3">
                                                <label class="form-label">
                                                    <i class="fa-sharp fa-solid fa-user"></i> Name
                                                </label>
                                                <input type="text" name="name" placeholder="Name" class="form-control" required>
                                            </div>


                                            <div class="mb-3">
                                                <label class="form-label">
                                                    <i class="fa-sharp fa-solid fa-envelope"></i> Email
                                                </label>
                                                <input type="email" name="email" placeholder="Email" class="form-control" required>
                                            </div>


                                            <div class="mb-3">
                                                <label class="form-label">
                                                    <i class="fa-sharp fa-solid fa-lock"></i> Password
                                                </label>
                                                <input type="password" name="password" placeholder="Password" class="form-control" pattern="[A-Za-z0-9]{6,81}" required>
                                            </div>


                                            <div class="mb-3">
                                                <label class="form-label">
                                                    <i class="fa-sharp fa-solid fa-image"></i> Photo
                                                </label>
                                                <input type="file" name="photo" class="form-control" accept="image/*" required>
                                            </div>

                                            <div class="mb-3">
                                                <label class="form-label">
                                                    <i class="fa-sharp fa-solid fa-image"></i> Cover Photo
                                                </label>
                                                <input type="file" name="photo" class="form-control" accept="image/*" required>
                                            </div>


                                            <div class="mb-3">
                                                <label class="form-label">
                                                    <i class="fa-sharp fa-solid fa-user-tie"></i> Gender
                                                </label> <br>
                                                <input type="radio" class="form-check-input" name="gender" value="Male"> Male &nbsp;&nbsp;
                                                <input type="radio" class="form-check-input" name="gender" value="Female"> Female &nbsp;&nbsp;
                                                <input type="radio" class="form-check-input" name="gender" value="Others"> Others
                                            </div>


                                            <div class="mb-3">
                                                <label class="form-label">
                                                    <i class="fa-sharp fa-solid fa-calendar-days"></i> Birth Date
                                                </label>
                                                <input type="date" name="birth-date" class="form-control" required>
                                            </div>


                                            <div class="mb-3">
                                                <label class="form-label">
                                                    <i class="fa-sharp fa-solid fa-address-book"></i> Address
                                                </label>
                                                <textarea name="address" cols="40" rows="5" class="form-control" placeholder="Your Address"></textarea>
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