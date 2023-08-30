  <!-- Modal add user -->
  <div class="modal fade" id="addUser" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
          <div class="modal-content">
              <div class="modal-header bg-info">
                  <h5 class="modal-title text-white" id="exampleModalLabel">confirmation of add new user</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <form action="{{ url('admin/users') }}" method="post">
                  @csrf
                  <div class="modal-body">
                      <div class="mb-3">
                          <label for="exampleInputEmail1" class="form-label">Name</label>
                          {{-- old di gunakkan untuk menyimpan value sebelumnya --}}
                          <input type="text"
                              class="form-control @error('name')
                  is-invalid @enderror" name="name"
                              id="exampleInputEmail1" aria-describedby="emailHelp" value="{{ old('name') }}">
                          @error('name')
                              <div class="invalid-feedback">
                                  {{ $message }}
                              </div>
                          @enderror
                      </div>
                      <div class="mb-3">
                          <label for="exampleInputEmail1" class="form-label">Email</label>
                          {{-- old di gunakkan untuk menyimpan value sebelumnya --}}
                          <input type="text"
                              class="form-control @error('email')
                  is-invalid @enderror" name="email"
                              id="exampleInputEmail1" aria-describedby="emailHelp" value="{{ old('email') }}">
                          @error('email')
                              <div class="invalid-feedback">
                                  {{ $message }}
                              </div>
                          @enderror
                      </div>
                      <div class="mb-3">
                          <label for="exampleInputEmail1" class="form-label">password</label>
                          {{-- old di gunakkan untuk menyimpan value sebelumnya --}}
                          <input type="password"
                              class="form-control @error('password')
                  is-invalid @enderror" name="password"
                              id="exampleInputEmail1" aria-describedby="emailHelp" value="{{ old('password') }}">
                          @error('password')
                              <div class="invalid-feedback">
                                  {{ $message }}
                              </div>
                          @enderror
                      </div>
                      <div class="mb-3">
                          <label for="exampleInputEmail1" class="form-label">password confirm</label>
                          {{-- old di gunakkan untuk menyimpan value sebelumnya --}}
                          <input type="password"
                              class="form-control @error('password_confirm')
                  is-invalid @enderror" name="password_confirm"
                              id="exampleInputEmail1" aria-describedby="emailHelp" value="{{ old('password_confirm') }}">
                          @error('password_confirm')
                              <div class="invalid-feedback">
                                  {{ $message }}
                              </div>
                          @enderror
                      </div>
                  </div>
                  <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                      <button type="submit" class="btn btn-info">Save</button>
                  </div>
              </form>
          </div>
      </div>
  </div>
