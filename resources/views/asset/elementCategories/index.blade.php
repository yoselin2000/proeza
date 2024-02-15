@extends('layouts.app')
@section('title')
    <div class="row">
        <h1 class="m-0">Categoria de Articulos</h1>
        @can('elementCategories.store')
            <ol class="breadcrumb float-sm-right pl-1">
                <button type="button" class="btn btn-success btn-xs" data-toggle="modal" data-target="#elementCategoryCreate"><i class="fas fa-plus-circle"></i></button>
            </ol>
        @endcan
    </div>
    @include('asset.elementCategories.create')
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
                            @foreach ($elementCategories as $elementCategory)
                                <tr>
                                    <td>{{ $elementCategory->id }}</td>
                                    <td>{{  $elementCategory->name }}</td>
                                    <td>
                                        <div class="btn-group">
                                            @can('elementCategories.update')
                                                <button type="button" class="btn btn-warning btn-xs" data-toggle="modal" data-target="#elementCategoryEdit{{ $elementCategory->id }}"><i class="fas fa-pen"></i></button>
                                                @include('asset.elementCategories.edit')
                                            @endcan
                                            @can('elementCategories.destroy')
                                                <button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#elementCategoryDelete{{ $elementCategory->id }}"><i class="fas fa-trash-alt"></i></button>
                                                @include('asset.elementCategories.delete')
                                            @endcan
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tfoot>
                    </table>
                    {{ $elementCategories->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
