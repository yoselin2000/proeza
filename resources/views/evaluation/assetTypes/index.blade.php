@extends('layouts.app')
@section('title')
    <div class="row">
        <h1 class="m-0">Tipos de Activos</h1>
        @can('evalationsFamily.store')
            <ol class="breadcrumb float-sm-right pl-1">
                <button type="button" class="btn btn-success btn-xs" data-toggle="modal" data-target="#assetTypeCreate"><i class="fas fa-plus-circle"></i></button>
            </ol>
        @endcan
    </div>
    @include('evaluation.assetTypes.create')
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
                                <th>Activo</th>
                                <th>Opciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($assetTypes as $assetType)
                                <tr>
                                    <td>{{ $assetType->id }}</td>
                                    <td>{{ $assetType->name }}</td>
                                    
                                    <td>
                                        <div class="btn-group">
                                            @can('evalationsFamily.update')
                                                <button type="button" class="btn btn-warning btn-xs" data-toggle="modal" data-target="#assetTypeEdit{{ $assetType->id }}"><i class="fas fa-pen"></i></button>
                                                @include('evaluation.assetTypes.edit')
                                            @endcan
                                            @can('evalationsFamily.destroy')
                                                <button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#assetTypeDelete{{ $assetType->id }}"><i class="fas fa-trash-alt"></i></button>
                                                @include('evaluation.assetTypes.delete')
                                            @endcan
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tfoot>
                    </table>
                    {{ $assetTypes->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
