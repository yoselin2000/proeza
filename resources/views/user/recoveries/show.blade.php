@extends('layouts.app')
@section('title')
    <div class="row">
        <h1 class="m-0">Cobro de Prestamos</h1>
    </div>
@endsection
@section('browser')
    <li class="breadcrumb-item"><a href="{{ route('home') }}">inicio</a></li>
    <li class="breadcrumb-item">creditos</li>
@endsection
@section('content')
    @include('option.confirmation')
    <div class="row">
        <div class="col-6">
            <div class="card">
                <div class="card-header">
                    <h2 class="card-title">
                        {{ $client->lastName }} {{ $client->secondLastName }} {{ $client->name }} {{ $client->thirdLastName }}
                    </h2>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <dl class="row">
                        <dt class="col-sm-5 text-right">Ultimo pago</dt>
                        <dd class="col-sm-7 text-left">{{ $ultimoPago }}</dd>
                        <dt class="col-sm-5 text-right">Hoy</dt>
                        <dd class="col-sm-7 text-left">{{ $hoy }}</dd>
                        <dt class="col-sm-5 text-right">fecha de cuota</dt>
                        <dd class="col-sm-7 text-left">{{ $fechaCuota }}</dd>

                        <dt class="col-sm-5 text-right">Cliente</dt>
                        <dd class="col-sm-7 text-left">{{ $client->lastName }} {{ $client->secondLastName }} {{ $client->name }} {{ $client->thirdLastName }}</dd>
                        <dt class="col-sm-5 text-right">Capital</dt>
                        <dd class="col-sm-7 text-left">{{ $capital }}</dd>
                        <dt class="col-sm-5 text-right">Interes Corriente</dt>
                        <dd class="col-sm-7 text-left">{{ $interes }}</dd>
                        <dt class="col-sm-5 text-right">Interes Vencido</dt>
                        <dd class="col-sm-7 text-left">{{ $intVencido }}</dd>
                        <dt class="col-sm-5 text-right">Interes Penal</dt>
                        <dd class="col-sm-7 text-left">{{ $intPenal }}</dd>
                        <dt class="col-sm-5 text-right">Interes Diferido</dt>
                        <dd class="col-sm-7 text-left">{{ $intDiferido }}</dd>
                        <dt class="col-sm-5 text-right">Seguro</dt>
                        <dd class="col-sm-7 text-left">{{ $seguro }}</dd>
                        <dt class="col-sm-5 text-right">Total</dt>
                        <dd class="col-sm-7 text-left">{{ $total }}</dd>
                        <dt class="col-sm-5 text-right">Cuota</dt>
                        <dd class="col-sm-7 text-left">{{ $cuota }}</dd>
                    </dl>
                </div>
                <!-- /.card-body -->
            </div>
        </div>
        <div class="col-6">
            <div class="card">
                <div class="card-header">
                    <h2 class="card-title">
                        Registrar Cobro
                    </h2>
                </div>
                <form action="{{ route('usrRecoveries.store') }}" method="POST">
                    {{ csrf_field() }}
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Cuota</label>
                                    <div class="select2-primary">
                                        <select class="select2 form-control form-control-border" data-placeholder="Select a State" data-dropdown-css-class="select2-primary" style="width: 100%;" name="credit_id" required>
                                            <option value="{{ $credit->id }}">{{ $client->lastName }} {{ $client->secondLastName }} {{ $client->name }} {{ $client->thirdLastName }}</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="cuota">Monto</label>
                                    <input id="cuota" class="form-control form-control-border" type="number" name="amount" step="0.01" required>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-primary">Guardar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    Recuperaciones
                </div>
                <div class="card-body p-0 table-responsive">
                    <table class="table table-bordered table-striped table-sm">
                        <thead>
                            <tr>
                                <th>fecha</th>
                                <th>saldoIni</th>
                                <th>capital</th>
                                <th>interes</th>
                                <th>vencido</th>
                                <th>penal</th>
                                <th>diferido</th>
                                <th>seguro</th>
                                <th>cuotaTotal</th>
                                <th>saldoFin</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($recoveries as $recovery)
                                <tr>
                                    <td>{{ $recovery->fecha }}</td>
                                    <td>{{ $recovery->saldoIni }}</td>
                                    <td>{{ $recovery->capital }}</td>
                                    <td>{{ $recovery->interes }}</td>
                                    <td>{{ $recovery->vencido }}</td>
                                    <td>{{ $recovery->penal }}</td>
                                    <td>{{ $recovery->diferido }}</td>
                                    <td>{{ $recovery->seguro }}</td>
                                    <td>{{ $recovery->cuotaTotal }}</td>
                                    <td>{{ $recovery->saldoFin }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th></th>
                                <th></th>
                                <th>{{ $recoveries->sum('capital') }}</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
