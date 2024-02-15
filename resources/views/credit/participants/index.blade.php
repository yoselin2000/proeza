@extends('layouts.app')
@section('title')
    <div class="row">
        <h1 class="m-0">participantes</h1>
        @can('participants.store')
            <ol class="breadcrumb float-sm-right pl-1">
                <button type="button" class="btn btn-success btn-xs" data-toggle="modal" data-target="#participantCreate"><i class="fas fa-plus-circle"></i></button>
            </ol>
        @endcan
    </div>
    @include('credit.participants.create')
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
                                <th>Cliente</th>
                                <th>Solicitud</th>
                                <th>Categoria</th>
                                <th>Opciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($participants as $participant)
                                <tr>
                                    <td>{{ $participant->id }}</td>
                                    <td>{{ $participant->client->lastName }} {{ $participant->client->secondLastName }} {{ $participant->client->name }} {{ $participant->client->thirdLastName }}</td>
                                    <td>{{ $participant->application->amount }}</td>
                                    <td>{{ $participant->category->name }}</td>
                                    <td>
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-info btn-xs" data-toggle="modal" data-target="#participantShow{{ $participant->id }}"><i class="fas fa-eye"></i></button>
                                            @include('credit.participants.show')
                                            @can('participants.update')
                                                <button type="button" class="btn btn-warning btn-xs" data-toggle="modal" data-target="#participantEdit{{ $participant->id }}"><i class="fas fa-pen"></i></button>
                                                @include('credit.participants.edit')
                                            @endcan
                                            @can('participants.destroy')
                                                <button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#participantDelete{{ $participant->id }}"><i class="fas fa-trash-alt"></i></button>
                                                @include('credit.participants.delete')
                                            @endcan
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tfoot>
                    </table>
                    {{ $participants->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
