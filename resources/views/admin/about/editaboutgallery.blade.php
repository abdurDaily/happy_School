@extends('layouts.admin_master')
@section('admin_main_content')
    <section id="about-galary">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Edit About Gallery</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('admin.update.about.galary', $editData->id) }}" method="post"
                                enctype="multipart/form-data">
                                @csrf
                                @method('put')
                                <div class="row">
                                    <div class="col-lg-6">
                                        <label for="about_galary_text">About Galary Text</label>
                                        <textarea name="about_galary_text" id="about_galary_text" class="form-control my-2" placeholder="Enter about text..."
                                            cols="30" rows="10"></textarea>

                                        @error('about_galary_text')
                                            <span>{{ $message }}</span> <br>
                                        @enderror
                                    </div>


                                    <div class="col-lg-6">
                                        <label for="about_galary_img">
                                            select an image <br>
                                            <img class="rounded display_image"
                                                style="width: 350px; object-fit:cover; height:300px; padding:0 10px 20px 0;"
                                                src="{{ asset('custom_img/about.png') }}" alt="">
                                            @error('about_galary_text')
                                            <br>
                                                <span>{{ $message }}</span> 
                                            @enderror
                                        </label> <br>
                                        <input type="file" accept=".png,.jpg,.jpeg" class="form-control my-2"
                                            name="about_galary_img" id="about_galary_img" style="display: none">
                                    </div>


                                </div>
                                <button class="btn btn-primary w-100 mt-1">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>



    @push('additional_js')
        <script>
            let galleryImage = document.querySelector('#about_galary_img');
            let displayImage = document.querySelector('.display_image');
            galleryImage.addEventListener('change', function(e) {
                let url = URL.createObjectURL(e.target.files[0]);
                displayImage.src = url;
            })
        </script>
    @endpush
@endsection
