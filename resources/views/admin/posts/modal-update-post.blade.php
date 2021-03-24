<div class="modal fade" id="modal-update-post-{{ $post->id }}">
    <div class="modal-dialog">
        <div class="modal-content bg-default">
            <div class="modal-header">
                <h4 class="modal-title">Actualizar Post</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
            </div>

            <form action="{{ route('admin.posts.update', $post->id) }}" method="POST" enctype="multipart/form-data">
                @method('POST')
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label for="title">Post</label>
                        <input class="form-control" type="text" name="title" id="title" value="{{ $post->title }}">
                    </div>
                    <div class="form-group">
                        <label for="category-id">Categoría</label>
                        <select class="form-control" name="category_id" id="category-id">
                            <option value="{{ $post->category->id }}">{{ $post->category->name }}</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="content">Contenido</label>
                        <textarea class="form-control" name="content" id="content" cols="30" rows="5">{{ $post->content }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="author">Autor</label>
                        <input class="form-control" type="text" name="author" id="author" value="{{ $post->author }}">
                    </div>
                    <div class="form-group">
                        <label for="picture">Imagen principal</label>
                        <input class="form-control" type="file" name="picture" id="picture">
                    </div>
                    <div class="form-group">
                        <img src="{{asset($post->picture)}}" alt="{{$post->title}}" width="100px" class="img-fluid img-thumbnail">
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <!-- <button type="button" class="btn btn-outline-primary" data-dismiss="modal">Close</button> -->
                    <button type="submit" class="btn btn-outline-primary">Guardar</button>
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>