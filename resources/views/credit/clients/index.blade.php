@extends('layouts.app')
@section('title')
    <div class="row">
        <h1 class="m-0">Clientes</h1>
        @can('clients.store')
            <ol class="breadcrumb float-sm-right pl-1">
                <button type="button" class="btn btn-success btn-xs" data-toggle="modal" data-target="#clientCreate"><i class="fas fa-plus-circle"></i></button>
            </ol>
        @endcan
    </div>
    @include('credit.clients.create')
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
                                <th>Nombre</th>
                                <th>Opciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($clients as $client)
                                <tr>
                                    <td>{{ $client->id }}</td>
                                    <td>{{ $client->lastName }} {{ $client->secondLastName }} {{ $client->thirdLastName }} {{ $client->name }}</td>
                                    <td>
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-info btn-xs" data-toggle="modal" data-target="#clientShow{{ $client->id }}"><i class="fas fa-eye"></i></button>
                                            @include('credit.clients.show')
                                            @can('clients.update')
                                                <button type="button" class="btn btn-warning btn-xs" data-toggle="modal" data-target="#clientEdit{{ $client->id }}"><i class="fas fa-pen"></i></button>
                                                @include('credit.clients.edit')
                                            @endcan
                                            @can('clients.destroy')
                                                <button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#clientDelete{{ $client->id }}"><i class="fas fa-trash-alt"></i></button>
                                                @include('credit.clients.delete')
                                            @endcan
                                            <form action="{{ route('usrApplications.index') }}" method="GET">
                                                <button class="btn btn-success btn-xs" type="submit">Sol<i></i></button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tfoot>
                    </table>
                    {{ $clients->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
