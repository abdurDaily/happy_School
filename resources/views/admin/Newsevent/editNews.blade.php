@extends('layouts.admin_master')
@section('admin_main_content')

<section id="news_events">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Add a New event..</h4>
                    </div>

                    <div class="card-body">
                        <form action="{{ route('admin.event.update', $editData->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('put')

                        <div class="row">
                            <div class="col-lg-7">

                                <label for="event_title" class="mt-2">Event Title <span class="text-danger">*</span> </label>
                                <textarea name="event_title" id="event_title" class="form-control" placeholder="enter event title..">{{ $editData->event_title }}</textarea>
                                @error('event_title')
                                    <span class="text-danger">{{ $message }}</span> <br>
                                @enderror
                    

                                <label for="event_detail" class="mt-2">Event Title <span class="text-danger">*</span></label>
                                <textarea name="event_detail" id="event_detail" class="form-control" placeholder="enter the event details..." cols="30" rows="10">{{ $editData->event_detail }}</textarea>
                                @error('event_detail')
                                    <span class="text-danger">{{ $message }}</span> <br>
                                @enderror

                                <label for="event_video" class="mt-2">Enter Event YouTube Video Link </label>
                                <input value="{{ $editData->event_video }}" type="text" name="event_video" id="event_video" class="form-control" placeholder="toutube video link ....">
                            </div>
                            <div class="col-lg-5 my-auto" style="border:1px solid rgba(227, 223, 223, 0.447);" class="bg-info">
                                <label for="event_img">
                                    <img class="eventtImagePicture" style="max-width: 100%; padding:20px; cursor: pointer;" src="{{ $editData->event_img }}" alt="">
                                </label>
                                <input type="file" accept=".jpg,.png,.jpeg" name="event_img" id="event_img" class="d-none event_img">
                                @error('event_img')
                                  <br>
                                    <span class="text-danger">{{ $message }}</span> <br>
                                @enderror
                            </div>
                        </div>

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
            let imageInput = document.querySelector('#event_img')
            let image = document.querySelector('.eventtImagePicture')
            imageInput.addEventListener('change', (e) => {
                const url = URL.createObjectURL(e.target.files[0])
                image.src = url
            })
        </script>
@endpush
@endsection

