@extends("users.layouts.master")

<!-- Title For Application -->
@section("user-title")
    Job Show
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

                <h4 class="text-uppercase text-bold mb-4" style="margin-top: 75px;"><i class="fa-solid fa-arrow-up-wide-short"></i> Available Jobs</h4>

                <!-- Job Catergory Section -->
                <div class="card my-3" id="user-job-card">
                    <div class="card-header">
                        <img src="https://media.istockphoto.com/id/1177915762/fr/photo/bel-homme-latin.jpg?s=612x612&w=0&k=20&c=p0fE_GYI2mWBJkVkDncsHK_r8UB-DL5h3W5wJPBqJX0=" alt="...photo" class="img-fluid img-thumbnail">
                        <span>Md Shovon</span>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">Full Stack Web Application Developer</h5>
                        <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                        

                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        Launch demo modal
                        </button>

                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                <div class="modal-header">
                                    <img src="https://media.istockphoto.com/id/1177915762/fr/photo/bel-homme-latin.jpg?s=612x612&w=0&k=20&c=p0fE_GYI2mWBJkVkDncsHK_r8UB-DL5h3W5wJPBqJX0=" alt="...photo" class="img-fluid img-thumbnail">
                                    <span>Md Shovon</span>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form action="" method="POST" enctype="multipart/form-data">
                                        <div class="mb-3">
                                            <label class="form-label">Social Media</label>
                                            <input type="url" name="social_url" placeholder="URL" required class="form-control">
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Your CV</label>
                                            <input type="file" name="cv_file" accept="application/pdf" required class="form-control">
                                        </div>
                                        <div class="mb-3">
                                            <input type="submit" name="btn" value="Upload" class="btn btn-sm btn-primary w-100">
                                        </div>
                                    </form>
                                </div>
                                <div class="my-4 px-3">
                                    <img src="https://media.istockphoto.com/id/1177915762/fr/photo/bel-homme-latin.jpg?s=612x612&w=0&k=20&c=p0fE_GYI2mWBJkVkDncsHK_r8UB-DL5h3W5wJPBqJX0=" alt="...photo" class="img-fluid img-thumbnail">
                                    <span>Md Shovon</span>
                                    <i class="fa-solid fa-link float-end cursor-pointer mt-4 text-primary"></i> <br><br>
                                    <img src="https://img.freepik.com/free-vector/modern-cv-template_23-2148773356.jpg?w=2000" alt="...photo" class="w-100 border rounded img-thumbnail">
                                </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="card-footer text-body-secondary">
                        2 days ago
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection