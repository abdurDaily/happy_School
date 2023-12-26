@extends('layouts.admin_master')
@section('admin_main_content')
    <section id="contact">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Insert New Contact</h4>
                        </div>
                        <div class="card-body">
                            @csrf
                            <form action="{{ route('admin.contact.update', $editData->id) }}" method="post" enctype="multipart/form-data">
                                @csrf

                                <label class="mt-3" for="contact_info">About Institute <span class="text-danger">*</span> </label>
                                <textarea name="contact_info" id="contact_info" placeholder="contact information.." class="form-control">{{ $editData->contact_info }}</textarea>
                                @error('contact_info')
                                    <span class="text-danger">{{ $message }}</span> <br>
                                @enderror


                                <label class="mt-3" for="contact_location_link">Location Link <span class="text-danger">*</span></label>
                                <input value="{{ $editData->contact_location_link }}" type="text" class="form-control" name="contact_location_link"
                                    id="contact_location_link" placeholder="Google location link.">
                                @error('contact_location_link')
                                    <span class="text-danger">{{ $message }}</span> <br>
                                @enderror


                                <label class="mt-3" for="contact_numbers">Contact Number's <span class="text-danger">*</span></label>
                                <textarea class="form-control" name="contact_numbers" id="contact_numbers" cols="30" rows="10">{{ $editData->contact_numbers }}</textarea>
                                @error('contact_numbers')
                                    <span class="text-danger">{{ $message }}</span> <br>
                                @enderror
                                <br>

                                <label class="mt-3" for="contact_email">Contact Number's <span class="text-danger">*</span></label>
                                <textarea class="form-control" name="contact_email" id="contact_email" cols="30" rows="10">{{ $editData->contact_email }}</textarea>
                                @error('contact_email')
                                    <span class="text-danger">{{ $message }}</span> <br>
                                @enderror


                                <label for="contact_address" class="mt-3">Address <span class="text-danger">*</span></label>
                                <textarea name="contact_address" id="contact_address" class="form-control" placeholder="Enter Institute Address..">{{ $editData->contact_address }}</textarea>
                                @error('contact_address')
                                    <span class="text-danger">{{ $message }}</span> <br>
                                @enderror


                                <label for="contact_schedule" class="mt-3">Office Schedule <span class="text-danger">*</span></label>
                                <input value="{{ $editData->contact_schedule }}" class="form-control" placeholder="enter schedule.." type="text"
                                    name="contact_schedule" id="contact_schedule">
                                @error('contact_schedule')
                                    <span class="text-danger">{{ $message }}</span> <br>
                                @enderror


                                <button class="btn btn-primary btn w-100 my-3">Submit</button>



                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection


@push('additional_js')
    <script src="{{ asset('backend/assets/js/ckeditor.js') }}"></script>

    <script>
        CKEDITOR.ClassicEditor.create(document.getElementById("contact_numbers"), {
            toolbar: {
                items: [

                'bulletedList', 'numberedList', '|',
                    'outdent', 'indent', '|',
                    'undo', 'redo',
                    '-',
                ],
                shouldNotGroupWhenFull: true
            },

            list: {
                properties: {
                    styles: true,
                    startIndex: true,
                    reversed: true
                }
            },

            // https://ckeditor.com/docs/ckeditor5/latest/features/editor-placeholder.html#using-the-editor-configuration
            placeholder: 'insert all phone numbers',



            removePlugins: [

                'AIAssistant',
                'CKBox',
                'CKFinder',
                'EasyImage',
                'RealTimeCollaborativeComments',
                'RealTimeCollaborativeTrackChanges',
                'RealTimeCollaborativeRevisionHistory',
                'PresenceList',
                'Comments',
                'TrackChanges',
                'TrackChangesData',
                'RevisionHistory',
                'Pagination',
                'WProofreader',
                // Careful, with the Mathtype plugin CKEditor will not load when loading this sample
                // from a local file system (file://) - load this site via HTTP server if you enable MathType.
                'MathType',
                // The following features are part of the Productivity Pack and require additional license.
                'SlashCommand',
                'Template',
                'DocumentOutline',
                'FormatPainter',
                'TableOfContents',
                'PasteFromOfficeEnhanced'
            ]
        });
    </script>

    {{-- FOR EMAIL --}}
    <script>
        CKEDITOR.ClassicEditor.create(document.getElementById("contact_email"), {
            toolbar: {
                items: [

                'bulletedList', 'numberedList', '|',
                    'outdent', 'indent', '|',
                    'undo', 'redo',
                    '-',
                ],
                shouldNotGroupWhenFull: true
            },

            list: {
                properties: {
                    styles: true,
                    startIndex: true,
                    reversed: true
                }
            },

            // https://ckeditor.com/docs/ckeditor5/latest/features/editor-placeholder.html#using-the-editor-configuration
            placeholder: 'insert all phone numbers',



            removePlugins: [

                'AIAssistant',
                'CKBox',
                'CKFinder',
                'EasyImage',
                'RealTimeCollaborativeComments',
                'RealTimeCollaborativeTrackChanges',
                'RealTimeCollaborativeRevisionHistory',
                'PresenceList',
                'Comments',
                'TrackChanges',
                'TrackChangesData',
                'RevisionHistory',
                'Pagination',
                'WProofreader',
                // Careful, with the Mathtype plugin CKEditor will not load when loading this sample
                // from a local file system (file://) - load this site via HTTP server if you enable MathType.
                'MathType',
                // The following features are part of the Productivity Pack and require additional license.
                'SlashCommand',
                'Template',
                'DocumentOutline',
                'FormatPainter',
                'TableOfContents',
                'PasteFromOfficeEnhanced'
            ]
        });
    </script>
@endpush
