@extends('layouts.app')
@section('title')
    <div class="row">
        <h1 class="m-0">Inventario</h1>
        @can('activities.store')
            <ol class="breadcrumb float-sm-right pl-1">
                <button type="button" class="btn btn-success btn-xs" data-toggle="modal" data-target="#inventoryCreate"><i class="fas fa-plus-circle"></i></button>
            </ol>
        @endcan
    </div>
    @include('activity.inventories.create')
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
                                <th>Cantidad</th>
                                <th>Unidad</th>
                                <th>Tipo</th>
                                <th>Producto</th>
                                <th>Precio de Compra</th>
                                <th>Precio de Venta</th>
                                <th>MB</th>
                                <th>Valor</th>
                                {{--  <th>Cantidad Vendida</th>
                                <th>Frecuencia</th>
                                <th>Total</th>
                                <th>MBP</th>  --}}
                                <th>Opciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($inventories as $inventory)
                                <tr>
                                    <td>{{ $inventory->amount }}</td>
                                    <td>{{ $inventory->unit }}</td>
                                    <td>{{ $inventory->type }}</td>
                                    <td>{{ $inventory->name }}</td>
                                    <td>{{ number_format($inventory->buys, 2, '.', ',') }}</td>
                                    <td>{{ number_format($inventory->sale, 2, '.', ',') }}</td>
                                    <td>{{ $inventory->mb }} %</td>
                                    <td>{{ number_format($inventory->vipt, 2, '.', ',') }}</td>
                                    {{--  <td>{{ $inventory->cant }}</td>
                                    <td>{{ $inventory->frecuency }}</td>
                                    <td>
                                        @if($inventory->flag)
                                        {{ number_format($inventory->total, 2, '.', ',') }}
                                        @else
                                            0.00
                                        @endif
                                    </td>
                                    <td>{{ $inventory->mbp() }} %</td>  --}}
                                    <td>
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-info btn-xs" data-toggle="modal" data-target="#inventoryShow{{ $inventory->id }}"><i class="fas fa-eye"></i></button>
                                            @include('activity.inventories.show')
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
                                </tr>
                            @endforeach
                        </tbody>
                        
                    </table>
                    {{ $inventories->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
