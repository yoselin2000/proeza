@extends('layouts.app')
@section('title')
    <div class="row">
        <h1 class="m-0">Asignaciones</h1>
        @can('assignments.store')
            <ol class="breadcrumb float-sm-right pl-1">
                <button type="button" class="btn btn-success btn-xs" data-toggle="modal" data-target="#assignmentCreate"><i class="fas fa-plus-circle"></i></button>
            </ol>
            @include('asset.assignments.create')
        @endcan
    </div>
@endsection
@section('content')
    @include('option.confirmation')

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <table class="table table-bordered table-striped table-sm">
                            <thead>
                                <tr>
                                    <th>id</th>
                                    <th>Asignado</th>
                                    <th>Fecha</th>
                                    <th>Opc</th>
                                    <th>Imp</th>
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
                                                @if (!$assignment->returnComponent)
                                                    @can('returnComponents.store')
                                                        <button type="button" class="btn btn-warning btn-xs" data-toggle="modal" data-target="#returnComponentCreate{{ $assignment->id }}"><i class="fa fa-share"></i></button>
                                                        @include('asset.returnComponents.create')
                                                    @endcan
                                                @endif
                                            </div>
                                        </td>
                                        <td>
                                            <div class="btn-group">
                                                <form action="{{ route('prints.assignment', $assignment->id) }}" method="GET">
                                                    <button class="btn btn-info btn-xs" type="submit">Ent<i></i></button>
                                                </form>
                                            </div>
                                            <div class="btn-group">
                                                @if ($assignment->returnComponent)
                                                    <form action="{{ route('prints.returnComponent', $assignment->returnComponent->id) }}" method="GET">
                                                        <button class="btn btn-success btn-xs" type="submit">Dev<i></i></button>
                                                    </form>
                                                @endif
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
