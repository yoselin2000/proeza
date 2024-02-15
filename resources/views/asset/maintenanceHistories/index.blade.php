@extends('layouts.app')
@section('title')
    <div class="row">
        <h1 class="m-0">Historial de mantenimiento</h1>
        @can('maintenanceHistories.store')
            <ol class="breadcrumb float-sm-right pl-1">
                <button type="button" class="btn btn-success btn-xs" data-toggle="modal" data-target="#maintenanceHistoryCreate"><i class="fas fa-plus-circle"></i></button>
            </ol>
        @endcan
    </div>
    @include('asset.maintenanceHistories.create')
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
                                <th>Fecha de salida</th>
                                <th>Fecha de entrada</th>
                                <th>Descripcion</th>
                                <th>Opciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($maintenanceHistories as $maintenanceHistory)
                                <tr>
                                    <td>{{ $maintenanceHistory->id }}</td>
                                    <td>{{ $maintenanceHistory->elementComponent->companyElement->name }}</td>
                                    <td>{{ $maintenanceHistory->FDeparture }}</td>
                                    <td>{{ $maintenanceHistory->FEntry }}</td>
                                    <td>{{ $maintenanceHistory->description }}</td>
                                    <td>
                                        <div class="btn-group">
                                            @can('maintenanceHistories.update')
                                                <button type="button" class="btn btn-warning btn-xs" data-toggle="modal" data-target="#maintenanceHistoryEdit{{ $maintenanceHistory->id }}"><i class="fas fa-pen"></i></button>
                                                @include('asset.maintenanceHistories.edit')
                                            @endcan
                                            @can('maintenanceHistories.destroy')
                                                <button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#maintenanceHistoryDelete{{ $maintenanceHistory->id }}"><i class="fas fa-trash-alt"></i></button>
                                                @include('asset.maintenanceHistories.delete')
                                            @endcan
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tfoot>
                    </table>
                    {{ $maintenanceHistories->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
