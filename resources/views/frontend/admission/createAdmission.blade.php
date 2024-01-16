<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" />
</head>
<body>
    <section id="admission">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Admission</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('frontend.store.admission') }}" method="post" enctype="multipart/form-data">
                            @csrf

                            <label for="std_name">Student Name <span class="text-danger">*</span></label>
                            <input type="text" name="std_name" id="std_name" class="form-control mb-2" placeholder="enter your name">


                            

                            <label for="father_name">Student Father Name <span class="text-danger">*</span></label>
                            <input type="text" name="father_name" id="father_name" class="form-control mb-2" placeholder="enter your father name">

                            

                            <label for="mother_name">Student mother Name <span class="text-danger">*</span></label>
                            <input type="text" name="mother_name" id="mother_name" class="form-control mb-2" placeholder="enter your mother name">


                            <label for="contact_no">Phone Number <span class="text-danger">*</span></label>
                            <input type="number" name="contact_no" id="contact_no" class="form-control mb-2" placeholder="enter a phone number ">


                            <label for="alter_contact_no">Alternative Phone Number </label>
                            <input type="number" name="alter_contact_no" id="alter_contact_no" class="form-control mb-2" placeholder="enter alternative phone number">

                            
                            <label for="email">enter your email <span class="text-danger">*</span></label>
                            <input type="email" name="email" id="email" class="form-control mb-2" placeholder="enter an email">

                            
                            <label for="birth_date">Birth Date<span class="text-danger">*</span></label>
                            <input type="date" name="birth_date" id="birth_date" class="form-control mb-2" placeholder="enter an email">


                            <label for="present_address">Present Address<span class="text-danger">*</span></label>
                            <textarea name="present_address" id="present_address" class="form-control mb-2" placeholder="your present address..." cols="30" rows="10"></textarea>



                            <label for="division">division <span class="text-danger">*</span></label>
                            <select name="division" id="division" class="form-control mb-2">
                                <option value="" selected disabled>Select Division</option>
                                <option value="1">Barisal</option>
                                <option value="2">Chittagong</option>
                                <option value="3">Dhaka</option>
                                <option value="4">Khulna </option>
                                <option value="5">Mymensingh</option>
                                <option value="6">Rajshahi</option>
                                <option value="7">Rangpur</option>
                                <option value="8">Sylhet</option>
                            </select>
                            


                            <label for="district">District <span class="text-danger">*</span></label>
                            <input type="text" name="district" id="district" class="form-control mb-2" placeholder="enter your district name">



                            <label for="Upazila">Upazila <span class="text-danger">*</span></label>
                            <input type="text" name="upazila" id="Upazila" class="form-control mb-2" placeholder="enter your Upazila name">




                            <label for="village">village <span class="text-danger">*</span></label>
                            <input type="text" name="village" id="village" class="form-control mb-2" placeholder="enter your village name">




                            <label for="admission_class">Select Class <span class="text-danger">*</span></label>
                            <input type="number" name="admission_class" id="admission_class" class="form-control mb-2" placeholder="which class you want to take admission?">


                            <label for="admission_class_group">Select Class Devison</label>
                            <select name="admission_class_group" id="admission_class_group" class="form-control mb-2">
                                <option value="" selected disabled>Select Your Group</option>
                                <option value="1">Science</option>
                                <option value="2">commerce</option>
                                <option value="3">arts</option>
                            </select>
                            


                            <label for="std_img">
                                <img style="width: 300px;" src="{{ asset('custom_img/about.png') }}" alt="">
                            </label>
                            <input type="file" name="std_img" accept=".jpg,.png,.jpeg" id="std_img" class="d-none">

                            <button class="btn btn-primary w-100 py-2">Submit</button>




                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>
</html>