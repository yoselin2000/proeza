@extends('layouts.app')
@section('title')
    <div class="row">
        <h1 class="m-0">Asignaciones</h1>
        @can('assigns.store')
            <ol class="breadcrumb float-sm-right pl-1">
                <button type="button" class="btn btn-success btn-xs" data-toggle="modal" data-target="#assignCreate"><i class="fas fa-plus-circle"></i></button>
            </ol>
        @endcan
    </div>
    @include('revision.assigns.create')
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
                                <th>Carpeta</th>
                                <th>Cliente</th>
                                @can('assigns.update', 'assigns.destroy')
                                <th>Opciones</th>
                                @endcan
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($assigns as $assign)
                                <tr>
                                    <td>{{ $assign->application->id }}</td>
                                    <td>
                                        @if ($assign->application->debtor())
                                            {{ $assign->application->debtor()->lastName }} {{ $assign->application->debtor()->secondLastName }} {{ $assign->application->debtor()->name }} {{ $assign->application->debtor()->thirdLastName }}
                                        @else
                                            Solicitud sin Deudor
                                        @endif
                                    <td>
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-info btn-xs" data-toggle="modal" data-target="#assignShow{{ $assign->id }}"><i class="fas fa-eye"></i></button>
                                            @include('revision.assigns.show')
                                            @can('assigns.update')
                                                <button type="button" class="btn btn-warning btn-xs" data-toggle="modal" data-target="#assignEdit{{ $assign->id }}"><i class="fas fa-pen"></i></button>
                                                @include('revision.assigns.edit')
                                            @endcan
                                            @can('assigns.destroy')
                                                <button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#assignDelete{{ $assign->id }}"><i class="fas fa-trash-alt"></i></button>
                                                @include('revision.assigns.delete')
                                            @endcan
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tfoot>
                    </table>
                    {!! $assigns->links() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
