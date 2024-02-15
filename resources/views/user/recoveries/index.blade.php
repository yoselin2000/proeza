@extends('layouts.app')
@section('title')
    <div class="row">
        <h1 class="m-0">Creditos</h1>
    </div>
@endsection
@section('content')
    @include('option.confirmation')
    <div class="row justify-content-md-center p-2">
        <div class="col-6">
            <form action="{{ route('usrRecoveries.index') }}" method="GET">
                <div class="row">
                    <div class="col-2">
                        <input type="text" class="form-control form-control-border" placeholder="ID" name="id">
                    </div>
                    <div class="col-4">
                        <input type="text" class="form-control form-control-border" placeholder="CI" name="ci">
                    </div>
                    <div class="col-4">
                        <input type="text" class="form-control form-control-border" placeholder="Nombre, Apellido" name="name">
                    </div>
                    <div class="col-2">
                        <button type="submit" class="btn btn-primary">Buscar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body p-0 table-responsive">
                    <table class="table table-bordered table-striped table-sm">
                        <thead>
                            <tr>
                                <th>id</th>
                                <th>Sucursal</th>
                                <th>CI</th>
                                <th>Cliente</th>
                                <th>Asesor</th>
                                <th>Revisor</th>
                                <th>Cobrar</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($credits as $credit)
                                <tr>
                                    <td>{{ $credit->id }}</td>
                                    <td>{{ $credit->application->user->agency->name }}</td>
                                    <td>
                                        @if ($credit->application->debtor())
                                        {{ $credit->application->debtor()->number }}
                                        @endif
                                    </td>
                                    <td>
                                        @if ($credit->application->debtor())
                                        {{ $credit->application->debtor()->lastName }} {{ $credit->application->debtor()->secondLastName }} {{ $credit->application->debtor()->name }} {{ $credit->application->debtor()->thirdLastName }}
                                        @endif
                                    </td>
                                    <td>{{ $credit->application->user->name }}</td>
                                    <td>
                                        @if ($credit->application->assign)
                                            {{ $credit->application->assign->user->name }}
                                        @endif
                                    </td>
                                    <td>
                                        <form action="{{ route('usrRecoveries.show', $credit->id) }}" method="GET">
                                            <button class="btn btn-secondary btn-xs" type="submit"><i class="fas fa-money-bill"></i></button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tfoot>
                    </table>
                    {{ $credits->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
