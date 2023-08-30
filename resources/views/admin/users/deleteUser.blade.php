
@foreach ($profile as $item)
<div class="modal fade" id="deleteUser{{ $item->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-danger">
                <h5 class="modal-title text-white" id="exampleModalLabel">confirmation of deleting user</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Are you sure you want to delete user?
            </div>
            <div class="modal-footer">
                <form action="{{ url('admin/users/'.$item->id) }}" method="post">
                    @method('DELETE')
                    @csrf
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-danger">Sure</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endforeach