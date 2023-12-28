@extends('layouts.admin_master')
@section('admin_main_content')
    <section id="notice">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 mx-auto">
                    <div class="card">
                        <div class="card-header">
                            <h4>Edit Routine..</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('admin.routine.update', $routineData->id) }}" method="post" enctype="multipart/form-data">
                            @method('PUT')
                            @csrf
                                <label for="routine_title">Routine Title &nbsp; <span class="text-danger">*</span> </label>
                                <input value="{{ $routineData->routine_title }}" type="text" name="routine_title" id="routine_title" class="form-control" placeholder="enter notice title">
                                @error('routine_title')
                                    <span class="text-danger">{{ $message }}</span> <br>
                                @enderror



                                <label for="routine_image" class="mt-3">Notice Upload with PDF form &nbsp; <span class="text-danger">*</span></label>
                                <input accept=".pdf, .docx" type="file" name="routine_image" id="routine_image" class="form-control p-4">
                                @error('routine_image')
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