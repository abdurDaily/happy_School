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
                                
                            @endforelse
                        </table>
                        <br><br>
                        {{ $allEmployee->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>




@section('search')
<div class="navbar-nav align-items-center">
    <div class="nav-item d-flex align-items-center  border-light rounded px-3">
      <i class="bx bx-search fs-4 lh-0"></i>
      <form action="{{ route('admin.employee.search') }}" method="post">
        @csrf
        <div class="btn-group">
            <input
            type="text" name="search_employee"
            class="form-control border-0 shadow-none"
            placeholder="Search..."
            aria-label="Search..."
          />
          <button class="btn btn-primary">Search</button>
          </div>
      </form>
    </div>
  </div>
@endsection
@endsection