@extends('layouts.app')
@section('title')
    <div class="row">
        <h1 class="m-0">Detalle de compras</h1>
        @can('activities.store')
            <ol class="breadcrumb float-sm-right pl-1">
                <button type="button" class="btn btn-success btn-xs" data-toggle="modal" data-target="#shoppingCreate"><i class="fas fa-plus-circle"></i></button>
            </ol>
        @endcan
    </div>
    @include('activity.shoppings.create')
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
                                <th>Categoria</th>
                                <th>Participante</th>
                                <th>Producto</th>
                                <th>Cantidad</th>
                                <th>Unidad</th>
                                <th>Frecuencia</th>
                                <th>Precio Compra</th>
                                <th>Total</th>
                                <th>Opciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($shoppings as $shopping)
                                <tr>
                                    <td>{{ $shopping->activity->evaluation->participant->application->id }}</td>
                                    <td>{{ $shopping->activity->evaluation->participant->category->name }}</td>
                                    <td>{{ $shopping->activity->evaluation->participant->client->lastName }} {{ $shopping->activity->evaluation->participant->client->secondLastName }} {{ $shopping->activity->evaluation->participant->client->name }}  {{ $shopping->activity->evaluation->participant->client->thirdLastName }}</td>
                                    <td>{{ $shopping->name }}</td>
                                    <td>{{ $shopping->amount }}</td>
                                    <td>{{ $shopping->unit }}</td>
                                    <td>{{ $shopping->frecuency }}</td>
                                    <td>{{ $shopping->buys }}</td>
                                    <td>{{ $shopping->total }}</td>
                                    <td>
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-info btn-xs" data-toggle="modal" data-target="#shoppingShow{{ $shopping->id }}"><i class="fas fa-eye"></i></button>
                                            @include('activity.shoppings.show')
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
                                </tr>
                            @endforeach
                        </tfoot>
                    </table>
                    {{ $shoppings->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
