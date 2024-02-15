@extends('layouts.app')
@section('title')
    <div class="row">
        <h1 class="m-0">Solicitud</h1>
        @can('applications.store')
            <ol class="breadcrumb float-sm-right pl-1">
                <button type="button" class="btn btn-success btn-xs" data-toggle="modal" data-target="#applicationCreate"><i class="fas fa-plus-circle"></i></button>
            </ol>
            @include('credit.applications.create')
        @endcan
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
                                <th>Revisor</th>
                                <th>Cliente</th>
                                <th>Ver</th>
                                <th>Env</th>
                                <th>Obs</th>
                                <th>Apr</th>
                                <th>Rec</th>
                                <th>Des</th>
                                <th>Opciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($applications as $application)
                                <tr>
                                    <td>{{ $application->id }}</td>
                                    <td>{{ $application->user->agency->name }}</td>
                                    <td>{{ $application->user->name }}</td>
                                    <td>
                                        @if ($application->assign)
                                            {{ $application->assign->user->name }}
                                        @endif
                                    </td>
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
                                        @if (!$application->assign)
                                            <form action="{{ route('usrAssigns.store', $application->id) }}" method="GET">
                                                <button class="btn btn-info btn-xs" type="submit"><i class="fas fa-paper-plane"></i></button>
                                            </form>
                                        @endif
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
                                        @if (!$application->approved && !$application->rejected)
                                            <div class="btn-group" role="group" aria-label="Button group">
                                                @can('applications.update')
                                                    <button type="button" class="btn btn-warning btn-xs" data-toggle="modal" data-target="#applicationEdit{{ $application->id }}"><i class="fas fa-pen"></i></button>
                                                    @include('credit.applications.edit')
                                                @endcan
                                                @can('applications.destroy')
                                                    <button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#applicationDelete{{ $application->id }}"><i class="fas fa-trash-alt"></i></button>
                                                    @include('credit.applications.delete')
                                                @endcan
                                            </div>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tfoot>
                    </table>
                    {{ $applications->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
