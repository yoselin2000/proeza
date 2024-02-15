@extends('layouts.app')
@section('title')
    <div class="row">
        <h1 class="m-0">Croquis de Negocio</h1>
        @can('activities.store')
            <ol class="breadcrumb float-sm-right pl-1">
                <button type="button" class="btn btn-success btn-xs" data-toggle="modal" data-target="#businessAddressCreate"><i class="fas fa-plus-circle"></i></button>
            </ol>
        @endcan
    </div>
    @include('activity.businessAddresses.create')
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
                                {{--  <th>Tipo de Propiedad</th>
                                <th>Tiempo</th>  --}}
                                <th>Domicilio</th>
                                {{--  <th>N°</th>
                                <th>Zona</th>  --}}
                                <th>Telefono</th>
                                {{--  <th>Provincia/Municipio/Comunidad</th>
                                <th>Link Google Map</th>
                                <th>Imagen</th>  --}}
                                <th>Descripción</th>
                                <th>Opciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($businessAddresses as $businessAddress)
                                <tr>
                                    {{--  <td>{{ $businessAddress->id }}</td>  --}}
                                    <td>{{ $businessAddress->activity->evaluation->participant->application->id }}</td>
                                    <td>{{ $businessAddress->activity->evaluation->participant->category->name }}</td>
                                    <td>{{ $businessAddress->activity->evaluation->participant->client->lastName }} {{ $businessAddress->activity->evaluation->participant->client->secondLastName }} {{ $businessAddress->activity->evaluation->participant->client->name }}  {{ $businessAddress->activity->evaluation->participant->client->thirdLastName }}</td>
                                    {{--  <td>{{ $businessAddress->property }}</td>
                                    <td>{{ $businessAddress->time }}</td>  --}}
                                    <td>{{ $businessAddress->direction }}</td>
                                    {{--  <td>{{ $businessAddress->number }}</td>
                                    <td>{{ $businessAddress->zone }}</td>  --}}
                                    <td>{{ $businessAddress->mobile }}</td>
                                    {{--  <td>{{ $businessAddress->province }}</td>
                                    <td>{{ $businessAddress->link }}</td>
                                    <td>{{ $businessAddress->file }}</td>  --}}
                                    <td>{{ $businessAddress->description }}</td>
                                    <td>
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-info btn-xs" data-toggle="modal" data-target="#businessAddressShow{{ $businessAddress->id }}"><i class="fas fa-eye"></i></button>
                                            @include('activity.businessAddresses.show')
                                            @can('activities.update')
                                                <button type="button" class="btn btn-warning btn-xs" data-toggle="modal" data-target="#businessAddressEdit{{ $businessAddress->id }}"><i class="fas fa-pen"></i></button>
                                                @include('activity.businessAddresses.edit')
                                            @endcan
                                            @can('activities.destroy')
                                                <button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#businessAddressDelete{{ $businessAddress->id }}"><i class="fas fa-trash-alt"></i></button>
                                                @include('activity.businessAddresses.delete')
                                            @endcan
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tfoot>
                    </table>
                    {{ $businessAddresses->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
