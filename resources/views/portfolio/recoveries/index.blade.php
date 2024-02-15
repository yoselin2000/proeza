@extends('layouts.app')
@section('title')
    <div class="row">
        <h1 class="m-0">Recuperaciones</h1>
        @can('recoveries.store')
            <ol class="breadcrumb float-sm-right pl-1">
                <button type="button" class="btn btn-success btn-xs" data-toggle="modal" data-target="#recoveryCreate"><i class="fas fa-plus-circle"></i></button>
            </ol>
            @include('portfolio.recoveries.create')
        @endcan
    </div>
@endsection
@section('browser')
    <li class="breadcrumb-item"><a href="{{ route('home') }}">inicio</a></li>
    <li class="breadcrumb-item">creditos</li>
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
                                <th>Cliente</th>
                                <th>Asesor</th>
                                <th>Revisor</th>
                                <th>Cobrar</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($recoveries as $recovery)
                                <tr>
                                    <td>{{ $recovery->id }}</td>
                                    <td>{{ $recovery->credit->application->user->agency->name }}</td>
                                    <td>
                                        @if ($recovery->credit->application->debtor())
                                        {{ $recovery->credit->application->debtor()->lastName }} {{ $recovery->credit->application->debtor()->secondLastName }} {{ $recovery->credit->application->debtor()->name }} {{ $recovery->credit->application->debtor()->thirdLastName }}
                                        @endif
                                    </td>
                                    <td>{{ $recovery->credit->application->user->name }}</td>
                                    <td> 
                                        @if ($recovery->credit->application->assign)
                                            {{ $recovery->credit->application->assign->user->name }}
                                        @endif
                                    </td>
                                    <td>
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-info btn-xs" data-toggle="modal" data-target="#recoveryShow{{ $recovery->id }}"><i class="fas fa-eye"></i></button>
                                            @include('portfolio.recoveries.show')
                                            @can('recoveries.destroy')
                                                <button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#recoveryDelete{{ $recovery->id }}"><i class="fas fa-trash-alt"></i></button>
                                                @include('portfolio.recoveries.delete')
                                            @endcan
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tfoot>
                    </table>
                    {{ $recoveries->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
