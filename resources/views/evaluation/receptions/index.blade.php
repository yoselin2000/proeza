@extends('layouts.app')
@section('title')
    <div class="row">
        <h1 class="m-0">Recepcion de Documentos</h1>
        @can('evalationsFamily.store')
            <ol class="breadcrumb float-sm-right pl-1">
                <button type="button" class="btn btn-success btn-xs" data-toggle="modal" data-target="#receptionCreate"><i class="fas fa-plus-circle"></i></button>
            </ol>
        @endcan
    </div>
    @include('evaluation.receptions.create')
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
                                <th>Cliente</th>
                                <th>Opciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($receptions as $reception)
                                <tr>
                                    <td>{{ $reception->id }}</td>
                                    <td>{{ $reception->evaluation->participant->application->id }}</td>
                                    <td>{{ $reception->evaluation->participant->category->name }}</td>
                                    <td>{{ $reception->evaluation->participant->client->lastName }} {{ $reception->evaluation->participant->client->secondLastName }} {{ $reception->evaluation->participant->client->name }}  {{ $reception->evaluation->participant->client->thirdLastName }}</td>
                                    <td>
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-info btn-xs" data-toggle="modal" data-target="#receptionShow{{ $reception->id }}"><i class="fas fa-eye"></i></button>
                                            @include('evaluation.receptions.show')
                                            @can('evalationsFamily.update')
                                                <button type="button" class="btn btn-warning btn-xs" data-toggle="modal" data-target="#receptionEdit{{ $reception->id }}"><i class="fas fa-pen"></i></button>
                                                @include('evaluation.receptions.edit')
                                            @endcan
                                            @can('evalationsFamily.destroy')
                                                <button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#receptionDelete{{ $reception->id }}"><i class="fas fa-trash-alt"></i></button>
                                                @include('evaluation.receptions.delete')
                                            @endcan
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tfoot>
                    </table>
                    {{ $receptions->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection