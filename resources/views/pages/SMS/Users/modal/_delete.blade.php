
<div class="modal fade" id="delete{{ $user->id }}" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-danger">
                <h5 class="modal-title text-white">Delete</h5>

            </div>
            <div class="modal-body">
                <p>Are you sure you want to delete this data?</p>
            </div>
            <div class="modal-footer">
                <form action="{{ route('user.destroy', ['id' => $user->id]) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </div>
        </div>
    </div>
</div>
