@extends('layouts.admin_master')
@section('admin_main_content')
    <section id="list-role">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>All Role's</h4>
                        </div>
                        <div class="card-body">
                            <table class="table table-hover table-striped">
                                <tr>
                                    <td>Sn</td>
                                    <td>Role Name</td>
                                    <td>Action</td>
                                </tr>


                                @forelse ($allRoles as $key => $role)
                                    <tr>
                                        <td>{{ ++$key }}</td>
                                        <td>{{ $role->name }}</td>
                                        <td>
                                            <div class="btn-group">
                                                <a href="{{ route('admin.role.edit', $role->id) }}" class="btn btn-primary btn-sm"><i
                                                        class="fa-solid fa-pen-to-square"></i></a>
                                                <a href="#" class="btn btn-danger btn-sm"><i
                                                        class="fa-solid fa-trash"></i></i></a>
                                            </div>
                                        </td>
                                    </tr>

                                @empty
                                @endforelse
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
