@extends('layouts.admin_master')
@section('admin_main_content')
    @push('additional_css')
        <style>
            #youtube_video img{
                padding: 5px;
            }
            #youtube_video .img-card {
                position: relative;
                padding: 0 !important;
            }
            #youtube_video .img-card::before {
                content: "";
                position: absolute;
                width: 0%;
                height: 100%;
                background-color: rgb(5, 12, 144);
                right: 5px;
                bottom: 0;
                visibility: hidden;
                opacity: 0;
                transition: 0.5s all;
                cursor: pointer;
            }
            #youtube_video .img-card:hover::before {
                width: 20%;
                visibility: visible;
                opacity: 1;
            }

            #youtube_video .icons {
                position: absolute;
                top: 100%;
                transform: translateY(-50%);
                right: 4%;
                visibility: hidden;
                opacity: 0;
                transition: 0.5s;
            }

            #youtube_video .img-card:hover .icons {
                visibility: visible;
                opacity: 1;
                top: 50%;
            }

            #youtube_video .img_group {
                display: flex;
                align-items: center;
            }
        </style>
    @endpush



    <section id="youtube_video">
        <div class="container">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <h4>Video...</h4>
                    <a data-bs-toggle="modal" data-bs-target="#staticBackdrop" href="" class="btn btn-primary px-3">Add New &#43;</a>
                </div>
                <div class="card-body">
                    <div class="row">
                        @forelse ($allVideoData as $data)
                            <div class="col-md-4 col-lg-3 img-card">
                                 <?php
                                    $video_id = explode("?v=", $data->video_link); 
                                    $video_id = $video_id[1];
                                 ?>

                                <a class="my-custom-links" data-vbtype="iframe" href="{{ str_replace('watch?v=', 'embed/', $data->video_link) }}">
                                    <img class="img-fluid rounded thumbnail_img" src="{{ "http://img.youtube.com/vi/".$video_id."/maxresdefault.jpg" }}" alt="">
                                </a>


                                <div class="icons">
                                    <a data-bs-toggle="modal" data-bs-target="#staticBackdrop" data-id="" data-bs-toggle="modal" data-bs-target="#exampleModal"
                                        href="{{ route('admin.video.edit', $data->id) }}" class="btn btn-primary btn-sm galleryEditBtn"><i
                                            class="fa-solid fa-pen-to-square"></i></a> <br>


                                    <a href="{{ route('admin.video.delete', $data->id) }}" class="btn btn-danger btn-sm my-2"><i
                                            class="fa-solid fa-trash"></i></a>
                                </div>
                            </div>
                        @empty
                            <h4>No video found...!</h4>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </section>





<!-- store Modal -->
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="staticBackdropLabel">Add Youtube Video link</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
            
                <form action="{{ route('admin.video.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                    <div class="row" style="display: inline-flex;">
                        <div class="col-6">
                            <label for="video_link">Enter a youtub video link</label>
                            <input id="video_link" type="text" class="form-control p-3" name="video_link" placeholder="YouTube Video link..">
                            <button class="btn btn-primary mt-2 w-100" type="submit">Upload</button>
                        </div>
                        <div class="col-6" >
                            <img style="border: 0 !important ; outline:none;" class="form-control thumbnail_display" src="{{ asset('custom_img/img_placeholder.jpg') }}" alt="">
                        </div>
                    </div>
                </form>
            </div>
        </div>
        </div>
    </div>
<!-- Store Modal end-->




<!-- Update Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Add Youtube Video link</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
        
            <form action="{{ route('admin.video.update') }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('put')
                <div class="row" style="display: inline-flex;">
                    <div class="col-6">
                        <label for="video_link">Enter a youtub video link</label>
                        <input id="video_link" name="video_link" type="text" class="form-control p-3" placeholder="YouTube Video link..">
                        <button class="btn btn-primary mt-2 w-100" type="submit">Upload</button>
                    </div>
                    <div class="col-6" >
                        <img style="border: 0 !important ; outline:none;" class="form-control thumbnail_display" src="{{ asset('custom_img/img_placeholder.jpg') }}" alt="">
                    </div>
                </div>
            </form>
        </div>
    </div>
    </div>
</div>
<!-- Store Modal end-->














        





        @push('additional_css')
            <link rel="stylesheet" href="{{ asset('backend/assets/css/venobox.min.css') }}">
        @endpush

        @push('additional_js')
            <script src="{{ asset('backend/assets/js/venobox.min.js') }}"></script>

            <script>
                new VenoBox({
                    selector: '.my-custom-links',
                });

                let thumbnail_img = $('.thumbnail_display');
                $('input[name="video_link"]').keyup(function(){
                    let videoUrl = $(this).val();
                    videoUrl = videoUrl.split("?v=");
                    videoUrl = videoUrl[1];
                    thumbnail_img.attr('src', `http://img.youtube.com/vi/${videoUrl}/maxresdefault.jpg`)
                })
            </script>


        @endpush
    @endsection
<!-- Modal end -->
