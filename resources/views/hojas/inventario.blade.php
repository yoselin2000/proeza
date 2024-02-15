@extends('layouts.app')
@section('title')
    <div class="row">
        <h5 class="m-0">
            Cliente {{ $evaluation->participant->client->lastName }} {{ $evaluation->participant->client->secondLastName }} {{ $evaluation->participant->client->name }} {{ $evaluation->participant->client->thirdLastName }} - Inventario
        </h5>
        @if (!$application->approved && !$application->rejected)
            @can('activities.store')
                <button type="button" class="btn btn-success btn-xs mr-1" data-toggle="modal" data-target="#inventoryCreate"><i class="fas fa-plus-circle"></i></button>
                @include('activity.inventories.create')
            @endcan
        @endif
        <div class="btn-group" role="group" aria-label="Button group">
            <form action="{{ route('prints.inventory', $activity->id) }}" method="GET">
                <button class="btn btn-info btn-xs" type="submit"><i class="fa fa-print" aria-hidden="true"></i></button>
            </form>
        </div>
    </div>
@endsection
@section('content')
    @include('option.confirmation')
    @include('option.rechazo')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    Inventarios
                </div>
                <div class="card-body p-0 table-responsive">
                    <table class="table table-bordered table-striped table-sm">
                        <thead>
                            <tr>
                                <th>Cantidad</th>
                                <th>Unidad</th>
                                <th>Tipo</th>
                                <th>Producto</th>
                                <th>Precio de Compra</th>
                                <th>Precio de Venta</th>
                                <th>MB</th>
                                <th>Valor</th>
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
                            @foreach ($activity->inventories as $inventory)
                                <tr>
                                    <td>{{ $inventory->amount }}</td>
                                    <td>{{ $inventory->unit }}</td>
                                    <td>{{ $inventory->type }}</td>
                                    <td>{{ $inventory->name }}</td>
                                    <td>{{ number_format($inventory->buys, 2, '.', ',') }}</td>
                                    <td>{{ number_format($inventory->sale, 2, '.', ',') }}</td>
                                    <td>{{ $inventory->mb }} %</td>
                                    <td>{{ number_format($inventory->vipt, 2, '.', ',') }}</td>
                                    @if (!$application->approved && !$application->rejected)
                                        @can('activities.update','activities.destroy')
                                            <td>
                                                <div class="btn-group">
                                                    @can('activities.update')
                                                        <button type="button" class="btn btn-warning btn-xs" data-toggle="modal" data-target="#inventoryEdit{{ $inventory->id }}"><i class="fas fa-pen"></i></button>
                                                        @include('activity.inventories.edit')
                                                    @endcan
                                                    @can('activities.destroy')
                                                        <button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#inventoryDelete{{ $inventory->id }}"><i class="fas fa-trash-alt"></i></button>
                                                        @include('activity.inventories.delete')
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
                                <th>{{ number_format($activity->inventories->sum('buys'), 2, '.', ',') }}</th>
                                <th>{{ number_format($activity->inventories->sum('sale'), 2, '.', ',') }}</th>
                                <th>{{ $activity->mbTotal() }} %</th>
                                <th>{{ number_format($activity->inventories->sum('vipt'), 2, '.', ',') }}</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
