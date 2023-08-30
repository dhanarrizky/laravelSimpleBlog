@foreach ($profile as $item)
<div class="modal fade" id="editUser{{ $item->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-warning">
                <h5 class="modal-title text-white" id="exampleModalLabel">confirmation fo editing data</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ url('admin/users/'.$item->id) }}" method="post">
                @method('PUT')
                @csrf
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Name</label>
                        <input type="text"
                            class="form-control @error('name')
                      is-invalid @enderror"
                            name="name" id="exampleInputEmail1" aria-describedby="emailHelp"
                            value="{{ old('name',$item->name) }}">
                        @error('name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Email</label>
                        <input type="text"
                            class="form-control @error('email')
                        is-invalid @enderror"
                            name="email" id="exampleInputEmail1" aria-describedby="emailHelp"
                            value="{{ old('email',$item->email) }}">
                        @error('email')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">password</label>
                        <input type="password"
                            class="form-control @error('password')
                        is-invalid @enderror"
                            name="password" id="exampleInputEmail1" aria-describedby="emailHelp"
                            value="{{ old('password') }}">
                        @error('password')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">password confirm</label>
                        <input type="password"
                            class="form-control @error('password_confirm')
                        is-invalid @enderror"
                            name="password_confirm" id="exampleInputEmail1" aria-describedby="emailHelp"
                            value="{{ old('password_confirm') }}">
                        @error('password_confirm')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-warning">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endforeach