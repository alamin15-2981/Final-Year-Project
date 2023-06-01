@extends("users.layouts.master")

<!-- Title For Application -->
@section("user-title")
    Login Page
@endsection

<!-- Main Content Body -->
@section("user-content-body")
    <section id="body-area" class="d-flex justify-content-center align-items-center flex-wrap">
        <div class="container-fluid">
            <div class="row">

                <!-- Welcome Left Aside Bar -->
                <div class="col-xxl-6 text-center d-flex justify-content-center align-items-center" id="login-left-part">
                    <img src="{{ asset('assets/users/img/user/sign-up-form-4575543-3798675.png') }}" alt="...photo" class="img-fluid">
                </div>

                <!-- Welcome Right Aside Bar -->
                <div class="col-xxl-6 d-flex jusify-content-center align-items-center my-3" id="login-right-part">
                    <div class="w-100 border p-4 shadow">
                        <h1 class="display-2 text-bold text-center mb-4">Registration Form</h1>

                        <!-- form code -->
                        <form action="" method="post" enctype="multipart/form-data" class="my-4">
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
                                <input type="submit" value="Sign Up" class="btn btn-sm btn-primary text-bold text-light w-100 py-2 text-uppercase">
                                <span class="text-center mt-4 d-block">
                                    If you have already registered than login now
                                    <a href="{{ route('user_login') }}" class="text-decoration-none">Login</a>
                                </span>
                            </div>
                        </form>

                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection