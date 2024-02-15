@extends('layouts.app')
@section('title')
    <div class="row">
        <h1 class="m-0">Tipos de Pasivos</h1>
        @can('evalationsFamily.store')
            <ol class="breadcrumb float-sm-right pl-1">
                <button type="button" class="btn btn-success btn-xs" data-toggle="modal" data-target="#passiveTypeCreate"><i class="fas fa-plus-circle"></i></button>
            </ol>
        @endcan
    </div>
    @include('evaluation.passiveTypes.create')
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
                                <th>Pasivo</th>
                                <th>Opciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($passiveTypes as $passiveType)
                                <tr>
                                    <td>{{ $passiveType->id }}</td>
                                    <td>{{ $passiveType->name }}</td>
                                    
                                    <td>
                                        <div class="btn-group">
                                            @can('evalationsFamily.update')
                                                <button type="button" class="btn btn-warning btn-xs" data-toggle="modal" data-target="#passiveTypeEdit{{ $passiveType->id }}"><i class="fas fa-pen"></i></button>
                                                @include('evaluation.passiveTypes.edit')
                                            @endcan
                                            @can('evalationsFamily.destroy')
                                                <button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#passiveTypeDelete{{ $passiveType->id }}"><i class="fas fa-trash-alt"></i></button>
                                                @include('evaluation.passiveTypes.delete')
                                            @endcan
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tfoot>
                    </table>
                    {{ $passiveTypes->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
