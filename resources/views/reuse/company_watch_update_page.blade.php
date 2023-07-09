@extends("users.layouts.master")

<!-- Title For Application -->
@section("user-title")
Update Inforamtion
@endsection

<!-- Main Content Body -->
@section("user-content-body")
<section class="card shadow-lg w-75 mx-auto mt-5 border-0 rounded">
    <div class="card-body">
        <div>
            <img src="{{ asset('storage/img/company/register/profile/'.$item['profile_photo']) }}" alt="...photo" class="img-fluid img-thumbnail" id="profile-small-img">
            <span>{{ $item["name"] }}</span>
            <a href="{{ URL::previous() }}">
                <i class="fa-sharp fa-solid fa-delete-left float-end text-danger" style="font-size: 25px;"></i>
            </a>
        </div>
        <div>
            <form action="{{ URL::to('/company_watch_update/'.$item['id']) }}" method="POST" class="my-4">
                @csrf
                @method("POST")
                <div class="mb-3">
                    <label class="form-label">Url</label>
                    <input type="text" name="title" placeholder="Write Url" required class="form-control" value="{{ $item['url'] }}">
                </div>
                <div class="mb-3">
                    <label class="form-label">Description</label>
                    <textarea name="description" class="form-control" cols="40" rows="7" placeholder="Description" required>{{ $item["description"] }}</textarea>
                </div>
                <div class="mb-3">
                    <input type="submit" name="btn" value="Update" class="btn btn-sm btn-primary w-100 text-bold">
                </div>
            </form>
        </div>
    </div>
</section>
@endsection