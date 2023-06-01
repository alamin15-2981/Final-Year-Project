<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
    <a class="navbar-brand" href="#">Navbar</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="{{ route('company_home') }}">Home</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('company_profile') }}">Profile</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('company_settings') }}">Settings</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('company_watch') }}">Watch</a>
        </li>
        </ul>
        <div class="mx-4">
            <a href="#" class="btn btn-sm btn-danger">Logout</a>
        </div>
    </div>
    </div>
</nav>