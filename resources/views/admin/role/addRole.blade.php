@extends('layouts.admin_master')
@section('admin_main_content')
    <section id="role">
        <div class="container">
            <div class="card p-3">
                <div class="row">

                    <div class="col-lg-4">
                        <form action="{{ route('admin.role.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <label for="name">Role Assign</label>
                            <input type="text" id="name" name="name" class="form-control"
                                placeholder="enter a role name">
                            @error('name')
                                <strong class="text-danger">{{ $message }}</strong>
                            @enderror
                            <button class="btn btn-primary w-100 my-3">Submit</button>
                        </form>
                    </div>


                    <div class="col-lg-8">
                        <div class="card-header">
                            <h4>All role's</h4>
                        </div>

                        <div class="card-body">
                            <table class="table table-hover table-striped">
                                <tr>
                                    <th>Sn</th>
                                    <th>Name</th>
                                    <th>Status</th>
                                </tr>

                                @forelse ($allRoles as $key => $data)
                                    <tr>
                                        <td>{{ ++$key }}</td>
                                        <td>{{ $data->name }}</td>
                                        <td>
                                            <div class="btn-group">
                                                <a href="#" class="btn btn-primary btn-sm">Edit</a>
                                                <a href="#" class="btn btn-danger btn-sm">Delete</a>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <h4>No data found!</h4>
                                @endforelse
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
