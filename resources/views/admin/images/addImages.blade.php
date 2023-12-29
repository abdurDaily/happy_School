@extends('layouts.admin_master')
@section('admin_main_content')
@push('additional_css')
    <style>
        #image .img-card {
            position: relative;
            padding: 0 !important;
        }
        #image .img-card img{
            padding: 20px;
            border-top-right-radius: 35px;
            border-bottom-left-radius: 35px;
        }
        #image .img-card::before{
            content: "";
            position: absolute;
            width: 100%;
            height: 0%;
            background-color: rgba(150, 224, 148, 0.628);
            left: 0;
            bottom: 0;
            visibility: hidden;
            opacity: 0;
            transition: 0.5s all;
            cursor: pointer;
            border-top-right-radius: 35px;
            border-bottom-left-radius: 35px;
        }
        #image .img-card:hover::before{
            height: 100%;
            visibility: visible;
            opacity: 1;
        } 

        #image .icons{
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, 100%);
            visibility: hidden;
            opacity: 0;
            /* transition-delay: 0.3s; */
            transition: 0.5s;
        }
        #image .img-card:hover .icons{
            visibility: visible;
            opacity: 1;
            transform: translate(-50%, -50%);
        }
        #image .img_group{
            display: flex;
            align-items: center;
        }
    </style>
@endpush



    <section id="image">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between">
                            <h4>Galary</h4>
                            <button data-bs-toggle="modal" data-bs-target="#staticBackdrop" class="btn btn-primary px-4">Add new +</button>
                        </div>
                        <div class="card-body">
                            <div class="row">
                               
                                @forelse ($allImages as $data)
                                    <div class="col-lg-3 img-card">
                                        <img style="width:100%;  object-fit:contain;" src="{{ $data->galary_img }}" alt="{{ $data->img_title }}">
                                        <div class="icons">
                                            <a data-id="{{ $data->id }}" data-bs-toggle="modal" data-bs-target="#exampleModal" href="{{ route('admin.image.edit', $data->id) }}" class="btn btn-primary btn-sm galleryEditBtn"><i class="fa-solid fa-pen-to-square"></i></a>
                                            <a href="" class="btn btn-danger btn-sm"><i class="fa-solid fa-trash"></i></a>
                                        </div>
                                    </div>
                                @empty
                                    <h4>No Image data found...</h4>
                                @endforelse


                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        

        <!--EDIT Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
               

                    <form action="{{ route('admin.image.update') }}" method="PUT" enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <div class="row img_group">
                            <div class="col-6">
                                <label for="galary_img">Select Galary Image</label>
                                <input type="hidden" class="galleryId">
                                <input accept=".png,.jpg,.jpeg" type="file" id="galary_img" name="galary_img" class="form-control p-3 galary_img">


                                <br>
                                <label for="img_title">Image Title</label>
                                <input  name="img_title" type="text" class="form-control py-3" placeholder="image title..">
                            </div>
                            <div class="col-6">
                                <img style="padding: 10px;" class="img-fluid galary_display_img" src="{{ asset('custom_img/img_placeholder.jpg') }}" alt="">
                            </div>
                        </div>
                        
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Upload</button>
                        </div>


                    </form>


                </div>
                
            </div>
            </div>
        </div>
        {{-- Modal End  --}}












        {{-- ADD MODEL START --}}
        <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Modal title</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
              


                    <form action="{{ route('admin.image.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row img_group">
                            <div class="col-6">
                                <label for="galary_img">Select Galary Image</label>
                                <input type="hidden" class="galleryId">
                                <input accept=".png,.jpg,.jpeg" type="file" id="galary_img" name="galary_img" class="form-control p-3 galary_img_store">
                                <br>
                                <label for="img_title">Image Title</label>
                                <input name="img_title" type="text" class="form-control py-3" placeholder="image title..">
                            </div>
                            <div class="col-6">
                                <img style="padding: 10px;" class="img-fluid galary_display_img_store" src="{{ asset('custom_img/img_placeholder.jpg') }}" alt="">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Upload</button>
                        </div>
                    </form>
                </div>

            </div>
            </div>
        </div>
        {{-- ADD MODEL END --}}
  
    </section>

    @push('additional_js')
        <script>
            //* GET ALL BTNS
            let galleryEditBtns  = $('.galleryEditBtn')
            let galleryId = $('.galleryId')
            galleryEditBtns.click(function() {
                let id = $(this).attr('data-id')
                galleryId.val(id)
            })



            let img = document.querySelector('.galary_img');
            let img_display = document.querySelector('.galary_display_img');

            img.addEventListener('change', function(e){
               let url =  URL.createObjectURL(e.target.files[0])
               img_display.src = url
            })


            let img_store = document.querySelector('.galary_img_store');
            let img_display_store = document.querySelector('.galary_display_img_store');

            img_store.addEventListener('change', function(e){
               let url =  URL.createObjectURL(e.target.files[0])
               img_display_store.src = url
            })



        </script>
    @endpush
@endsection