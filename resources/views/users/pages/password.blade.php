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
                <div class="col-xxl-6 text-center" id="login-left-part">
                    <img src="{{ asset('assets/users/img/user/reset-password-concept-illustration_114360-7886.png') }}" alt="...photo" class="img-fluid">
                </div>

                <!-- Welcome Right Aside Bar -->
                <div class="col-xxl-6 d-flex jusify-content-center align-items-center mb-3" id="login-right-part">
                    <div class="w-100 border p-4 shadow">
                        @if(session("msg"))
                        <div class="alert alert-success text-center">
                            {{ session("msg") }}
                        </div>
                        @endif
                        <h1 class="display-2 text-bold text-center mb-4">Reset Password</h1>
                        <form action="{{ route('user_change_password_edit') }}" method="POST"> 
                            @csrf 
                            @method("POST")
                            <div class="mb-3">
                                <label class="form-label text-start">Email</label>
                                <input type="email" name="email" placeholder="Email" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Old Password</label>
                                <input type="password" pattern="[A-Za-z0-9]{3,12}" class="form-control" name="old_password" placeholder="Password" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">New Password</label>
                                <input type="password" pattern="[A-Za-z0-9]{3,12}" class="form-control" name="new_password" placeholder="Password" required>
                            </div>
                            <div class="mb-3">
                                <input type="submit" value="Reset" class="btn btn-sm btn-primary text-bold text-light w-100 py-2 text-uppercase">
                                <a href="{{ route('user_login') }}" class="text-decoration-none text-center mt-4 d-block">Login Page << </a>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection