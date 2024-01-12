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
                                <th>email</th>
                                <th>image</th>
                                <th>Designation</th>
                                <th>phone</th>
                                <th>about</th>
                                <th>status</th>
                            </tr>

                            @forelse ($allEmployee as $key => $data)
                                <tr>
                                    <td>{{ ++$key }}</td>
                                    <td>{{ $data->name }}</td>
                                    <td>{{ $data->email }}</td>
                                    <td>
                                        <img style="width: 80px; border-radius: 50%; height:80px; object-fit:cover;" src="{{ $data->employee_image }}" alt="">
                                    </td>
                                    <td>{{ $data->employee_designation }}</td>
                                    <td>{{ $data->employee_phone }}</td>
                                    <td>{{ $data->employee_about }}</td>
                                    
                                    <td>
                                        <div class="btn-group">
                                            <a href="{{ route('admin.employee.edit', $data->id) }}" class="btn btn-primary btn-sm"><i class="fa-solid fa-pen-to-square"></i></a>
                                            <a href="{{ route('admin.employee.delete', $data->id) }}" class="btn btn-danger btn-sm"><i class="fa-solid fa-trash"></i></a>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td  colspan="7" align="center">no data found !!</td>
                                </tr>
                            @endforelse
                        </table>
                        <br><br>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>





@endsection