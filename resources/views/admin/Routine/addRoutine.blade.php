@extends('layouts.admin_master')
@section('admin_main_content')
    <section id="notice">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 mx-auto">
                    <div class="card">
                        <div class="card-header">
                            <h4>Add a New Noutine</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('admin.notice.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                                <label for="notice_title">Routine Title &nbsp; <span class="text-danger">*</span> </label>
                                <input type="text" name="notice_title" id="notice_title" class="form-control" placeholder="enter notice title">
                                @error('notice_title')
                                    <span class="text-danger">{{ $message }}</span> <br>
                                @enderror



                                <label for="notice_image" class="mt-3">Notice Upload with PDF form &nbsp; <span class="text-danger">*</span></label>
                                <input accept=".pdf" type="file" name="notice_image" id="notice_image" class="form-control p-4">
                                @error('notice_image')
                                    <span class="text-danger">{{ $message }}</span> <br>
                                @enderror

                                <button class="btn btn-primary w-100 mt-3 pb-3">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection