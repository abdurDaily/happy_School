@extends('layouts.admin_master')
@section('admin_main_content')

<section id="list-employee">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4>List of All Notice</h4>
                    </div>
                    <div class="card-body  table-responsive">
                        <table class="table table-hover table-striped">
                            <tr>
                                <th>Sn</th>
                                <th>Title</th>
                                <th>Details</th>
                                <th>PDF</th>
                                <th>Date</th>
                                <th>Status</th>
                            </tr>

                            @forelse ($allNotice as $key => $data)
                                <tr>
                                    <td>{{ ++$key }}</td>
                                    <td>{{ $data->notice_title}}</td>
                                    <td>{{ $data->notice_details }}</td>
                                    <td>
                                        <a class="badge bg-primary" target="_blank" href="{{ $data->notice_image }}">Download PDF</a>
                                    </td>
                                    <td>{{ $data->created_at->format('Y-M-d') }}</td>
                                    <td>
                                        <div class="btn-group">
                                            <a href="{{ route('admin.notice.edit', $data->id) }}" class="btn btn-primary btn-sm"><i class="fa-solid fa-pen-to-square"></i></a>
                                            <a href="{{ route('admin.notice.delete', $data->id) }}" class="btn btn-danger btn-sm"><i class="fa-solid fa-trash"></i></a>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <h4>No Notice Found !</h4>
                            @endforelse
                        </table>
                        <br><br>
                        {{ $allNotice->links() }}
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
      <form action="{{ route('admin.notice.search') }}" method="post">
        @csrf
        <div class="btn-group">
            <input
            type="text" name="search_notice"
            class="form-control border-0 shadow-none"
            placeholder="Search notice .."
            aria-label="Search..."
          />
          <button type="submit" class="btn btn-primary">Search</button>
          </div>
      </form>
    </div>
  </div>
@endsection
@endsection