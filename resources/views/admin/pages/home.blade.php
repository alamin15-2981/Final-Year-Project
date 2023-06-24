@extends("admin.layouts.master")

<!-- Title For Application -->
@section("user-title")
Admin Home Page
@endsection

<!-- Main Content Body -->
@section("admin-content-body")

<main id="admin-layout">
    <!-- admin aside navbar -->
    <x-admin-navbar />

    <section>
        <div class="container-fluid">
            <div class="row">
                <div class="col-xxl-12 d-flex">
                    <div class="shadow p-4 border-2 border-secondary w-50 d-flex flex-wrap flex-column justify-content-center align-items-center me-2 bg-warning">
                        <span class="display-1">{{ count($usersRegister) }}</span>
                        <span>Total User</span>
                    </div>
                    <div class="shadow p-4 border-2 border-secondary w-50 d-flex flex-wrap flex-column justify-content-center align-items-center ms-2 bg-danger text-light">
                        <span class="display-1">{{ count($companyRegister) }}</span>
                        <span>Total Company</span>
                    </div>
                </div>

                <!-- users registration table -->
                @if(count($usersRegister))
                <div class="col-xxl-12 my-3 shadow-sm p-3 rounded table-box-height">
                    <h2><i class="fa-solid fa-users"></i> Users List</h2>
                    <div class="table-responsive">
                        <table class="table my-3 align-middle table-stripped table-hover text-center">
                            <thead>
                                <tr>
                                    <th>S.N</th>
                                    <th>name</th>
                                    <th>email</th>
                                    <th>profile_photo</th>
                                    <th>cover_photo</th>
                                    <th>gender</th>
                                    <th>birth_date</th>
                                    <th>address</th>
                                    <th>created_at</th>
                                    <th>updated_at</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php($count=0)
                                @foreach($usersRegister as $data)
                                @php($count++)
                                <tr>
                                    <td>{{ $count }}</td>
                                    <td>{{ $data['name'] }}</td>
                                    <td>{{ $data['email'] }}</td>
                                    <td>
                                        <a href="{{ asset('storage/img/users/register/profile/'.$data['profile_photo']) }}">
                                            <img style="width: 70px;height: 70px;border-radius: 5px;" src="{{ asset('storage/img/users/register/profile/'.$data['profile_photo']) }}" alt="...photo">
                                        </a>
                                    </td>
                                    <td>
                                    <a href="{{ asset('storage/img/users/register/cover/'.$data['cover_photo']) }}">
                                            <img style="width: 70px;height: 70px;border-radius: 5px;" src="{{ asset('storage/img/users/register/cover/'.$data['cover_photo']) }}" alt="...photo">
                                        </a>    
                                    </td>
                                    <td>{{ $data['gender'] }}</td>
                                    <td>{{ $data['birth_date'] }}</td>
                                    <td>{{ $data['address'] }}</td>
                                    <td>{{ $data['created_at'] }}</td>
                                    <td>{{ $data['updated_at'] }}</td>
                                    <td><a href="" class="btn btn-sm btn-danger">Remove</a></td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                @endif


                <!-- company registration table -->
                @if(count($companyRegister))
                <div class="col-xxl-12 my-3 shadow-sm p-3 rounded table-box-height">
                    <h2><i class="fa-sharp fa-solid fa-table-list"></i> Company List</h2>
                    <div class="table-responsive">
                        <table class="table my-3 align-middle table-stripped table-hover text-center">
                            <thead>
                                <tr>
                                    <th>S.N</th>
                                    <th>name</th>
                                    <th>email</th>
                                    <th>profile_photo</th>
                                    <th>cover_photo</th>
                                    <th>gender</th>
                                    <th>birth_date</th>
                                    <th>address</th>
                                    <th>created_at</th>
                                    <th>updated_at</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php($count=0)
                                @foreach($companyRegister as $data)
                                @php($count++)
                                <tr>
                                    <td>{{ $count }}</td>
                                    <td>{{ $data['name'] }}</td>
                                    <td>{{ $data['email'] }}</td>
                                    <td>
                                    <a href="{{ asset('storage/img/company/register/profile/'.$data['profile_photo']) }}">
                                            <img style="width: 70px;height: 70px;border-radius: 5px;" src="{{ asset('storage/img/company/register/profile/'.$data['profile_photo']) }}" alt="...photo">
                                        </a>
                                    </td>
                                    <td>
                                    <a href="{{ asset('storage/img/company/register/cover/'.$data['cover_photo']) }}">
                                            <img style="width: 70px;height: 70px;border-radius: 5px;" src="{{ asset('storage/img/company/register/cover/'.$data['cover_photo']) }}" alt="...photo">
                                        </a>
                                    </td>
                                    <td>{{ $data['gender'] }}</td>
                                    <td>{{ $data['birth_date'] }}</td>
                                    <td>{{ $data['address'] }}</td>
                                    <td>{{ $data['created_at'] }}</td>
                                    <td>{{ $data['updated_at'] }}</td>
                                    <td><a href="" class="btn btn-sm btn-danger">Remove</a></td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                @endif

            </div>
        </div>
    </section>
</main>

@endsection