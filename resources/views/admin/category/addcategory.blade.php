@extends('layouts.admin_master')
@section('admin_main_content')
    <div class="row">
        <div class="col-lg-8 table-responsive order-2 order-lg-1">
            <table class="table table-hover table-striped">
                <tr>
                    <th>SN</th>
                    <th>Category Name</th>
                    <th>Action</th>
                </tr>

                @forelse ($categoryData as $key=>$data)
                    <tr>
                        <td>{{ ++$key }}</td>
                        <td>{{ $data->title }}</td>
                        <td>
                            <div class="btn-group">
                                <a href="{{ route('admin.event.edit', $data->id) }}" class="btn btn-primary btn-sm"><i
                                        class="fa-solid fa-pen-to-square"></i></a>
                                <a href="{{ route('admin.event.delete', $data->id) }}" class="btn btn-danger btn-sm"><i
                                        class="fa-solid fa-trash"></i></i></a>
                            </div>
                        </td>

                    </tr>
                @empty
                @endforelse
            </table>
        </div>
        <div class="col-lg-4 order-1 order-lg-2">

            <div class="card">
                <div class="card-header bg-primary ">
                    <h4 style="color: #fff;">Add Category</h4>
                </div>
                <div class="card-body mt-3">
                    <form action="{{ route('admin.store.category') }}" method="post">
                        @csrf
                        <label for="category">Add Category  <strong class="text-danger">*</strong></label>
                        <input type="text" name="category" id="category" class="form-control" placeholder="enter a category">
                        <select name="category_id" class="form-control my-2">
                            <option disabled selected> Select a Parent Category</option>
                            @foreach ($categoryData as $cat)
                                    <option value="{{ $cat->id }}">{{ $cat->title }}</option>
                            @endforeach
                        </select>
                        @error('category')
                            <strong class="text-danger">{{ $message }}</strong>
                        @enderror
                        <button class="btn btn-primary w-100 mt-3">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
