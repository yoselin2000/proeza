@extends('layouts.app')
@section('title')
    <div class="row">
        <h1 class="m-0">Insumos</h1>
        @can('activities.store')
            <ol class="breadcrumb float-sm-right pl-1">
                <button type="button" class="btn btn-success btn-xs" data-toggle="modal" data-target="#supplyCreate"><i class="fas fa-plus-circle"></i></button>
            </ol>
        @endcan
    </div>
    @include('activity.supplies.create')
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
                                <th>Insumo</th>
                                <th>Cantidad</th>
                                <th>Unidad</th>
                                <th>Rendimiento</th>
                                <th>Precio unitario</th>
                                <th>Total</th>
                                <th>Opciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($supplies as $supply)
                                <tr>
                                    <td>{{ $supply->id }}</td>
                                    <td>{{ $supply->name }}</td>
                                    <td>{{ $supply->cant }}</td>
                                    <td>{{ $supply->unit }}</td>
                                    <td>{{ $supply->performance }}</td>
                                    <td>{{ $supply->price }}</td>
                                    <td>{{ $supply->total}}</td>
                                    <td>
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-info btn-xs" data-toggle="modal" data-target="#supplyShow{{ $supply->id }}"><i class="fas fa-eye"></i></button>
                                            @include('activity.supplies.show')
                                            @can('activities.update')
                                                <button type="button" class="btn btn-warning btn-xs" data-toggle="modal" data-target="#supplyEdit{{ $supply->id }}"><i class="fas fa-pen"></i></button>
                                                @include('activity.supplies.edit')
                                            @endcan
                                            @can('activities.destroy')
                                                <button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#supplyDelete{{ $supply->id }}"><i class="fas fa-trash-alt"></i></button>
                                                @include('activity.supplies.delete')
                                            @endcan
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tfoot>
                    </table>
                    {{ $supplies->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
