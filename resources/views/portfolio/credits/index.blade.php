@extends('layouts.app')
@section('title')
    <div class="row">
        <h1 class="m-0">Creditos</h1>
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
                                <th>Plan de Pagos</th>
                                <th>Opciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($credits as $credit)
                                <tr>
                                    <td>{{ $credit->id }}</td>
                                    <td>{{ $credit->application->user->agency->name }}</td>
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
                                        <form action="{{ route('credits.show', $credit->id) }}" method="GET">
                                            <button class="btn btn-info btn-xs" type="submit"><i class="fas fa-eye"></i></button>
                                        </form>
                                    </td>
                                    <td>
                                        <div class="btn-group">
                                            @can('credits.destroy')
                                                <button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#creditDelete{{ $credit->id }}"><i class="fas fa-trash-alt"></i></button>
                                                {{-- @include('portfolio.credits.delete') --}}
                                            @endcan
                                        </div>
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
