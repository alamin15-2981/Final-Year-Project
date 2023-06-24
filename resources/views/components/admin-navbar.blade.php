<aside class="admin-aside">
    <div class="box mb-5 text-center">
        <img src="{{ asset('assets/admin/img/admin_login.jpg') }}" style="width: 85%;height: 250px;border-radius: 50%;" class="text-end" alt="...photo">
        <h5 class="mt-2">Md Shovon</h5>
    </div>
    <div class="clearfix"></div>
    <h5 class="title-nav" onclick="showSubNav('user')">User's Information</h5>
    <nav class="sub-nav user">
        <ul>
            <li><a href="{{ route('admin_home') }}"><i class="fa-solid fa-house"></i> Home</a></li>
            <li><a href="{{ route('admin_user_share_idea') }}"><i class="fa-sharp fa-solid fa-share-nodes"></i> Share Idea</a></li>
            <li><a href="">Profile</a></li>
        </ul>
    </nav>
    <h5 class="title-nav" onclick="showSubNav('customer')">Company's Information</h5>
    <nav class="sub-nav customer">
        <ul>
            <li><a href="{{ route('admin_home') }}"><i class="fa-solid fa-house"></i> Home</a></li>
            <li><a href="{{ route('admin_job_post') }}">Post Job</a></li>
            <li><a href="{{ route('admin_offers') }}">Offers</a></li>
            <li><a href="{{ route('admin_watch') }}">Watch</a></li>
        </ul>
    </nav>
    <a href="" class="btn btn-danger w-100 position-relative bottom-0 mb-1">Logout</a>
</aside>