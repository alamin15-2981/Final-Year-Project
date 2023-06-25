@extends("users.layouts.master")

<!-- Title For Application -->
@section("user-title")
Job Comment
@endsection

<!-- Main Content Body -->
@section("user-content-body")
<div class="container my-5 border shadow-sm p-3">
    <div class="row">
        <div class="col-xxl-12">

            <!-- User Home Cover Photo -->
            <img src="{{ asset('assets/users/img/user/user_home_cover.jpg') }}" alt="...photo" class="img-fluid w-100 object-fit-cover img-thumbnail" id="user-home-cover-pic">

            <h1 class="text-end h5 my-4">🅲🅰🆁🅴🅴🆁 🅸🅽🅷🅰🅽🅲🅴</h1>

            <a href="{{ route('company_profile') }}" class="btn btn-sm btn-primary">Go Back << </a>
                    <h4 class="text-uppercase text-bold my-3"><i class="fa-solid fa-list"></i> Resume List</h4>

                    <div class="container-fluid">
                        <div class="row">

                            @foreach($resumeList as $list)
                            <div class="col-xxl-6">
                                <div class="my-4 p-3 shadow">
                                    <img src="{{ asset('storage/img/users/register/profile/'.$userData['profile_photo']) }}" alt="...photo" class="img-fluid img-thumbnail" id="profile-small-img">
                                    <span>{{ $userData["name"] }}</span>
                                    @if(session("gmail") == $list['email'])
                                    <a href="{{ URL::to('user_job_comment_delete/'.$list['id']) }}">
                                        <i class="fa-solid fa-trash cursor-pointer float-end"></i>
                                    </a>
                                    @endif
                                    <span class="float-end mt-4">Contact Me:
                                        <a href="mailto:{{ $list['email'] }}"><i class="fa-solid fa-link"></i></a>
                                    </span>
                                    <div class="my-3 d-flex flex-wrap flex-column justify-content-center align-items-center">
                                        <object data="{{ asset('storage/img/users/register/resume/'.$list['resume']) }}" type="application/pdf"></object>
                                        <a href="{{ asset('storage/img/users/register/resume/'.$list['resume']) }}" class="link-primary">
                                            Zoom Resume
                                        </a>
                                    </div>
                                </div>
                            </div>
                            @endforeach

                        </div>
                    </div>

        </div>
    </div>
</div>
@endsection