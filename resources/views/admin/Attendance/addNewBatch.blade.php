@extends('layouts.admin_master')
@section('admin_main_content')
    <div class="container">
        <div class="row">
            <div class="col-8 mx-auto card shadow">
                <div class="card">
                    <div class="card-header">
                        <h4>Add New Batch with Section</h4>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{ route('insert.new.batch') }}" method="POST">
                        @csrf 
                        <label for="batch_no" class="mb-3">Insert A New Batch With Section</label>
                        <input id="batch_no" name="batch_no" type="text" class="form-control" placeholder="---Bath 20 Section B---">
                        @error('batch_no')
                           <strong class="text-danger">{{ $message }}</strong>
                        @enderror

                        @if ($message = Session::get('error'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                           <strong>{{ $message }}</strong>
                        </div>
                        @endif 
                        
                        <button class="btn btn-primary w-100 mt-3">Upload</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection