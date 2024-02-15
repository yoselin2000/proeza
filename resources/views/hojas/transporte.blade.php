@extends('layouts.app')
@section('title')
    <div class="row">
        <h5 class="m-0">
            Cliente {{ $evaluation->participant->client->lastName }} {{ $evaluation->participant->client->secondLastName }} {{ $evaluation->participant->client->name }} {{ $evaluation->participant->client->thirdLastName }} - Hoja de Transporte
        </h5>
        @if (!$application->approved && !$application->rejected)
            @can('activities.store')
                <button type="button" class="btn btn-success btn-xs mr-1" data-toggle="modal" data-target="#vehicleCreate"><i class="fas fa-plus-circle"></i></button>
                @include('activity.vehicles.create')
            @endcan
        @endif
        <div class="btn-group" role="group" aria-label="Button group">
            <form action="{{ route('prints.transport', $activity->id) }}" method="GET">
                <button class="btn btn-info btn-xs" type="submit"><i class="fa fa-print" aria-hidden="true"></i></button>
            </form>
        </div>
    </div>
@endsection
@section('content')
    @include('option.confirmation')
    @foreach ($activity->vehicles as $vehicle)
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        Datos del vehiculo
                        <td>
                            <div class="btn-group">
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
                    </div>
                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-2">
                                <dl class="row">
                                    <dt class="col-md-4">Tipo</dt>
                                    <dd class="col-md-8">{{ $vehicle->type }}</dd>
                                    <dt class="col-md-4">Estado</dt>
                                    <dd class="col-md-8">{{ $vehicle->state }}</dd>
                                </dl>
                            </div>
                            <div class="col-md-2">
                                <dl class="row">
                                    <dt class="col-md-4">Marca</dt>
                                    <dd class="col-md-8">{{ $vehicle->brand }}</dd>
                                    <dt class="col-md-4">Placa</dt>
                                    <dd class="col-md-8">{{ $vehicle->plate }}</dd>
                                </dl>
                            </div>
                            <div class="col-md-2">
                                <dl class="row">
                                    <dt class="col-md-6">Color</dt>
                                    <dd class="col-md-6">{{ $vehicle->color }}</dd>
                                    <dt class="col-md-6">Cilindrada</dt>
                                    <dd class="col-md-6">{{ $vehicle->cylinder }}</dd>
                                </dl>
                            </div>
                            <div class="col-md-2">
                                <dl class="row">
                                    <dt class="col-md-7">Combustible</dt>
                                    <dd class="col-md-5">{{ $vehicle->fuel }}</dd>
                                    <dt class="col-md-7">Año de fabricacion</dt>
                                    <dd class="col-md-5">{{ $vehicle->manufacturing }}</dd>
                                </dl>
                            </div>
                            <div class="col-md-2">
                                <dl class="row">
                                    <dt class="col-md-7">soat</dt>
                                    <dd class="col-md-5">{{ $vehicle->soat }}</dd>
                                    <dt class="col-md-7">Combustible</dt>
                                    <dd class="col-md-5">{{ $vehicle->fuel }}</dd>
                                </dl>
                            </div>
                            <div class="col-md-2">
                                <dl class="row">
                                    <dt class="col-md-6">Año de fabricacion</dt>
                                    <dd class="col-md-6">{{ $vehicle->manufacturing }}</dd>
                                    <dt class="col-md-6">soat</dt>
                                    <dd class="col-md-6">{{ $vehicle->soat }}</dd>
                                </dl>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-6">
                <div class="card">
                    <div class="card-header">
                        Estado General
                        @if (!$application->approved && !$application->rejected)
                            @can('activities.store')
                                <button type="button" class="btn btn-success btn-xs" data-toggle="modal" data-target="#componentCreate{{ $vehicle->id }}"><i class="fas fa-plus-circle"></i></button>
                                @include('activity.components.create')
                            @endcan
                        @endif
                    </div>
                    <div class="card-body p-0 table-responsive">
                        <table class="table table-bordered table-striped table-sm">
                            <thead>
                                <tr>
                                    <th>Componente</th>
                                    <th>Estado</th>
                                    @if (!$application->approved && !$application->rejected)
                                        @can('activities.update','activities.destroy')
                                            <th>
                                                Opc
                                            </th>
                                        @endcan
                                    @endif
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($vehicle->components as $component)
                                    <tr>
                                        <td>{{ $component->componentDetail->name }}</td>
                                        <td>{{ $component->state }}</td>
                                        @if (!$application->approved && !$application->rejected)
                                            @can('activities.update','activities.destroy')
                                                <td>
                                                    <div class="btn-group">
                                                        @can('activities.update')
                                                            <button type="button" class="btn btn-warning btn-xs" data-toggle="modal" data-target="#componentEdit{{ $component->id }}"><i class="fas fa-pen"></i></button>
                                                            @include('activity.components.edit')
                                                        @endcan
                                                        @can('activities.destroy')
                                                            <button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#componentDelete{{ $component->id }}"><i class="fas fa-trash-alt"></i></button>
                                                            @include('activity.components.delete')
                                                        @endcan
                                                    </div>
                                                </td>
                                            @endcan
                                        @endif
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-6">
                <div class="card">
                    <div class="card-header">
                        @if ($vehicle->transport)
                            @php
                                $transport = $vehicle->transport;
                            @endphp
                            {{ $transport->type }}
                            @if (!$application->approved && !$application->rejected)
                                @can('activities.store')
                                    <button type="button" class="btn btn-success btn-xs" data-toggle="modal" data-target="#transportDetailCreate{{ $transport->id }}"><i class="fas fa-plus-circle"></i></button>
                                    @include('activity.transportDetails.create')
                                @endcan
                                @can('activities.update')
                                    <button type="button" class="btn btn-warning btn-xs" data-toggle="modal" data-target="#transportEdit{{ $transport->id }}"><i class="fas fa-pen"></i></button>
                                    @include('activity.transports.edit')
                                @endcan
                                @can('activities.destroy')
                                    <button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#transportDelete{{ $transport->id }}"><i class="fas fa-trash-alt"></i></button>
                                    @include('activity.transports.delete')
                                @endcan
                            @endif
                        @else
                            Ingresos
                            @if (!$application->approved && !$application->rejected)
                                @can('activities.store')
                                    <button type="button" class="btn btn-success btn-xs" data-toggle="modal" data-target="#transportCreate{{ $vehicle->id }}"><i class="fas fa-plus-circle"></i></button>
                                    @include('activity.transports.create')
                                @endcan
                            @endif
                        @endif
                    </div>
                    <div class="card-body p-0 table-responsive">
                        <table class="table table-bordered table-striped table-sm">
                            <thead>
                                <tr>
                                    <th>Detalle</th>
                                    <th>Numero de Carga</th>
                                    <th>Unidad</th>
                                    <th>Numero de viajes</th>
                                    <th>Frecuencia</th>
                                    <th>Precio</th>
                                    <th>Total</th>
                                    @if (!$application->approved && !$application->rejected)
                                        @can('activities.update','activities.destroy')
                                            <th>
                                                Opc
                                            </th>
                                        @endcan
                                    @endif
                                </tr>
                            </thead>
                            <tbody>
                                @if ($vehicle->transport)
                                    @php
                                        $transport = $vehicle->transport;
                                    @endphp
                                    @foreach ($transport->transportDetails as $transportDetail)
                                        <tr>
                                            <td>{{ $transportDetail->detail }}</td>
                                            <td>{{ $transportDetail->num }}</td>
                                            <td>{{ $transportDetail->unit }}</td>
                                            <td>{{ $transportDetail->number }}</td>
                                            <td>{{ $transportDetail->frequency }}</td>
                                            <td>{{ number_format($transportDetail->price, 2, '.', ',') }}</td>
                                            <td>{{ number_format($transportDetail->total, 2, '.', ',') }}</td>

                                            @if (!$application->approved && !$application->rejected)
                                                @can('activities.update','activities.destroy')
                                                    <td>
                                                        <div class="btn-group">
                                                            @can('activities.update')
                                                                <button type="button" class="btn btn-warning btn-xs" data-toggle="modal" data-target="#transportDetailEdit{{ $transportDetail->id }}"><i class="fas fa-pen"></i></button>
                                                                @include('activity.transportDetails.edit')
                                                            @endcan
                                                            @can('activities.destroy')
                                                                <button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#transportDetailDelete{{ $transportDetail->id }}"><i class="fas fa-trash-alt"></i></button>
                                                                @include('activity.transportDetails.delete')
                                                            @endcan
                                                        </div>
                                                    </td>
                                                @endcan
                                            @endif
                                        </tr>
                                    @endforeach
                                @endif
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th colspan="5">Total</th>
                                    <th>
                                        @if ($vehicle->transport && $vehicle->transport->transportDetails)
                                            {{ number_format($vehicle->transport->transportDetails->sum('price'), 2, '.', ',') }}
                                        @endif
                                    </th>
                                    <th>
                                        @if ($vehicle->transport && $vehicle->transport->transportDetails)
                                            {{ number_format($vehicle->transport->transportDetails->sum('total'), 2, '.', ',') }}
                                        @endif
                                    </th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        Costos
                        @if (!$application->approved && !$application->rejected)
                            @can('activities.store')
                                <button type="button" class="btn btn-success btn-xs" data-toggle="modal" data-target="#maintenanceCreate{{ $vehicle->id }}"><i class="fas fa-plus-circle"></i></button>
                                @include('activity.maintenances.create')
                            @endcan
                        @endif
                    </div>
                    <div class="card-body p-0 table-responsive">
                        <table class="table table-bordered table-striped table-sm">
                            <thead>
                                <tr>
                                    <th>Detalle de mantenimiento</th>
                                    <th>Detalle</th>
                                    <th>Cantidad</th>
                                    <th>Precio</th>
                                    <th>Total</th>
                                    <th>Frecuencia</th>
                                    <th>Monto mensual</th>
                                    <th>Monto anual</th>
                                    @if (!$application->approved && !$application->rejected)
                                        @can('activities.update','activities.destroy')
                                            <th>
                                                Opc
                                            </th>
                                        @endcan
                                    @endif
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($vehicle->maintenances as $maintenance)
                                    <tr>
                                        <td>{{ $maintenance->maintenanceDetail->name }}</td>
                                        <td>{{ $maintenance->detail }}</td>
                                        <td>{{ $maintenance->cant }}</td>
                                        <td>{{ number_format($maintenance->price, 2, '.', ',') }}</td>
                                        <td>{{ $maintenance->total }}</td>
                                        <td>{{ $maintenance->frequency }}</td>
                                        <td>{{ number_format($maintenance->month, 2, '.', ',') }}</td>
                                        <td>{{ number_format($maintenance->year, 2, '.', ',') }}</td>
                                        @if (!$application->approved && !$application->rejected)
                                            @can('activities.update','activities.destroy')
                                                <td>
                                                    <div class="btn-group">
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
                                            @endcan
                                        @endif
                                    </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th colspan="4">Total</th>
                                    <th>{{ number_format($vehicle->maintenances->sum('total'), 2, '.', ',') }}</th>
                                    <th></th>
                                    <th>{{ number_format($vehicle->maintenances->sum('month'), 2, '.', ',') }}</th>
                                    <th>{{ number_format($vehicle->maintenances->sum('year'), 2, '.', ',') }}</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        Ventas
                        @if (!$application->approved && !$application->rejected)
                            @can('activities.store')
                                <button type="button" class="btn btn-success btn-xs" data-toggle="modal" data-target="#averageSaleCreate{{ $vehicle->id }}"><i class="fas fa-plus-circle"></i></button>
                                @include('user.transporte.averageSales.create')
                            @endcan
                        @endif
                    </div>
                    <div class="card-body">
                        <div class="row">
                            @foreach ($vehicle->averageSales as $averageSale)
                                <div class="col-md-12">
                                    <div class="card">
                                        <div class="card-header">
                                            {{ $averageSale->type }}
                                            @if (!$application->approved && !$application->rejected)
                                                {{-- @can('activities.update')
                                                    <button type="button" class="btn btn-warning btn-xs" data-toggle="modal" data-target="#averageSaleEdit{{ $averageSale->id }}"><i class="fas fa-pen"></i></button>
                                                    @include('user.transporte.averageSales.edit')
                                                @endcan --}}
                                                @can('activities.destroy')
                                                    <button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#averageSaleDelete{{ $averageSale->id }}"><i class="fas fa-trash-alt"></i></button>
                                                    @include('activity.averageSales.delete')
                                                @endcan
                                                @if ($averageSale->sales->count() < 1 )
                                                    @can('activities.store')
                                                        <button type="button" class="btn btn-success btn-xs" data-toggle="modal" data-target="#saleCreate{{ $averageSale->id }}"><i class="fas fa-plus-circle"></i></button>
                                                        @include('user.transporte.sales.create')
                                                    @endcan
                                                @endif
                                            @endif
                                        </div>
                                        <div class="card-body p-0 table-responsive">
                                            <table class="table table-bordered table-striped table-sm">
                                                <thead>
                                                    <tr>
                                                        @foreach ($averageSale->sales as $sale)
                                                            <th>{{ $sale->item }}</th>
                                                        @endforeach
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        @foreach ($averageSale->sales as $sale)
                                                            <td>{{ number_format($sale->amount, 2, '.', ',') }}</td>
                                                        @endforeach
                                                    </tr>
                                                </tbody>
                                                <tfoot>
                                                    <tr>
                                                        <th colspan="{{ $averageSale->sales->count()-1 }}">Ventas {{ $averageSale->type }}</th>
                                                        <th>{{ number_format($averageSale->sales->sum('amount'), 2, '.', ',') }}</th>
                                                    </tr>
                                                </tfoot>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@endsection
