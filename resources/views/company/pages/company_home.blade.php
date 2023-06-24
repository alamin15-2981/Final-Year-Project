@extends("company.layouts.master")

<!-- Title For Application -->
@section("user-title")
Company Home Page
@endsection

<!-- Main Content Body -->
@section("company-content-body")
<div class="container my-5 border shadow-sm p-3">
  <div class="row">
    <div class="col-xxl-12">

      <!-- User Home Cover Photo -->
      <img src="{{ asset('assets/users/img/user/user_home_cover.jpg') }}" alt="...photo" class="img-fluid w-100 object-fit-cover img-thumbnail" id="user-home-cover-pic">

      <!-- Navigation Menu -->
      <x-company-navbar />
      <h1 class="text-end h5 my-4">🅲🅰🆁🅴🅴🆁 🅸🅽🅷🅰🅽🅲🅴</h1>


      <div class="row gy-3">

        <!-- Idea share form -->
        <div class="col-xxl-12 p-4">

          @if(session("offers_post_success"))
          <div class="alert alert-success text-center">
            {{ session("offers_post_success") }}
          </div>
          @endif

          <h1 class="text-center">
            <i class="fa-solid fa-arrow-up-wide-short"></i>
            Special Offers
          </h1>
          <form action="{{ route('company_offers_data') }}" method="POST" class="my-4">
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

        @if(count($offers))
        <!-- special offers -->
        <h4 class="text-uppercase text-bold mb-4 text-center" style="margin-top: 75px;"><i class="fa-solid fa-arrow-up-wide-short"></i> Your's Offer</h4>
        <div class="row gy-3">

          @foreach($offers as $item)
          <div class="col-xxl-6">
            <div class="border rounded p-3 shadow-sm cursor-pointer">
              <div>
                <img src="{{ asset('storage/img/company/register/profile/'.$item['profile_photo']) }}" alt="...photo" class="img-fluid img-thumbnail" id="profile-small-img">
                <span>{{ $item["name"] }}</span> <br>
              </div>
              <strong class="ms-4 d-block text-center"># {{ $item["title"] }}</strong>
              <div class="text-end">
                <span>{{ $item["updated_at"] }}</span> <br>
                <i class="fa-solid fa-pen-to-square me-3 cursor-pointer" data-bs-toggle="modal" data-bs-target="#updateModal"></i>
                <a href="{{ URL::to('company_offers_delete/'.$item['id']) }}">
                  <i class="fa-solid fa-trash cursor-pointer"></i>
                </a>
              </div>
              <p class="text-justify ms-4">{{ $item["description"] }}</p>
            </div>
          </div>


          <!-- Update Modal -->
          <div class="modal fade" id="updateModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <img src="{{ asset('storage/img/company/register/profile/'.$item['profile_photo']) }}" alt="...photo" class="img-fluid img-thumbnail" id="profile-small-img">
                  <span>{{ $item["name"] }}</span>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <form action="{{ URL::to('company_offers_update/'.$item['id']) }}" method="POST" class="my-4">
                    @csrf 
                    @method("POST")
                    <div class="mb-3">
                      <label class="form-label">Title</label>
                      <input type="text" name="title" placeholder="Write Text" required class="form-control" value="{{ $item['title'] }}">
                    </div>
                    <div class="mb-3">
                      <label class="form-label">Description</label>
                      <textarea name="description" class="form-control" cols="40" rows="7" placeholder="Description" required>{{ $item['description'] }}</textarea>
                    </div>
                    <div class="mb-3">
                      <input type="submit" name="btn" value="Update" class="btn btn-sm btn-primary w-100 text-bold">
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
          @endforeach

        </div>
        @endif


        @if(count($idea))
        <h4 class="text-uppercase text-bold mb-4 text-center" style="margin-top: 75px;"><i class="fa-solid fa-arrow-up-wide-short"></i> Project Ideas</h4>

        <!-- Project ideas -->
        <div class="row my-5">

          @foreach($idea as $item)
          <div class="col-xxl-6">
            <div class="card p-3 border rounded shadow-sm">
              <div>
                <img src="{{ asset('storage/img/users/register/profile/'.$item['profile_photo']) }}" alt="...photo" class="img-fluid img-thumbnail" id="profile-small-img">
                <span>{{ $item["name"] }}</span> <br>
              </div>
              <strong class="ms-4 text-center"># {{ $item["title"] }}</strong>
              <div class="text-end">
                <span>{{ $item["updated_at"] }}</span> <br>
              </div>
              <p class="text-justify my-3">{{ $item["description"] }}</p>


              <!-- Button trigger modal -->
              <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                Feedback
              </button>

              <!-- Modal -->
              <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <img src="{{ asset('storage/img/users/register/profile/'.$item['profile_photo']) }}" alt="...photo" class="img-fluid img-thumbnail" id="profile-small-img">
                      <span>{{ $item["name"] }}</span>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                      <form action="" method="POST" enctype="multipart/form-data">
                        @csrf 
                        @method("POST")
                        <div class="mb-3">
                          <label class="form-label">Comment</label>
                          <textarea name="comment" cols="40" rows="7" placeholder="Message" required class="form-control"></textarea>
                        </div>
                        <div class="mb-3">
                          <input type="submit" name="btn" value="Submit" class="btn btn-sm btn-primary w-100">
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
          @endforeach

        </div>

        @endif


      </div>

    </div>
  </div>
</div>
@endsection