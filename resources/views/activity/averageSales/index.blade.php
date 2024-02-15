@extends('layouts.app')
@section('title')
    <div class="row">
        <h1 class="m-0">Promedio de Ventas</h1>
        @can('activities.store')
            <ol class="breadcrumb float-sm-right pl-1">
                <button type="button" class="btn btn-success btn-xs" data-toggle="modal" data-target="#averageSaleCreate"><i class="fas fa-plus-circle"></i></button>
            </ol>
        @endcan
    </div>
    @include('activity.averageSales.create')
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
                                <th>Solicitud</th>
                                <th>Categoria</th>
                                <th>Participante</th>
                                <th>Opciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($averageSales as $averageSale)
                                <tr>
                                    <td>{{ $averageSale->id }}</td>
                                    @if ($averageSale->activity)
                                        <td>{{ $averageSale->activity->evaluation->participant->application->id }}</td>
                                        <td>{{ $averageSale->activity->evaluation->participant->category->name }}</td>
                                        <td>{{ $averageSale->activity->evaluation->participant->client->lastName }} {{ $averageSale->activity->evaluation->participant->client->secondLastName }} {{ $averageSale->activity->evaluation->participant->client->name }}  {{ $averageSale->activity->evaluation->participant->client->thirdLastName }}</td>
                                    @endif
                                    @if ($averageSale->vehicle)
                                        <td>{{ $averageSale->vehicle->activity->evaluation->participant->application->id }}</td>
                                        <td>{{ $averageSale->vehicle->activity->evaluation->participant->category->name }}</td>
                                        <td>{{ $averageSale->vehicle->activity->evaluation->participant->client->lastName }} {{ $averageSale->vehicle->activity->evaluation->participant->client->secondLastName }} {{ $averageSale->vehicle->activity->evaluation->participant->client->name }}  {{ $averageSale->vehicle->activity->evaluation->participant->client->thirdLastName }}</td>
                                    @endif
                                    <td>
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-info btn-xs" data-toggle="modal" data-target="#averageSaleShow{{ $averageSale->id }}"><i class="fas fa-eye"></i></button>
                                            @include('activity.averageSales.show')
                                            @can('activities.update')
                                                <button type="button" class="btn btn-warning btn-xs" data-toggle="modal" data-target="#averageSaleEdit{{ $averageSale->id }}"><i class="fas fa-pen"></i></button>
                                                @include('activity.averageSales.edit')
                                            @endcan
                                            @can('activities.destroy')
                                                <button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#averageSaleDelete{{ $averageSale->id }}"><i class="fas fa-trash-alt"></i></button>
                                                @include('activity.averageSales.delete')
                                            @endcan
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tfoot>
                    </table>
                    {{ $averageSales->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
