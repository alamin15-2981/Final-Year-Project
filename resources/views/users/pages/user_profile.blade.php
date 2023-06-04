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
                    <!-- profile photo display --> 
                    <div class="col-xxl-12 text-end">

                        <figure class="figure">
                            <img src="https://images.unsplash.com/photo-1560250097-0b93528c311a?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8N3x8dXNlcnxlbnwwfHwwfHx8MA%3D%3D&w=1000&q=80" alt="...photo" class="img-fluid img-thumbnail shadow-sm figure-img rounded-circle" id="profile_photo_size">
                            <figcaption class="figure-caption text-center">Md Shovon</figcaption>
                        </figure>

                    </div>

                    <!-- Idea share form --> 
                    <div class="col-xxl-12 mt-2 border p-4">

                            @if(session("idea_post_success")) 
                                <div class="alert alert-success text-center">
                                    {{ session("idea_post_success") }}
                                </div>
                            @endif
                        
                    
                        <h1 class="text-center h4">
                            <i class="fa-solid fa-share-from-square"></i>
                            Share Your Idea
                        </h1>
                        <form action="{{ route('user_profile_data') }}" method="POST" class="my-4" novalidate>
                            @csrf 
                            @method("POST")
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
                </div>


                <!-- Information Show --> 
                <h1 class="text-end mt-4 h5"><i class="fa-sharp fa-solid fa-signs-post"></i> Your Post</h1>
                <div class="row my-5">
                    <div class="col-xxl-6">
                        <div class="card p-3 shadow-sm">
                            <div>
                                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRHQbvIliUtNl4LkgK2NlrYz4I2wbJtLAH-D6Q_zt44FZHdhZA6pzWn3ghc6Sw5zg0NFMw&usqp=CAU" alt="...photo" class="img-fluid img-thumbnail" id="profile-small-img">
                                <span>Md Shovon</span> <br>
                            </div>
                            <div class="text-end">
                                <span>6/1/2023 <time>2:55 AM</time> </span> <br>
                                <i class="fa-solid fa-pen-to-square me-3 cursor-pointer" data-bs-toggle="modal" data-bs-target="#updateModal"></i>
                                <i class="fa-solid fa-trash cursor-pointer"></i>
                            </div>
                            <p class="text-justify my-3">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Tenetur laborum temporibus beatae quos reprehenderit maxime aut perspiciatis, libero commodi cumque assumenda laboriosam error quasi ratione. Repellendus at rem optio a?</p>

                            <!-- Update Modal -->
                            <div class="modal fade" id="updateModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <img src="https://media.istockphoto.com/id/1177915762/fr/photo/bel-homme-latin.jpg?s=612x612&w=0&k=20&c=p0fE_GYI2mWBJkVkDncsHK_r8UB-DL5h3W5wJPBqJX0=" alt="...photo" class="img-fluid img-thumbnail" id="profile-small-img">
                                            <span>Md Shovon</span>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
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