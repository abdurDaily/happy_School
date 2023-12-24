@extends('layouts.admin_master')
@section('admin_main_content')
    <section id="event_list">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>List of Event's..</h4>
                        </div>
                        

                        <div class="card-body table table-responsive">
                            <table class="table table-hover table-striped">
                                <tr>
                                    <th>Sn.</th>
                                    <th>Title</th>
                                    <th>Details</th>
                                    <th>Image</th>
                                    <th>Video</th>
                                    <th>Action</th>
                                </tr>


                                @forelse ($allEventData as $key => $data)
                                    <tr>
                                        <td>{{ ++$key }}</td>
                                        <td>{{ $data->event_title }}</td>
                                        <td>{{ $data->event_detail }}</td>
                                        <td>
                                            <img style="width:100px;" src="{{ $data->event_img }}" alt="">
                                        </td>
                                        <td>{{ $data->event_video }}</td>
                                        <td>
                                            <div class="btn-group">
                                                <a href="{{ route('admin.event.edit', $data->id) }}" class="btn btn-primary btn-sm"><i class="fa-solid fa-pen-to-square"></i></a>
                                                <a href="{{ route('admin.event.delete', $data->id) }}" class="btn btn-danger btn-sm"><i class="fa-solid fa-trash"></i></i></a>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <h4>No Event data found.</h4>
                                @endforelse
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection