@extends('layouts.app')
@section('title')
    <div class="row">
        <h1 class="m-0">Asignaciones</h1>
    </div>
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
                                <th>Sucursal</th>
                                <th>Asesor</th>
                                <th>Cliente</th>
                                <th>Ver</th>
                                <th>Obs</th>
                                <th>Apr</th>
                                <th>Rec</th>
                                <th>Des</th>
                                <th>Rev</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($assigns as $assign)
                            @php
                                $application = $assign->application;
                            @endphp
                                <tr>
                                    <td>{{ $application->id }}</td>
                                    <td>{{ $application->user->agency->name }}</td>
                                    <td>{{ $application->user->name }}</td>
                                    <td>
                                        @if ($application->debtor())
                                        {{ $application->debtor()->lastName }} {{ $application->debtor()->secondLastName }} {{ $application->debtor()->name }} {{ $application->debtor()->thirdLastName }}
                                        @endif
                                    </td>
                                    <td>
                                        <form action="{{ route('usrApplications.show', $application->id) }}" method="GET">
                                            <button class="btn btn-info btn-xs" type="submit"><i class="fas fa-eye"></i></button>
                                        </form>
                                    </td>
                                    <td>
                                        @if ($application->observeds->count()>0)
                                            <span class="badge bg-warning">obs</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if ($application->approved)
                                            <span class="badge bg-success">apr</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if ($application->rejected)
                                            <span class="badge bg-danger">rec</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if ($application->disbursement)
                                            <span class="badge bg-secondary">des</span>
                                        @endif
                                    </td>
                                    <td>
                                        <div class="btn-group">
                                            @can('observeds.store')
                                                @if (!$application->approved && !$application->rejected)
                                                    <button type="button" class="btn btn-warning btn-xs" data-toggle="modal" data-target="#observedCreate{{ $application->id }}"><i class="far fa-question-circle"></i></button>
                                                    @include('revision.observeds.create')
                                                @endif
                                            @endcan
                                            @can('approveds.store')
                                                @if (!$application->approved && !$application->rejected)
                                                    <button type="button" class="btn btn-success btn-xs" data-toggle="modal" data-target="#approvedCreate{{ $application->id }}"><i class="far fa-check-square"></i></button>
                                                    @include('revision.approveds.create')
                                                @endif
                                            @endcan
                                            @can('rejecteds.store')
                                                @if (!$application->approved && !$application->rejected)
                                                    <button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#rejectedCreate{{ $application->id }}"><i class="far fa-window-close"></i></button>
                                                    @include('revision.rejecteds.create')
                                                @endif
                                            @endcan
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tfoot>
                    </table>
                    {{ $assigns->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
