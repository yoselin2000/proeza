@extends('layouts.app')
@section('title')
    <div class="row">
        <h1 class="m-0">Vehiculos</h1>
        @can('activities.store')
            <ol class="breadcrumb float-sm-right pl-1">
                <button type="button" class="btn btn-success btn-xs" data-toggle="modal" data-target="#vehicleCreate"><i class="fas fa-plus-circle"></i></button>
            </ol>
        @endcan
    </div>
    @include('activity.vehicles.create')
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
                                <th>Descripción</th>
                                <th>Marca</th>
                                <th>Placa</th>
                                <th>Color</th>
                                <th>Cilindrada</th>
                                <th>Combustible</th>
                                <th>Año de fabricacion</th>
                                <th>soat</th>
                                <th>Opciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($vehicles as $vehicle)
                                <tr>
                                    <td>{{ $vehicle->id }}</td>
                                    <td>{{ $vehicle->type }}</td>
                                    <td>{{ $vehicle->state }}</td>
                                    <td>{{ $vehicle->brand }}</td>
                                    <td>{{ $vehicle->plate }}</td>
                                    <td>{{ $vehicle->color }}</td>
                                    <td>{{ $vehicle->cylinder }}</td>
                                    <td>{{ $vehicle->fuel }}</td>
                                    <td>{{ $vehicle->manufacturing }}</td>
                                    <td>{{ $vehicle->soat }}</td>
                                    <td>
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-info btn-xs" data-toggle="modal" data-target="#vehicleShow{{ $vehicle->id }}"><i class="fas fa-eye"></i></button>
                                            @include('activity.vehicles.show')
                                            @can('activities.update')
                                                <button type="button" class="btn btn-warning btn-xs" data-toggle="modal" data-target="#vehicleEdit{{ $vehicle->id }}"><i class="fas fa-pen"></i></button>
                                                @include('activity.vehicles.edit')
                                            @endcan
                                            @can('activities.destroy')
                                                <button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#vehicleDelete{{ $vehicle->id }}"><i class="fas fa-trash-alt"></i></button>
                                                @include('activity.vehicles.delete')
                                            @endcan
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tfoot>
                    </table>
                    {{ $vehicles->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
