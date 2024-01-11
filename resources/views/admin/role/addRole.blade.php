@extends('layouts.admin_master')
@section('admin_main_content')
    <section id="role">
        <div class="container">
            <div class="card p-3">
                <div class="head-btn d-flex justify-content-start mb-3">
                    <a href="{{ route('admin.role.list') }}" class="btn btn-primary btn-sm py-2 px-4">Edit Role</a>
                </div>
                <div class="row px-2">

                    <div class="col-lg-4 order-md-2 order-sm-1 ">
                        
                        <div class="card shadow">
                            <div class="card-header bg-primary">
                                <h5 style="color: #fff; margin:0;">Inser a New Role</h5>
                            </div>
                            <div class="card-body">
                                <form action="{{ route('admin.role.store') }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <label for="name" class="mt-3">Role Assign</label>
                                    <input type="text" id="name" name="name" class="form-control"
                                        placeholder="enter a role name">
                                    @error('name')
                                        <strong class="text-danger">{{ $message }}</strong>
                                    @enderror
                                    <button class="btn btn-primary w-100 mt-3">Submit</button>
                                </form>
                            </div>
                        </div>
                    </div>


                    <div class="col-lg-8 order-md-1 order-sm-2 ">
                        <div class="card-body" style="padding: 0;">
                            <table class="shadow table table-hover table-striped table-light tab-navigation">
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
                                                <a href="{{ route('admin.role.permission',$data->id) }}" class="btn btn-primary btn-sm">Permission</a>
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
