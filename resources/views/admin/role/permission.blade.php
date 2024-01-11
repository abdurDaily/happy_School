@extends('layouts.admin_master')
@section('admin_main_content')
    <section id="role">
        <div class="container">
            <div class="card">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>All Permissions</h4>
                            </div>
                            <div class="card-body">
                                {{-- all permission --}}
                                <form action="{{ route('admin.permission.test', request()->id) }}" method="post">
                                    @csrf
                                    <div class="row">
                                        @forelse ($permissions as $permission)
                                            <div class="col-md-3">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" name="permission_id[]"
                                                        value="{{ $permission->id }}" id="flexCheck_{{ $permission->id }}">
                                                    <label class="form-check-label" for="flexCheck_{{ $permission->id }}">
                                                        {{ $permission->name }}
                                                    </label>
                                                </div>
                                            </div>
                                        @empty
                                            <h5>No Permission Data Found!</h5>
                                        @endforelse


                                    </div>

                                    <button class="btn btn-primary w-100 mt-5">Submit</button>
                                </form>
                                {{-- all permission end  --}}
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
@endsection
