<div class="modal fade" id="modal-delete-post-{{ $post->id }}">
    <div class="modal-dialog">
        <div class="modal-content bg-default">
            <div class="modal-header">
                <h4 class="modal-title">Eliminar Post</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
            </div>

            <form action="{{ route('admin.posts.delete', $post->id) }}" method="POST">
                @method('DELETE')
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label for="title">Post</label>
                        <input class="form-control" type="text" name="title" id="title" value="{{ $post->title }}" disabled>
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <!-- <button type="button" class="btn btn-outline-primary" data-dismiss="modal">Close</button> -->
                    <button type="submit" class="btn btn-outline-danger">Eliminar</button>
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>