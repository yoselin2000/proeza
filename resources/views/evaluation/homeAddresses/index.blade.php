@extends('layouts.app')
@section('title')
    <div class="row">
        <h1 class="m-0">Direcion de Domicilio</h1>
        @can('evalationsFamily.store')
            <ol class="breadcrumb float-sm-right pl-1">
                <button type="button" class="btn btn-success btn-xs" data-toggle="modal" data-target="#homeAddressCreate"><i class="fas fa-plus-circle"></i></button>
            </ol>
        @endcan
    </div>
    @include('evaluation.homeAddresses.create')
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
                                <th>Direción</th>
                                <th>Opciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($homeAddresses as $homeAddress)
                                <tr>
                                    <td>{{ $homeAddress->id }}</td>
                                    <td>{{ $homeAddress->evaluation->participant->client->lastName }} {{ $homeAddress->evaluation->participant->client->secondLastName }} {{ $homeAddress->evaluation->participant->client->name }}  {{ $homeAddress->evaluation->participant->client->thirdLastName }}</td>
                                    <td>{{ $homeAddress->direction }}</td>
                                    <td>
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-info btn-xs" data-toggle="modal" data-target="#homeAddressShow{{ $homeAddress->id }}"><i class="fas fa-eye"></i></button>
                                            @include('evaluation.homeAddresses.show')
                                            @can('evalationsFamily.update')
                                                <button type="button" class="btn btn-warning btn-xs" data-toggle="modal" data-target="#homeAddressEdit{{ $homeAddress->id }}"><i class="fas fa-pen"></i></button>
                                                @include('evaluation.homeAddresses.edit')
                                            @endcan
                                            @can('evalationsFamily.destroy')
                                                <button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#homeAddressDelete{{ $homeAddress->id }}"><i class="fas fa-trash-alt"></i></button>
                                                @include('evaluation.homeAddresses.delete')
                                            @endcan
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tfoot>
                    </table>
                    {{ $homeAddresses->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
