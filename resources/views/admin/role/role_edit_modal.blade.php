{{-- * MODAL START --}}
<!-- Modal -->
<div class="modal fade" id="exampleModal_{{ $data->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog  modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Role And Permission</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body px-5">
                <div class="row">
                    <div class="col-12 order-md-2 order-sm-1">
                        <div class="card shadow">
                            <div class="card-header bg-primary">
                                <h5 style="color: #fff; margin:0;">Edit Role</h5>
                            </div>
                            <div class="card-body">
                                <form action="{{ route('admin.role.update',  $data->id) }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    @method('put')
                                    <label for="name" class="mt-3">Role Assign</label>
                                    <input type="text" value="{{ $data->name }}" id="name" name="name"
                                        class="form-control" placeholder="enter a role name">
                                    @error('name')
                                        <strong class="text-danger">{{ $message }}</strong>
                                    @enderror



                                    {{-- all permission --}}
                                    <div class="row my-5">
                                        @forelse ($permissions as $permission)
                                            <div class="col-md-6">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" name="permission_id[]"
                                                        value="{{ $permission->id }}"
                                                        id="flexCheck_{{ $permission->id }}">
                                                    <label class="form-check-label"
                                                        for="flexCheck_{{ $permission->id }}">
                                                        {{ $permission->name }}
                                                    </label>
                                                </div>
                                            </div>
                                        @empty
                                            <h5>No Permission Data Found!</h5>
                                        @endforelse
                                    </div>
                                    {{-- all permission end  --}}


                                    <button class="btn btn-primary w-100 mt-3">Submit</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>



            </div>
        </div>
    </div>
</div>

{{-- * MODAL END --}}
