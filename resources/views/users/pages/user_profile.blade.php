@extends("users.layouts.master")

<!-- Title For Application -->
@section("user-title")
    User Profile Page
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

                <div class="row">
                    <div class="col-xxl-6">
                        <h1 class="text-center">
                            <i class="fa-solid fa-share-from-square"></i>
                            Share Your Idea
                        </h1>
                        <form action="" method="POST" class="my-4">
                            <div class="mb-3">
                                <label class="form-label">Title</label>
                                <input type="text" name="title" placeholder="Write Text" required class="form-control">
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
                    <div class="col-xxl-6">
                        <img src="https://img.freepik.com/free-vector/modern-cv-template_23-2148773356.jpg?w=2000" alt="...photo" class="img-fluid img-thumbnail shadow-sm">
                    </div>
                </div>


                <!-- Information Show --> 
                <h1 class="text-bold text-center" style="margin-top: 150px;"><i class="fa-sharp fa-solid fa-signs-post"></i> Your Post</h1>
                <div class="row my-5">
                    <div class="col-xxl-4">
                        <div class="card p-3 border rounded shadow-sm">
                            <div>
                                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRHQbvIliUtNl4LkgK2NlrYz4I2wbJtLAH-D6Q_zt44FZHdhZA6pzWn3ghc6Sw5zg0NFMw&usqp=CAU" alt="...photo" class="img-fluid img-thumbnail" id="profile-small-img">
                                <span>Md Shovon</span> <br>
                            </div>
                            <div class="text-end">
                                <span>6/1/2023 <time>2:55 AM</time> </span> <br>
                                <i class="fa-solid fa-pen-to-square me-3 cursor-pointer"></i>
                                <i class="fa-solid fa-trash cursor-pointer"></i>
                            </div>
                            <p class="text-justify my-3">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Tenetur laborum temporibus beatae quos reprehenderit maxime aut perspiciatis, libero commodi cumque assumenda laboriosam error quasi ratione. Repellendus at rem optio a?</p>
                            

                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                            Feedback
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
                                        <form action="" method="POST" enctype="multipart/form-data">
                                            <div class="mb-3">
                                                <label class="form-label">Comment</label>
                                                <textarea name="comment" cols="40" rows="7" placeholder="Message" required class="form-control"></textarea>
                                            </div>
                                            <div class="mb-3">
                                                <input type="submit" name="btn" value="Upload" class="btn btn-sm btn-primary w-100">
                                            </div>
                                        </form>
                                    </div>
                                    <div class="my-4 px-3 shadow-sm">
                                        <img src="https://media.istockphoto.com/id/1177915762/fr/photo/bel-homme-latin.jpg?s=612x612&w=0&k=20&c=p0fE_GYI2mWBJkVkDncsHK_r8UB-DL5h3W5wJPBqJX0=" alt="...photo" class="img-fluid img-thumbnail" id="profile-small-img">
                                        <span>Md Shovon</span>
                                        <i class="fa-solid fa-trash cursor-pointer float-end"></i>
                                        <p class="text-justify">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Facere aperiam nihil exercitationem soluta vitae unde sint consectetur dolorum sunt aliquid.</p>
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