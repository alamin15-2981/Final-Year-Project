@extends("admin.layouts.master")

<!-- Title For Application -->
@section("user-title")
Admin company job post Page
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
                @if(count($companyJobPost))
                <div class="col-xxl-12 my-3 shadow-sm p-3 rounded table-box-height">
                    <h2><i class="fa-solid fa-users"></i> Job Post</h2>
                    <div class="table-responsive">
                        <table class="table my-3 align-middle table-stripped table-hover text-center">
                            <thead>
                                <tr>
                                    <th>S.N</th>
                                    <th>title</th>
                                    <th>description</th>
                                    <th>company_id</th>
                                    <th>created_at</th>
                                    <th>updated_at</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php($count=0)
                                @foreach($companyJobPost as $data)
                                @php($count++)
                                <tr>
                                    <td>{{ $count }}</td>
                                    <td>{{ $data['title'] }}</td>
                                    <td>{{ $data['description'] }}</td>
                                    <td>{{ $data['company_id'] }}</td>
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