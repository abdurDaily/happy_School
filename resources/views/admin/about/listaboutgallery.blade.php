@extends('layouts.admin_master')
@section('admin_main_content')
    <section id="list">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>All gallery list</h4>
                        </div>
                        <div class="card-body">
                            <table class="table table-hover table-striped">
                                <tr>
                                    <th>Sn.</th>
                                    <th>Gallery Text</th>
                                    <th>About Text</th>
                                    <th>Images</th>
                                    <th>Action</th>
                                </tr>

                                @forelse ($listData  as $key=>$data)
                                    <tr>
                                        <td>{{ ++$key }}</td>
                                        <td>{{ Str::limit($data->about_galary_text, 100, '......') }}</td>
                                        <td>{!! Str::limit($data->about_institute, 100, '......') !!}</td>
                                        <td>
                                            <img style="width: 100px" src="{{ $data->about_galary_img }}" alt="">
                                        </td>
                                        <td>
                                            <div class="btn-group">
                                                <a href="{{ route('admin.edit.about.galary', $data->id) }}"
                                                    class="btn btn-primary btn-sm"><i
                                                        class="fa-solid fa-pen-to-square"></i></a>
                                                <a href="{{ route('admin.delete.about.galary', $data->id) }}"
                                                    class="btn btn-danger btn-sm"><i class="fa-solid fa-trash"></i></a>
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
