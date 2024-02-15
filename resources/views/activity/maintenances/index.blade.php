@extends('layouts.app')
@section('title')
    <div class="row">
        <h1 class="m-0">Mantenimiento</h1>
        @can('activities.store')
            <ol class="breadcrumb float-sm-right pl-1">
                <button type="button" class="btn btn-success btn-xs" data-toggle="modal" data-target="#maintenanceCreate"><i class="fas fa-plus-circle"></i></button>
            </ol>
        @endcan
    </div>
    @include('activity.maintenances.create')
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
                                <th>Detalle</th>
                                <th>Cantidad</th>
                                <th>Precio</th>
                                <th>Total</th>
                                <th>Frecuencia</th>
                                <th>Monto mensual</th>
                                <th>Monto anual</th>
                                <th>Opciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($maintenances as $maintenance)
                                <tr>
                                    <td>{{ $maintenance->id }}</td>
                                    <td>{{ $maintenance->detail }}</td>
                                    <td>{{ $maintenance->cant }}</td>
                                    <td>{{ $maintenance->price }}</td>
                                    <td>{{ $maintenance->total }}</td>
                                    <td>{{ $maintenance->frequency }}</td>
                                    <td>{{ $maintenance->month }}</td>
                                    <td>{{ $maintenance->year }}</td>
                                    <td>
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-info btn-xs" data-toggle="modal" data-target="#maintenanceShow{{ $maintenance->id }}"><i class="fas fa-eye"></i></button>
                                            @include('activity.maintenances.show')
                                            @can('activities.update')
                                                <button type="button" class="btn btn-warning btn-xs" data-toggle="modal" data-target="#maintenanceEdit{{ $maintenance->id }}"><i class="fas fa-pen"></i></button>
                                                @include('activity.maintenances.edit')
                                            @endcan
                                            @can('activities.destroy')
                                                <button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#maintenanceDelete{{ $maintenance->id }}"><i class="fas fa-trash-alt"></i></button>
                                                @include('activity.maintenances.delete')
                                            @endcan
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tfoot>
                    </table>
                    {{ $maintenances->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
