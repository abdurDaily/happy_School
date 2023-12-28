@extends('layouts.admin_master')
@section('admin_main_content')

<section id="list_routine">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4>List of all routine..</h4>
                    </div>

                    <div class="card-body  table-responsive">
                        <table class="table table-hover table-striped">
                            <tr>
                                <th>Sn.</th>
                                <th>Title</th>
                                <th>Download PDF</th>
                                <th>Action</th>
                            </tr>

                            @forelse ($allRoutineData as $key => $data)
                                <tr>
                                    <td>{{ ++$key }}</td>
                                    <td>{{ $data->routine_title }}</td>
                                    <td>
                                        <a class="badge bg-primary" target="_blank" href="{{ $data->routine_image }}" >{{ $data->created_at->format('Y-M-D') }}</a>
                                    </td>
                                    <td>
                                        <div class="btn-group">
                                            <a href="{{ route('admin.routine.edit', $data->id) }}" class="btn btn-primary btn-sm"><i class="fa-solid fa-pen-to-square"></i></a>
                                            <a href="{{ route('admin.routine.delete', $data->id) }}" class="btn btn-danger btn-sm"><i class="fa-solid fa-trash"></i></i></a>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                
                            @endforelse
                        </table>
                        <br>

                    {{ $allRoutineData->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
    
@endsection