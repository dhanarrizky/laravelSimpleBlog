  <!-- Modal add category -->
  <div class="modal fade" id="addCategory" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
          <div class="modal-content">
              <div class="modal-header bg-info">
                  <h5 class="modal-title text-white" id="exampleModalLabel">confirmation</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  <form action="{{ url('admin/category') }}" method="post">
              </div>
              @csrf
              <div class="modal-body">
                  <div class="mb-3">
                      <label for="exampleInputEmail1" class="form-label">name of new category</label>
                      {{-- old di gunakkan untuk menyimpan value sebelumnya --}}
                      <input type="text" class="form-control @error('name')
                    is-invalid @enderror"
                          name="name" id="exampleInputEmail1" aria-describedby="emailHelp"
                          value="{{ old('name') }}">
                      @error('name')
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
          </div>
          </form>
      </div>
  </div>
