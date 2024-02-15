@extends('layouts.app')
@section('title')
    <div class="row">
        <h5 class="m-0">
            Cliente {{ $evaluation->participant->client->lastName }} {{ $evaluation->participant->client->secondLastName }} {{ $evaluation->participant->client->name }} {{ $evaluation->participant->client->thirdLastName }} - Determinacion de Ventas
        </h5>
        <div class="btn-group" role="group" aria-label="Button group">
            <form action="{{ route('prints.sales', $activity->id) }}" method="GET">
                <button class="btn btn-info btn-xs" type="submit"><i class="fa fa-print" aria-hidden="true"></i></button>
            </form>
        </div>
    </div>
@endsection
@section('content')
    @include('option.confirmation')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    Ventas
                    @if (!$application->approved && !$application->rejected)
                        @can('activities.store')
                            <button type="button" class="btn btn-success btn-xs" data-toggle="modal" data-target="#averageSaleCreate"><i class="fas fa-plus-circle"></i></button>
                            @include('user.ventas.averageSales.create')
                        @endcan
                    @endif
                </div>
                <div class="card-body">
                    <div class="row">
                        @foreach ($activity->averageSales as $averageSale)
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-header">
                                        {{ $averageSale->type }}
                                        @if (!$application->approved && !$application->rejected)
                                                {{-- @can('activities.update')
                                                    <button type="button" class="btn btn-warning btn-xs" data-toggle="modal" data-target="#averageSaleEdit{{ $averageSale->id }}"><i class="fas fa-pen"></i></button>
                                                    @include('user.ventas.averageSales.edit')
                                                @endcan --}}
                                                @can('activities.destroy')
                                                    <button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#averageSaleDelete{{ $averageSale->id }}"><i class="fas fa-trash-alt"></i></button>
                                                    @include('activity.averageSales.delete')
                                                @endcan
                                            @if ($averageSale->sales->count() < 1)
                                                @can('activities.store')
                                                    <button type="button" class="btn btn-success btn-xs" data-toggle="modal" data-target="#saleCreate{{ $averageSale->id }}"><i class="fas fa-plus-circle"></i></button>
                                                    @include('activity.sales.create')
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

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    Detalle de Efectivo
                    @php
                        $cash = $activity->cash;
                    @endphp
                    @if (!$application->approved && !$application->rejected)
                        @if ($cash)
                            @can('activities.update')
                                <button type="button" class="btn btn-warning btn-xs" data-toggle="modal" data-target="#cashEdit{{ $cash->id }}"><i class="fas fa-pen"></i></button>
                                @include('activity.cashes.edit')
                            @endcan
                            @can('activities.destroy')
                                <button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#cashDelete{{ $cash->id }}"><i class="fas fa-trash-alt"></i></button>
                                @include('activity.cashes.delete')
                            @endcan
                        @else
                            @can('activities.store')
                                <button type="button" class="btn btn-success btn-xs" data-toggle="modal" data-target="#cashCreate"><i class="fas fa-plus-circle"></i></button>
                                @include('activity.cashes.create')
                            @endcan
                        @endif
                    @endif
                </div>
                <div class="card-body p-0 table-responsive">
                    <table class="table table-bordered table-striped table-sm">
                        <thead>
                            <tr>
                                <th>Fecha de evaluacion</th>
                                <th>Fecha Ultima Compra</th>
                                <th>Efectivo Estimado</th>
                                <th>Efectivo Real</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($cash)
                                <tr>
                                    <td>{{ $cash->assessment }}</td>
                                    <td>{{ $cash->buys }}</td>
                                    <td>{{ $cash->estimado() }}</td>
                                    <td>{{ number_format($cash->real, 2, '.', ',') }}</td>
                                </tr>
                                <tr>
                                    <th colspan="3">Ventas Diarias</th>
                                    <th></th>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    Detalle de Compras
                    @if (!$application->approved && !$application->rejected)
                        @can('activities.store')
                            <button type="button" class="btn btn-success btn-xs" data-toggle="modal" data-target="#shoppingCreate"><i class="fas fa-plus-circle"></i></button>
                            @include('activity.shoppings.create')
                        @endcan
                    @endif
                </div>
                <div class="card-body p-0 table-responsive">
                    <table class="table table-bordered table-striped table-sm">
                        <thead>
                            <tr>
                                <th>Producto</th>
                                <th>Cantidad</th>
                                <th>Unidad</th>
                                <th>Frecuencia</th>
                                <th>Precio Compra</th>
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
                            @foreach ($activity->shoppings as $shopping)
                                <tr>
                                    <td>{{ $shopping->name }}</td>
                                    <td>{{ $shopping->amount }}</td>
                                    <td>{{ $shopping->unit }}</td>
                                    <td>{{ $shopping->frecuency }}</td>
                                    <td>{{ number_format($shopping->buys, 2, '.', ',') }}</td>
                                    <td>{{ number_format($shopping->total, 2, '.', ',') }}</td>
                                    @if (!$application->approved && !$application->rejected)
                                        @can('activities.update','activities.destroy')
                                            <td>
                                                <div class="btn-group">
                                                    @can('activities.update')
                                                        <button type="button" class="btn btn-warning btn-xs" data-toggle="modal" data-target="#shoppingEdit{{ $shopping->id }}"><i class="fas fa-pen"></i></button>
                                                        @include('activity.shoppings.edit')
                                                    @endcan
                                                    @can('activities.destroy')
                                                        <button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#shoppingDelete{{ $shopping->id }}"><i class="fas fa-trash-alt"></i></button>
                                                        @include('activity.shoppings.delete')
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
                                <th colspan="5">Compras Mes</th>
                                <th>{{ number_format($activity->shoppings->sum('total'), 2, '.', ',') }}</th>
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
                    Detalle de productos
                    @if (!$application->approved && !$application->rejected)
                        @can('activities.store')
                            <button type="button" class="btn btn-success btn-xs" data-toggle="modal" data-target="#saleDetailCreate"><i class="fas fa-plus-circle"></i></button>
                            @include('activity.saleDetails.create')
                        @endcan
                    @endif
                </div>
                <div class="card-body p-0 table-responsive">
                    <table class="table table-bordered table-striped table-sm">
                        <thead>
                            <tr>
                                <th>
                                    @if ($activity->form == "Produccion")
                                        Articulo
                                    @else
                                        Producto
                                    @endif
                                </th>
                                <th>Cantidad</th>
                                <th>Frecuencia</th>
                                <th>MBP</th>
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
                            @foreach ($activity->saleDetails as $saleDetail)
                                <tr>
                                    <td>
                                        @if ($activity->form == "Produccion")
                                            {{ $saleDetail->article->name ?? '' }}
                                        @else
                                            {{ $saleDetail->inventory->name ?? '' }}
                                        @endif
                                    </td>
                                    <td>{{ $saleDetail->cant }}</td>
                                    <td>{{ $saleDetail->frecuency }}</td>
                                    <td>{{ number_format($saleDetail->mbp(), 2, '.', ',') }} %</td>
                                    <td>{{ $saleDetail->total }}</td>
                                    <td>
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-info btn-xs" data-toggle="modal" data-target="#saleDetailShow{{ $saleDetail->id }}"><i class="fas fa-eye"></i></button>
                                            @include('activity.saleDetails.show')
                                            @can('activities.update')
                                                <button type="button" class="btn btn-warning btn-xs" data-toggle="modal" data-target="#saleDetailEdit{{ $saleDetail->id }}"><i class="fas fa-pen"></i></button>
                                                @include('activity.saleDetails.edit')
                                            @endcan
                                            @can('activities.destroy')
                                                <button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#saleDetailDelete{{ $saleDetail->id }}"><i class="fas fa-trash-alt"></i></button>
                                                @include('activity.saleDetails.delete')
                                            @endcan
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection
