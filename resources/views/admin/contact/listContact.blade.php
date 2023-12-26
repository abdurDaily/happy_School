@extends('layouts.admin_master')
@section('admin_main_content')
<section id="contact">
    <div class="conatiner">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4>List of all published contact...</h4>
                    </div>
                    <div class="card-body table-responsive ">
                        <table class="table table-light table-hover table-striped">
                            <tr class="table-primary">
                                <th>Sn.</th>
                                <th>Info</th>
                                <th>Location</th>
                                <th>Numbers</th>
                                <th>Emails</th>
                                <th>Address</th>
                                <th>Schedule</th>
                                <th>Action</th>
                            </tr>

                            @forelse ($allContactData as $key => $data)
                                <tr>
                                    <td>{{ ++$key }}</td>
                                    <td>{{ Str::limit($data->contact_info, 20, '.....') }}</td>
                                    <td>{{ Str::limit($data->contact_location_link, 20, '.....')  }}</td>
                                    <td>{!! $data->contact_numbers !!}</td>
                                    <td>{!! $data->contact_email !!}</td>
                                    <td>{{ $data->contact_address }}</td>
                                    <td>{{ $data->contact_schedule }}</td>
                                    <td>
                                        <div class="btn-group">
                                            <a href="{{ route('admin.contact.edit', $data->id) }}" class="btn btn-primary btn-sm"><i class="fa-solid fa-pen-to-square"></i></a>
                                            <a href="{{ route('admin.contact.delete', $data->id) }}" class="btn btn-danger btn-sm"><i class="fa-solid fa-trash"></i></i></a>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <h4>No Data Found !</h4>
                            @endforelse

                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection