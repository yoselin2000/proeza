@extends('layouts.app')
@section('title')
    <div class="row">
        <h1 class="m-0">Destino</h1>
        @can('destinations.store')
            <ol class="breadcrumb float-sm-right pl-1">
                <button type="button" class="btn btn-success btn-xs" data-toggle="modal" data-target="#destinationCreate"><i class="fas fa-plus-circle"></i></button>
            </ol>
        @endcan
    </div>
    @include('admin.destinations.create')
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
                            @foreach ($destinations as $destination)
                                <tr>
                                    <td>{{ $destination->id }}</td>
                                    <td>{{ $destination->name }}</td>
                                    <td>
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-info btn-xs" data-toggle="modal" data-target="#destinationShow{{ $destination->id }}"><i class="fas fa-eye"></i></button>
                                            @include('admin.destinations.show')
                                            @can('destinations.update')
                                                <button type="button" class="btn btn-warning btn-xs" data-toggle="modal" data-target="#destinationEdit{{ $destination->id }}"><i class="fas fa-pen"></i></button>
                                                @include('admin.destinations.edit')
                                            @endcan
                                            @can('destinations.destroy')
                                                <button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#destinationDelete{{ $destination->id }}"><i class="fas fa-trash-alt"></i></button>
                                                @include('admin.destinations.delete')
                                            @endcan
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tfoot>
                    </table>
                    {{ $destinations->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
