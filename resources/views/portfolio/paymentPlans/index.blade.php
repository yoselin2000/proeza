@extends('layouts.app')
@section('title')
    <div class="row">
        <h1 class="m-0">Cuotas</h1>
    </div>
@endsection
@section('browser')
    <li class="breadcrumb-item"><a href="{{ route('home') }}">inicio</a></li>
    <li class="breadcrumb-item">Cuotas</li>
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
                                <th>cuota</th>
                                <th>interes</th>
                                <th>capital</th>
                                <th>saldo</th>
                                <th>fecha</th>
                                <th>estado</th>
                                <th>Opciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($paymentPlans as $paymentPlan)
                                <tr>
                                    <td>{{ $paymentPlan->credit->id }}</td>
                                    <td>{{ $paymentPlan->credit->application->user->agency->name }}</td>
                                    <td>{{ $paymentPlan->credit->application->debtor()->lastName }} {{ $paymentPlan->credit->application->debtor()->secondLastName }} {{ $paymentPlan->credit->application->debtor()->name }} {{ $paymentPlan->credit->application->debtor()->thirdLastName }}</td>
                                    <td>{{ $paymentPlan->credit->application->user->name }}</td>
                                    <td>{{ $paymentPlan->cuota }}</td>
                                    <td>{{ $paymentPlan->interes }}</td>
                                    <td>{{ $paymentPlan->capital }}</td>
                                    <td>{{ $paymentPlan->saldo }}</td>
                                    <td>{{ $paymentPlan->fecha }}</td>
                                    <td>{{ $paymentPlan->estado }}</td>
                                    <td>
                                        <div class="btn-group">
                                            @can('paymentPlans.update')
                                                <button type="button" class="btn btn-warning btn-xs" data-toggle="modal" data-target="#paymentPlanEdit{{ $paymentPlan->id }}"><i class="fas fa-pen"></i></button>
                                                @include('portfolio.paymentPlans.edit')
                                            @endcan
                                            @can('paymentPlans.destroy')
                                                <button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#paymentPlanDelete{{ $paymentPlan->id }}"><i class="fas fa-trash-alt"></i></button>
                                                @include('portfolio.paymentPlans.delete')
                                            @endcan
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tfoot>
                    </table>
                    {{ $paymentPlans->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
