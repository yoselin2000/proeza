@extends('layouts.app')
@section('title')
    <div class="row">
        <h1 class="m-0">Asignaciones</h1>
        @can('assignments.store')
            <ol class="breadcrumb float-sm-right pl-1">
                <button type="button" class="btn btn-success btn-xs" data-toggle="modal" data-target="#assignmentCreate"><i class="fas fa-plus-circle"></i></button>
            </ol>
        @endcan
    </div>
    @include('asset.assignments.create')
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
                                <th>Asignado</th>
                                <th>Fecha</th>
                                <th>Opciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($assignments as $assignment)
                                <tr>
                                    <td>{{ $assignment->id }}</td>
                                    <td>{{ $assignment->assignedToUser->name }}</td>
                                    <td>{{ $assignment->date }}</td>
                                    <td>
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-info btn-xs" data-toggle="modal" data-target="#assignmentShow{{ $assignment->id }}"><i class="fas fa-eye"></i></button>
                                            @include('asset.assignments.show')
                                            @can('assignments.update')
                                                <button type="button" class="btn btn-warning btn-xs" data-toggle="modal" data-target="#assignmentEdit{{ $assignment->id }}"><i class="fas fa-pen"></i></button>
                                                @include('asset.assignments.edit')
                                            @endcan
                                            @can('assignments.destroy')
                                                <button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#assignmentDelete{{ $assignment->id }}"><i class="fas fa-trash-alt"></i></button>
                                                @include('asset.assignments.delete')
                                            @endcan
                                            <form action="{{ route('prints.assignment', $assignment->id) }}" method="GET">
                                                <button class="btn btn-info btn-xs" type="submit"><i class="fa fa-print" aria-hidden="true"></i></button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tfoot>
                    </table>
                    {{ $assignments->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
