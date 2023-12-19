@extends('layouts.admin_master')
@section('admin_main_content')


    <section id="notice">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 mx-auto">
                    <div class="card">
                        <div class="card-header">
                            <h4>Edit Notice..</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('admin.notice.update', $editData->id) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('put')
                                <label for="notice_title">Notice Title &nbsp; <span class="text-danger">*</span> </label>
                                <input value="{{ $editData->notice_title }}" type="text" name="notice_title" id="notice_title" class="form-control" placeholder="enter notice title">
                                @error('notice_title')
                                    <span class="text-danger">{{ $message }}</span> <br>
                                @enderror

                                <label class="mt-3" for="notice_details">Notice Description &nbsp; <span class="text-danger">*</span></label>
                                <textarea name="notice_details" id="notice_details" placeholder="enter notice cause's.." class="form-control" cols="30" rows="10">{{ $editData->notice_details }}
                                </textarea>
                                @error('notice_details')
                                    <span class="text-danger">{{ $message }}</span> <br>
                                @enderror

                                <label for="notice_image" class="mt-3">Notice Upload with PDF form &nbsp; <span class="text-danger">*</span></label>
                                <input type="file" name="notice_image" id="notice_image" class="form-control p-4">
                                @error('notice_image')
                                    <span class="text-danger">{{ $message }}</span> <br>
                                @enderror

                                <button class="btn btn-primary w-100 mt-5 py-3">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection