@extends('layouts.app')
@section('title')
    <div class="row">
        <h1 class="m-0">Creditos</h1>
        {{-- @if ($credit->estado == 'activo')
            @can('recoveries.store')
                <ol class="breadcrumb float-sm-right pl-1">
                    <button type="button" class="btn btn-success btn-xs" data-toggle="modal" data-target="#recoveryCreate"><i class="fas fa-plus-circle"></i></button>
                </ol>
            @endcan
            @if ($credit->estado == 'activo')
                @include('portfolio.recoveries.create')
            @endif
        @endif --}}
    </div>
@endsection
@section('browser')
    <li class="breadcrumb-item"><a href="{{ route('home') }}">inicio</a></li>
    <li class="breadcrumb-item">creditos</li>
@endsection
@section('content')
    @include('option.confirmation')
    <div class="row">
        <div class="col">
            <dl class="row">
                <dt class="col-sm-4">Participante</dt>
                <dd class="col-sm-8">
                    {{ $credit->application->debtor()->lastName }} {{ $credit->application->debtor()->secondLastName }} {{ $credit->application->debtor()->name }} {{ $credit->application->debtor()->thirdLastName }}
                </dd>
                <dt class="col-sm-4">Monto</dt>
                <dd class="col-sm-8">
                    {{ $credit->monto }}
                </dd>
                <dt class="col-sm-4">Interes</dt>
                <dd class="col-sm-8">
                    {{ $credit->interes }}
                </dd>
                <dt class="col-sm-4">Plazo</dt>
                <dd class="col-sm-8">
                    {{ $credit->plazo }}
                </dd>
            </dl>
        </div>
        <div class="col">
            <dl class="row">
                <dt class="col-sm-4">Inicio</dt>
                <dd class="col-sm-8">
                    {{ $credit->inicio }}
                </dd>
                <dt class="col-sm-4">Tipo</dt>
                <dd class="col-sm-8">
                    {{ $credit->tipo }}
                </dd>
                <dt class="col-sm-4">Estado</dt>
                <dd class="col-sm-8">
                    {{ $credit->estado }}
                </dd>
            </dl>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <table class="table table-light">
                    <thead class="thead-light">
                        <tr>
                            <th>#</th>
                            <th>fecha</th>
                            <th>dia</th>
                            <th>saldoIni</th>
                            <th>capital</th>
                            <th>interes</th>
                            <th>cuota</th>
                            <th>seguro</th>
                            <th>cuotaTotal</th>
                            <th>saldoFin</th>
                            <th>estado</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($credit->paymentPlans as $paymentPlan)
                            <tr>
                                <td>{{ $paymentPlan->numero }}</td>
                                <td>{{ $paymentPlan->fecha }}</td>
                                <td>{{ $paymentPlan->dia }}</td>
                                <td>{{ $paymentPlan->saldoIni }}</td>
                                <td>{{ $paymentPlan->capital }}</td>
                                <td>{{ $paymentPlan->interes }}</td>
                                <td>{{ $paymentPlan->cuota }}</td>
                                <td>{{ $paymentPlan->seguro }}</td>
                                <td>{{ $paymentPlan->cuotaTotal }}</td>
                                <td>{{ $paymentPlan->saldoFin }}</td>
                                <td>{{ $paymentPlan->estado }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th>{{ $credit->paymentPlans->sum('capital') }}</th>
                            <th>{{ $credit->paymentPlans->sum('interes') }}</th>
                            <th>{{ $credit->paymentPlans->sum('cuota') }}</th>
                            <th>{{ $credit->paymentPlans->sum('seguro') }}</th>
                            <th>{{ $credit->paymentPlans->sum('cuotaTotal') }}</th>
                            <th></th>
                            <th></th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
@endsection
@section('script')
<script>
    function calcularSuma() {
        var input1 = parseFloat(document.getElementById("cuota").value);
        var input2 = parseFloat(document.getElementById("mora").value);

        var suma = input1 + input2;

        document.getElementById("total").value = suma;
    }
</script>
@endsection
