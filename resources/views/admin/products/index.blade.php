@extends('layouts.app')
@section('title')
    <div class="row">
        <h1 class="m-0">Productos</h1>
        @can('products.store')
            <ol class="breadcrumb float-sm-right pl-1">
                <button type="button" class="btn btn-success btn-xs" data-toggle="modal" data-target="#productCreate"><i class="fas fa-plus-circle"></i></button>
            </ol>
        @endcan
    </div>
    @include('admin.products.create')
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
                            @foreach ($products as $product)
                                <tr>
                                    <td>{{ $product->id }}</td>
                                    <td>{{ $product->name }}</td>
                                    <td>
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-info btn-xs" data-toggle="modal" data-target="#productShow{{ $product->id }}"><i class="fas fa-eye"></i></button>
                                            @include('admin.products.show')
                                            @can('products.update')
                                                <button type="button" class="btn btn-warning btn-xs" data-toggle="modal" data-target="#productEdit{{ $product->id }}"><i class="fas fa-pen"></i></button>
                                                @include('admin.products.edit')
                                            @endcan
                                            @can('products.destroy')
                                                <button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#productDelete{{ $product->id }}"><i class="fas fa-trash-alt"></i></button>
                                                @include('admin.products.delete')
                                            @endcan
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tfoot>
                    </table>
                    {{ $products->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
