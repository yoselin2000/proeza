@extends('layouts.app')
@section('title')
    <div class="row">
        <h1 class="m-0">Transporte</h1>
        @can('activities.store')
            <ol class="breadcrumb float-sm-right pl-1">
                <button type="button" class="btn btn-success btn-xs" data-toggle="modal" data-target="#transportCreate"><i class="fas fa-plus-circle"></i></button>
            </ol>
        @endcan
    </div>
    @include('activity.transports.create')
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
                                <th>Estado</th>
                                <th>Opciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($transports as $transport)
                                <tr>
                                    <td>{{ $transport->id }}</td>
                                    <td>{{ $transport->type }}</td>
                                    <td>
                                        <div class="btn-group">
                                            @can('activities.update')
                                                <button type="button" class="btn btn-warning btn-xs" data-toggle="modal" data-target="#transportEdit{{ $transport->id }}"><i class="fas fa-pen"></i></button>
                                                @include('activity.transports.edit')
                                            @endcan
                                            @can('activities.destroy')
                                                <button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#transportDelete{{ $transport->id }}"><i class="fas fa-trash-alt"></i></button>
                                                @include('activity.transports.delete')
                                            @endcan
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tfoot>
                    </table>
                    {{ $transports->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
