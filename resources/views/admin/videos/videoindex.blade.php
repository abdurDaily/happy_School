@extends('layouts.admin_master')
@section('admin_main_content')
    @push('additional_css')
        <style>
            #image .img-card {
                position: relative;
                padding: 0 !important;
            }

            #image .img-card img {
                padding: 20px;
            }

            #image .img-card::before {
                content: "";
                position: absolute;
                width: 0%;
                height: 100%;
                background-color: rgb(89, 224, 4);
                left: 5px;
                bottom: 0;
                visibility: hidden;
                opacity: 0;
                transition: 0.5s all;
                cursor: pointer;
            }

            #image .img-card:hover::before {
                width: 20%;
                visibility: visible;
                opacity: 1;
            }

            #image .icons {
                position: absolute;
                top: 50%;
                left: 12%;
                transform: translate(-50%, 50%);
                visibility: hidden;
                opacity: 0;
                transition: 0.5s;
            }

            #image .img-card:hover .icons {
                visibility: visible;
                opacity: 1;
                transform: translate(-50%, -50%);
            }

            #image .img_group {
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
                            <h4>Video...</h4>
                            <button data-bs-toggle="modal" data-bs-target="#staticBackdrop" class="btn btn-primary px-4">Add
                                new +</button>
                        </div>
                        <div class="card-body">
                            <div class="row gx-3">
                                @forelse ($allVideoData as $data)
                                    <div class="col-lg-3 img-card">
                                        <iframe style="width:100%; padding: 5px; height:100%; object-fit:cover;"
                                            src="{{ str_replace('watch?v=', 'embed/', $data->video_link) }}"
                                            title="YouTube video player" frameborder="0"
                                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                            allowfullscreen
                                            loading="lazy"
                                            ></iframe>
                                        {{-- <img style="width:100%; height:100%; object-fit:cover;" src="" alt=""> --}}
                                        <div class="icons">
                                            <a data-id="" data-bs-toggle="modal" data-bs-target="#exampleModal"
                                                href="" class="btn btn-primary btn-sm galleryEditBtn"><i
                                                    class="fa-solid fa-pen-to-square"></i></a> <br>
                                            <a href="" class="btn btn-danger btn-sm my-2"><i
                                                    class="fa-solid fa-trash"></i></a>
                                        </div>
                                    </div>
                                @empty
                                    <h4>No video data found...</h4>
                                @endforelse
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>




        <!--EDIT Modal Start -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">


                        <form action="" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('put')
                            <div class="row img_group">
                                <div class="col-6">
                                    <label for="galary_img">Select Galary Image</label>
                                    <input type="hidden" name="id" class="galleryId">
                                    <input type="text" name="video_link" class="form-control"
                                        placeholder="Enter youtube video link..">
                                    {{-- <input accept=".png,.jpg,.jpeg" type="file" id="galary_img" name="galary_img" class="form-control p-3 galary_img"> --}}


                                    <br>
                                    <label for="img_title">Image Title</label>
                                    <input name="img_title" type="text" class="form-control py-3"
                                        placeholder="image title..">
                                </div>
                                <div class="col-6">
                                    <img style="padding: 10px;" class="img-fluid galary_display_img"
                                        src="{{ asset('custom_img/img_placeholder.jpg') }}" alt="">
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
        {{-- Edit Modal End  --}}





        {{-- ADD MODEL START --}}
        <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
            aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Modal title</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">



                        <form action="{{ route('admin.video.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row img_group">
                                <div class="col-6">
                                    <label for="galary_img">Select Galary Image</label>
                                    <input type="hidden" class="galleryId">
                                    <input type="text" name="video_link" class="form-control"
                                        placeholder="Enter youtube video link..">
                                        @error('video_link')
                                            <span class="text-danger">{{ $message }}</span> <br>
                                        @enderror
                                </div>
                                <div class="col-6">

                                    <iframe  class="galary_display_img_store"
                                        style="display:none;width:100%; padding:0 5px; height:100%; object-fit:cover;"
                                        src="" title="YouTube video player" frameborder="0"
                                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                        allowfullscreen
                                        loading="lazy"
                                        ></iframe>



                                    <img style="padding: 10px;" class="img-fluid galary_display_img_store"
                                        src="{{ asset('custom_img/img_placeholder.jpg') }}" alt="">
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
            let videoDisplay = $('.galary_display_img_store')
            $('input[name="video_link"]').keyup(function() {
                let videoUrl = $(this).val()
                videoUrl = videoUrl.replace("watch?v=", "embed/")
                videoDisplay.attr('src', videoUrl)
                videoDisplay.fadeIn()
                videoDisplay.next('img').fadeOut()
            })
        </script>
    @endpush
@endsection
