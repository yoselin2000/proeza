@extends('layouts.app')
@section('title')
    <div class="row">
        <h1 class="m-0">Detalle de transporte</h1>
        @can('activities.store')
            <ol class="breadcrumb float-sm-right pl-1">
                <button type="button" class="btn btn-success btn-xs" data-toggle="modal" data-target="#transportDetailCreate"><i class="fas fa-plus-circle"></i></button>
            </ol>
        @endcan
    </div>
    @include('activity.transportDetails.create')
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
                                <th>Numero de Carga</th>
                                <th>Unidad</th>
                                <th>Numero de viajes</th>
                                <th>Frecuencia</th>
                                <th>Precio</th>
                                <th>Opciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($transportDetails as $transportDetail)
                                <tr>
                                    <td>{{ $transportDetail->id }}</td>
                                    <td>{{ $transportDetail->detail }}</td>
                                    <td>{{ $transportDetail->num }}</td>
                                    <td>{{ $transportDetail->unit }}</td>
                                    <td>{{ $transportDetail->number }}</td>
                                    <td>{{ $transportDetail->frequency }}</td>
                                    <td>{{ $transportDetail->price }}</td>
                                    <td>
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-info btn-xs" data-toggle="modal" data-target="#transportDetailShow{{ $transportDetail->id }}"><i class="fas fa-eye"></i></button>
                                            @include('activity.transportDetails.show')
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
                                </tr>
                            @endforeach
                        </tfoot>
                    </table>
                    {{ $transportDetails->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
