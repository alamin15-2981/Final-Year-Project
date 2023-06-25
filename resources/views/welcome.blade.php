@extends("users.layouts.master")

<!-- Title For Application -->
@section("user-title")
    Career Inhance
@endsection

<!-- Main Content Body -->
@section("user-content-body")
    <section id="body-area" class="d-flex justify-content-center align-items-center flex-wrap text-center">
        <div class="container-fluid">
            <div class="row">

                <!-- Welcome Left Aside Bar -->
                <div class="col-xxl-6" id="welcome-left-part">
                    <img src="{{ asset('assets/users/img/welcome/undraw_software_engineer_lvl5-1024x726.png') }}" alt="...photo" class="img-fluid">
                </div>

                <!-- Welcome Right Aside Bar -->
                <div class="col-xxl-6" id="welcome-right-part">
                    <h1 class="display-3 text-capitalize text-center text-bold text-primary">Find and apply your dream job with us now</h1>
                    <p class="text-justify my-4">An Employment Website Is A Website That Deals Specifically With Employment Or Careers. Many Employment Websites Are Designed To Allow Employers To Post Job Requirements For A Position To Be Filled And Are Commonly Known As Job Boards.Through A Job Website, A Prospective Employee Can Locate And Fill Out A Job Application Or Submit Resumes Over The Internet For The Advertised Position.</p>

                    <!-- bottom card content -->
                    <section class="d-flex flex-wrap justify-content-center align-items-center">

                        <a href="{{ route('user_login') }}" class="text-decoration-none text-dark card p-3 rounded-2 text-center m-2 bg-primary shadow-sm" id="welcome-card">
                            <img src="{{ asset('assets/users/img/welcome/target-audience.png') }}" alt="...photo" class="img-fluid mx-auto img-thumbnail">
                            <h2 class="mt-3 text-bold text-light">User Login</h2>
                            <p class="text-light">Users should make A profile for Find Dream Job.</p>
                        </a>

                        <a href="{{ route('company_login') }}" class="text-decoration-none text-dark card p-3 rounded-2 m-2 text-center shadow-sm" id="welcome-card">
                            <img src="{{ asset('assets/users/img/welcome/office-building.png') }}" alt="...photo" class="img-fluid mx-auto img-thumbnail">
                            <h2 class="mt-3 text-bold">Company Login</h2>
                            <p>Owner should make A profile for Find Best Employee.</p>
                        </a>

                    </section>

                </div>

            </div>
        </div>
    </section>
@endsection