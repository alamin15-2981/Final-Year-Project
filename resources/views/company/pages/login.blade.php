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
                    <img src="{{ asset('assets/users/img/user/accounts _ man, workspace, desk, laptop, login, user_md.png') }}" alt="...photo" class="img-fluid">
                </div>

                <!-- Welcome Right Aside Bar -->
                <div class="col-xxl-6 d-flex jusify-content-center align-items-center mb-3" id="login-right-part">
                    <div class="w-100 border p-4 shadow">

                        @if(session("login_failed"))
                            <div class="alert alert-danger text-center">
                                {{ session("login_failed") }}
                            </div>
                        @endif

                        <h1 class="display-2 text-bold text-center mb-4">Login Form</h1>
                        <form action="{{ route('loginData') }}" method="POST" novalidate>
                            @csrf 
                            @method("POST") 
                            <div class="mb-3">
                                <label class="form-label text-start">Email</label>
                                <input type="email" name="email" placeholder="Email" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Password</label>
                                <input type="password" pattern="[A-Za-z0-9]{3,12}" class="form-control" name="password" placeholder="Password" required>
                            </div>
                            <div class="mb-3">
                                <input type="submit" value="Login" class="btn btn-sm btn-primary text-bold text-light w-100 py-2 text-uppercase">
                                <a href="{{ route('company_change_password') }}" class="text-decoration-none text-center mt-4 d-block">Change password?</a>
                                <span class="text-center mt-4 d-block">
                                    If you have not registered, than register now 
                                    <a href="{{ route('company_register') }}" class="text-decoration-none">Register</a>
                                </span>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection