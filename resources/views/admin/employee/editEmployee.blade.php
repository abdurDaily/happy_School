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
                            <form action="{{ route('admin.employee.update') }}" method="post" enctype="multipart/form-data">
                             @csrf
                             @method('put')
                                    <div class="row">
                                        

                                        <div class="col-lg-8">
                                            <div class="row">
                                                <div class="col-lg-6">
                                                        <label for="employee_name">Employee Name</label>
                                                        <input value="{{ $editData->employee_name }}" type="text" name="employee_name" id="employee_name" class="form-control" placeholder="enter full name">
                                                        @error('employee_name')
                                                        <strong class="text-danger">{{ $message }}</strong>
                                                        @enderror
                                                </div>
                                                <div class="col-lg-6">
                                                      <label for="employee_phone">phone</label>
                                                      <input value="{{ $editData->employee_phone }}" type="number" name="employee_phone" id="employee_phone" class="form-control" placeholder="phone number">
                                                </div>
                                                <div class="col-lg-6 my-2">
                                                    <label for="employee_email">Email</label>
                                                    <input value="{{ $editData->employee_email }}" type="email" name="employee_email" id="employee_email" class="form-control" placeholder="enter an email">
                                                    @error('employee_email')
                                                        <strong class="text-danger">{{ $message }}</strong>
                                                    @enderror
                                                </div>
                                                <div class="col-lg-6 my-2">
                                                    <label for="employee_join_date">select employee join date</label>
                                                    <input value="{{ $editData->employee_join_date }}" type="datetime-local" name="employee_join_date" id="employee_join_date" class="form-control">
                                                    @error('employee_join_date')
                                                        <strong class="text-danger">{{ $message }}</strong>
                                                    @enderror
                                                </div>
                                                <div class="col-lg-12 my-2">
                                                    <label for="employee_designation">designetion</label>
                                                    <input value="{{ $editData->employee_designation }}" type="text" name="employee_designation" id="employee_designation" class="form-control" placeholder="enter emplyee designation">
                                                    @error('employee_designation')
                                                        <strong class="text-danger">{{ $message }}</strong>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>


                                        





                                        <div class="col-lg-4  text-center">
                                            <label for="employee_image">
                                                <img style="max-width: 250px; height:250px; object-fit: cover; border-radius:50%; cursor:pointer; padding:0px; border-radius: 150px;
                                               
                                                box-shadow:  24px 24px 47px #b5b5b574,
                                                             -24px -24px 47px #ffffff;"  class="profileImagePicture" src="{{ asset('custom_img/placeholder_image.png') }}" alt="">
                                            </label>
                                            <input  type="file"  name="employee_image" id="employee_image" class="form-control d-none">
                                            @error('employee_image')
                                                <strong class="text-danger">{{ $message }}</strong>
                                            @enderror
                                        </div>
                                    </div>

                                   

                                    <label class="" for="employee_about">details about employee</label>
                                    <textarea name="employee_about" id="employee_about" cols="30" rows="10" class="form-control" placeholder="details...">{{ $editData->employee_about }}</textarea>
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


    @push('additional_js')
        <script>
            let imageInput = document.querySelector('#employee_image')
            let image = document.querySelector('.profileImagePicture')
            imageInput.addEventListener('change', (e) => {
                const url = URL.createObjectURL(e.target.files[0])
                image.src = url
            })
        </script>
    @endpush

@endsection