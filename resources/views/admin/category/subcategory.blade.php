@extends('layouts.admin_master')
@section('admin_main_content')
    <section id="subCategory">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Sub Category</h4>
                    </div>

                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-6">
                                <label for="select_category">Select Category</label>
                                <select name="category" id="select_category" class="form-control category_select">
                                    <option value="" selected disabled>select category</option>
                                    @foreach ($allCategory as $data)
                                        <option value="{{ $data->id }}">{{ $data->title }}</option>
                                    @endforeach
                                </select>
                            </div>


                            <div class="col-lg-6">
                                <label for="select_category">Select Sub Category</label>
                                <select name="sub_category" id="select_sub_category"
                                    class="form-control subcategory_select">
                                    <option value="" selected disabled>select a sub category</option>

                                </select>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @push('additional_js')
        <script>
            let category = $('.category_select');
            category.on('change', function() {
                $.ajax({
                    url: "{{ route('admin.create.test') }}",
                    type: 'GET',
                    data: {
                        ctegoryId: $(this).val()
                    },
                    success: function(responce) {
                        let optionsList = [];
                        responce.forEach(data => {
                            let option =
                                `<option value="${data.id}">${data.title}</option>`
                                optionsList.push(option)
                            });

                           $('#select_sub_category').html(optionsList)
                        },

                })
            })
        </script>
    @endpush
@endsection
