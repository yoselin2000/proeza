@extends('layouts.app')
@section('title')
    <div class="row">
        <h1 class="m-0">Articulos</h1>
        @can('companyElements.store')
            <ol class="breadcrumb float-sm-right pl-1">
                <button type="button" class="btn btn-success btn-xs" data-toggle="modal" data-target="#companyElementCreate"><i class="fas fa-plus-circle"></i></button>
            </ol>
        @endcan
    </div>
    @include('asset.companyElements.create')
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
                            @foreach ($companyElements as $companyElement)
                                <tr>
                                    <td>{{ $companyElement->id }}</td>
                                    <td>{{ $companyElement->name }}</td>
                                    <td>
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-info btn-xs" data-toggle="modal" data-target="#companyElementShow{{ $companyElement->id }}"><i class="fas fa-eye"></i></button>
                                            @include('asset.companyElements.show')
                                            @can('companyElements.update')
                                                <button type="button" class="btn btn-warning btn-xs" data-toggle="modal" data-target="#companyElementEdit{{ $companyElement->id }}"><i class="fas fa-pen"></i></button>
                                                @include('asset.companyElements.edit')
                                            @endcan
                                            @can('companyElements.destroy')
                                                <button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#companyElementDelete{{ $companyElement->id }}"><i class="fas fa-trash-alt"></i></button>
                                                @include('asset.companyElements.delete')
                                            @endcan
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tfoot>
                    </table>
                    {{ $companyElements->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
