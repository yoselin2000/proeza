@extends('layouts.app')
@section('title')
    <div class="row">
        <h1 class="m-0">Pasivos</h1>
        @can('activities.store')
            <ol class="breadcrumb float-sm-right pl-1">
                <button type="button" class="btn btn-success btn-xs" data-toggle="modal" data-target="#businessPassiveCreate"><i class="fas fa-plus-circle"></i></button>
            </ol>
        @endcan
    </div>
    @include('activity.businessPassives.create')
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
                                <th>Nombre del Banco</th>
                                <th>Destino</th>
                                <th>Tipo de Garantia</th>
                                <th>Saldo</th>
                                <th>Opciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($businessPassives as $businessPassive)
                                <tr>
                                    <td>{{ $businessPassive->activity->evaluation->participant->application->id }}</td>
                                    <td>{{ $businessPassive->activity->evaluation->participant->category->name }}</td>
                                    <td>{{ $businessPassive->activity->evaluation->participant->client->lastName }} {{ $businessPassive->activity->evaluation->participant->client->secondLastName }} {{ $businessPassive->activity->evaluation->participant->client->name }}  {{ $businessPassive->activity->evaluation->participant->client->thirdLastName }}</td>
                                    <td>{{ $businessPassive->passiveType->name }}</td>
                                    <td>{{ $businessPassive->destination }}</td>
                                    <td>{{ $businessPassive->warranty }}</td>
                                    <td>{{ $businessPassive->balace }}</td>
                                    <td>
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-info btn-xs" data-toggle="modal" data-target="#businessPassiveShow{{ $businessPassive->id }}"><i class="fas fa-eye"></i></button>
                                            @include('activity.businessPassives.show')
                                            @can('activities.update')
                                                <button type="button" class="btn btn-warning btn-xs" data-toggle="modal" data-target="#businessPassiveEdit{{ $businessPassive->id }}"><i class="fas fa-pen"></i></button>
                                                @include('activity.businessPassives.edit')
                                            @endcan
                                            @can('activities.destroy')
                                                <button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#businessPassiveDelete{{ $businessPassive->id }}"><i class="fas fa-trash-alt"></i></button>
                                                @include('activity.businessPassives.delete')
                                            @endcan
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tfoot>
                    </table>
                    {{ $businessPassives->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
