@extends('layouts.admin_master')
@section('admin_main_content')

<section id="list-employee">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4>list of all employee's</h4>
                    </div>
                    <div class="card-body  table-responsive">
                        <table class="table table-hover table-striped">
                            <tr>
                                <th>Sn</th>
                                <th>Name</th>
                                <th>Designation</th>
                                <th>image</th>
                                <th>phone</th>
                                <th>email</th>
                                <th>joing date</th>
                                <th>about</th>
                                <th>status</th>
                            </tr>

                            @forelse ($allEmployee as $key => $data)
                                <tr>
                                    <td>{{ ++$key }}</td>
                                    <td>{{ $data->employee_name }}</td>
                                    <td>{{ $data->employee_designation }}</td>
                                    <td>
                                        <img style="width: 100px; height:100px; object-fit:cover;" src="{{ $data->employee_image }}" alt="">
                                    </td>
                                    <td>{{ $data->employee_phone }}</td>
                                    <td>{{ $data->employee_email }}</td>
                                    <td>{{ $data->employee_join_date }}</td>
                                    <td>{{ $data->employee_about }}</td>
                                    <td>
                                        <div class="btn-group">
                                            <a href="{{ route('admin.employee.edit', $data->id) }}" class="btn btn-primary btn-sm">Edit</a>
                                            <a href="{{ route('admin.employee.delete', $data->id) }}" class="btn btn-danger btn-sm">Delete</a>
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