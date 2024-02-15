@extends('layouts.app')
@section('title')
    <div class="row">
        <h1 class="m-0">Informacion de actividad</h1>
        @can('activities.store')
            <ol class="breadcrumb float-sm-right pl-1">
                <button type="button" class="btn btn-success btn-xs" data-toggle="modal" data-target="#complementCreate"><i class="fas fa-plus-circle"></i></button>
            </ol>
        @endcan
    </div>
    @include('activity.complements.create')
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
                                <th>Descripcion</th>
                                <th>Opciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($complements as $complement)
                                <tr>
                                    <td>{{ $complement->id }}</td>
                                    <td>{{ $complement->activity->evaluation->participant->application->id }}</td>
                                    <td>{{ $complement->activity->evaluation->participant->category->name }}</td>
                                    <td>{{ $complement->activity->evaluation->participant->client->lastName }} {{ $complement->activity->evaluation->participant->client->secondLastName }} {{ $complement->activity->evaluation->participant->client->name }}  {{ $complement->activity->evaluation->participant->client->thirdLastName }}</td>
                                    <td>{{ $complement->description }}</td>
                                    <td>
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-info btn-xs" data-toggle="modal" data-target="#complementShow{{ $complement->id }}"><i class="fas fa-eye"></i></button>
                                            @include('activity.complements.show')
                                            @can('activities.update')
                                                <button type="button" class="btn btn-warning btn-xs" data-toggle="modal" data-target="#complementEdit{{ $complement->id }}"><i class="fas fa-pen"></i></button>
                                                @include('activity.complements.edit')
                                            @endcan
                                            @can('activities.destroy')
                                                <button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#complementDelete{{ $complement->id }}"><i class="fas fa-trash-alt"></i></button>
                                                @include('activity.complements.delete')
                                            @endcan
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tfoot>
                    </table>
                    {{ $complements->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
