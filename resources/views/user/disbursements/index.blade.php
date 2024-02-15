@extends('layouts.app')
@section('title')
    <div class="row">
        <h1 class="m-0">Desembolsos</h1>
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
                                <th>Des</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($approveds as $apprroved)
                            @php
                                $application = $apprroved->application;
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
                                        @can('disbursements.store')
                                            @if ($application->approved && !$application->disbursement)
                                                <button type="button" class="btn btn-secondary btn-xs" data-toggle="modal" data-target="#disbursementCreate{{ $application->id }}"><i class="fas fa-money-bill-wave"></i></button>
                                                @include('revision.disbursements.create')
                                            @endif
                                        @endcan
                                    </td>
                                </tr>
                            @endforeach
                        </tfoot>
                    </table>
                    {{ $approveds->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
