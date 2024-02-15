@extends('layouts.app')
@section('title')
    <div class="row">
        <h1 class="m-0">Tipo de categoryes</h1>
        @can('categories.store')
            <ol class="breadcrumb float-sm-right pl-1">
                <button type="button" class="btn btn-success btn-xs" data-toggle="modal" data-target="#categoryCreate"><i class="fas fa-plus-circle"></i></button>
            </ol>
        @endcan
    </div>
    @include('admin.categories.create')
@endsection
@section('content')
    @include('option.confirmation')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body p-0 table-responsive">
                    <table class="table table-bordered table-striped table-sm">
                        <thead>
                            <tr>
                                <th>id</th>
                                <th>Nombre</th>
                                <th>Opciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($categories as $category)
                                <tr>
                                    <td>{{ $category->id }}</td>
                                    <td>{{ $category->name }}</td>
                                    <td>
                                        <div class="btn-group">
                                            @can('categories.update')
                                                <button type="button" class="btn btn-warning btn-xs" data-toggle="modal" data-target="#categoryEdit{{ $category->id }}"><i class="fas fa-pen"></i></button>
                                                @include('admin.categories.edit')
                                            @endcan
                                            @can('categories.destroy')
                                                <button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#categoryDelete{{ $category->id }}"><i class="fas fa-trash-alt"></i></button>
                                                @include('admin.categories.delete')
                                            @endcan
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tfoot>
                    </table>
                    {{ $categories->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
