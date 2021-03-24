@extends('adminlte::page')

@section('title', 'KBlog - Admin Categorías')

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
    Categorías
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-create-category">
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
                    <h3 class="card-title">Listado de categorías</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="categories" class="table table-bordered table-striped col-md-4">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Categoría</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($categories as $category)
                            <tr>
                                <td>{{ $category->id }}</td>
                                <td>{{ $category->name }}</td>
                                <td>
                                    <button type="button" class="btn btn-outline-warning" data-toggle="modal" data-target="#modal-update-category-{{ $category->id }}">
                                        Editar
                                    </button>
                                    <button type="button" class="btn btn-outline-danger" data-toggle="modal" data-target="#modal-delete-category-{{ $category->id }}">
                                        Eliminar
                                    </button>
                                </td>
                            </tr>
                            <!-- modal Update categories -->
                            @include('admin.categories.modal-update-category')
                            <!-- /.modal Update categories -->

                            <!-- modal delete categories -->
                            @include('admin.categories.modal-delete-category')
                            <!-- /.modal delete categories -->
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>ID</th>
                                <th>Categoría</th>
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
<div class="modal fade" id="modal-create-category">
    <div class="modal-dialog">
        <div class="modal-content bg-default">
            <div class="modal-header">
                <h4 class="modal-title">Crear Categoría</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
            </div>

            <form action="{{ route('admin.categories.store') }}" method="POST">
                @method('POST')
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label for="name">Categoría</label>
                        <input class="form-control" type="text" name="name" id="name">
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
        $('#categories').DataTable({
            "order": [
                [3, "desc"]
            ]
        });
    });
</script>
@stop