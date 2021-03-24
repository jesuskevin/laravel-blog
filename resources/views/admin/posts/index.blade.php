@extends('adminlte::page')

@section('title', 'KBlog - Admin Posts')

@section('css')
<!-- <link rel="stylesheet" href=""> -->
@stop

@section('content_header')

@if(session('status'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    {{ session('status') }}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true"><i class="fas fa-times text-white"></i></span>
    </button>
</div>
@endif
<h1>
    Posts
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-create-post">
        Crear
    </button>
</h1>
@stop

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Listado de posts</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="posts" class="table table-bordered table-striped col-sm-12">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Autor</th>
                                <th>Post</th>
                                <th>Categoría</th>
                                <th>Imagen principal</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($posts as $post)
                            <tr>
                                <td>{{ $post->id }}</td>
                                <td>{{ $post->author }}</td>
                                <td>{{ $post->title }}</td>
                                <td>{{ $post->category->name }}</td>
                                <td>
                                    <img src="{{asset($post->picture)}}" alt="{{$post->title}}" width="100px" class="img-fluid img-thumbnail">
                                </td>
                                <td>
                                    <button type="button" class="btn btn-outline-warning" data-toggle="modal" data-target="#modal-update-post-{{ $post->id }}">
                                        Editar
                                    </button>
                                    <button type="button" class="btn btn-outline-danger" data-toggle="modal" data-target="#modal-delete-post-{{ $post->id }}">
                                        Eliminar
                                    </button>
                                    <a href="/post/{{$post->id}}" class="btn btn-outline-primary">
                                        Ver
                                    </a>
                                </td>
                            </tr>
                            <!-- modal Update posts -->
                            @include('admin.posts.modal-update-post')
                            <!-- /.modal Update posts -->

                            <!-- modal delete posts -->
                            @include('admin.posts.modal-delete-post')
                            <!-- /.modal delete posts -->
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>ID</th>
                                <th>Autor</th>
                                <th>Post</th>
                                <th>Categoría</th>
                                <th>Imagen principal</th>
                                <th>Acciones</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->
</div>

<!-- modal -->
<div class="modal fade" id="modal-create-post">
    <div class="modal-dialog">
        <div class="modal-content bg-default">
            <div class="modal-header">
                <h4 class="modal-title">Crear Posts</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
            </div>

            <form action="{{ route('admin.posts.store') }}" method="POST" enctype="multipart/form-data">
                @method('POST')
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label for="title">Titulo</label>
                        <input class="form-control" type="text" name="title" id="title">
                    </div>
                    <div class="form-group">
                        <label for="category-id">Categoría</label>
                        <select class="form-control" name="category_id" id="category-id">
                            <option value="">-- Elegir categoría --</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="content">Contenido</label>
                        <textarea class="form-control" name="content" id="content" cols="30" rows="5"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="author">Autor</label>
                        <input class="form-control" type="text" name="author" id="author">
                    </div>
                    <div class="form-group">
                        <label for="picture">Imagen principal</label>
                        <input class="form-control" type="file" name="picture" id="picture">
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
<!-- /.modal -->

@stop

@section('js')
<script>
    $(document).ready(function() {
        $('#posts').DataTable({
            "order": [
                [3, "desc"]
            ]
        });
    });
</script>
@stop