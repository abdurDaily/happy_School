@extends('layouts.admin_master')
@section('admin_main_content')
    <section id="employee">
        <div class="controller">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Add Employee</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('admin.employee.store') }}" method="post" enctype="multipart/form-data">
                             @csrf
                                    <div class="row">
                                        <div class="col-lg-4">
                                            <label for="employee_name">Employee Name</label>
                                            <input type="text" name="employee_name" id="employee_name" class="form-control" placeholder="enter full name">
                                             @error('employee_name')
                                               <strong class="text-danger">{{ $message }}</strong>
                                             @enderror
                                        </div>
                                        <div class="col-lg-4">
                                            <label for="employee_phone">phone</label>
                                            <input type="number" name="employee_phone" id="employee_phone" class="form-control" placeholder="phone number">
                                        </div>
                                        <div class="col-lg-4">
                                            <label for="employee_image">select an image</label>
                                            <input type="file" name="employee_image" id="employee_image" class="form-control">
                                            @error('employee_image')
                                                <strong class="text-danger">{{ $message }}</strong>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="row mt-3">
                                        <div class="col-lg-4">
                                            <label for="employee_email">Email</label>
                                            <input type="email" name="employee_email" id="employee_email" class="form-control" placeholder="enter an email">
                                            @error('employee_email')
                                                <strong class="text-danger">{{ $message }}</strong>
                                            @enderror
                                        </div>
                                        <div class="col-lg-4">
                                            <label for="employee_join_date">select employee join date</label>
                                            <input type="datetime-local" name="employee_join_date" id="employee_join_date" class="form-control">
                                            @error('employee_join_date')
                                                <strong class="text-danger">{{ $message }}</strong>
                                            @enderror
                                        </div>
                                        <div class="col-lg-4">
                                            <label for="employee_designation">designetion</label>
                                            <input type="text" name="employee_designation" id="employee_designation" class="form-control" placeholder="enter emplyee designation">
                                            @error('employee_designation')
                                                <strong class="text-danger">{{ $message }}</strong>
                                            @enderror
                                        </div>
                                    </div>

                                    <label class="mt-4" for="employee_about">details about employee</label>
                                    <textarea name="employee_about" id="employee_about" cols="30" rows="10" class="form-control" placeholder="details..."></textarea>
                                        @error('employee_about')
                                            <strong class="text-danger">{{ $message }}</strong>
                                        @enderror

                                    <button type="submit" class="btn btn-primary w-100 my-3">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection