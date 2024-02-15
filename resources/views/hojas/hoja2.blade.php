@extends('layouts.app')
@section('title')
    <div class="row">
        <h5 class="m-0">Solicitud  {{ $evaluation->participant->client->id }} -
            Cliente {{ $evaluation->participant->client->lastName }} {{ $evaluation->participant->client->secondLastName }} {{ $evaluation->participant->client->name }} {{ $evaluation->participant->client->thirdLastName }} -
            Evaluacion {{ $evaluation->id }}
        </h5>
    </div>
@endsection
@section('content')
    @include('option.confirmation')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    Activos
                    @can('evalationsFamily.store')
                        <button type="button" class="btn btn-success btn-xs" data-toggle="modal" data-target="#evaluationAssetCreate"><i class="fas fa-plus-circle"></i></button>
                        @include('evaluation.evaluationAssets.create')
                    @endcan
                </div>
                <div class="card-body p-0 table-responsive">
                    <table class="table table-bordered table-striped table-sm">
                        <thead>
                            <tr>
                                <th>Tipo de Bien</th>
                                <th>Descripcion/Ubicacion</th>
                                <th>Registro, Placa, Otros</th>
                                <th>Valor</th>
                                @can('evalationsFamily.update','evalationsFamily.destroy')
                                    <th>
                                        Opc
                                    </th>
                                @endcan
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($evaluation->evaluationAssets as $evaluationAsset)
                                <tr>
                                    <td>{{ $evaluationAsset->type }}</td>
                                    <td>{{ $evaluationAsset->description }}</td>
                                    <td>{{ $evaluationAsset->complement }}</td>
                                    <td>{{ number_format($evaluationAsset->value, 2, '.', ',') }}</td>
                                    @can('evalationsFamily.update','evalationsFamily.destroy')
                                        <td>
                                            <div class="btn-group">
                                                @can('evalationsFamily.update')
                                                    <button type="button" class="btn btn-warning btn-xs" data-toggle="modal" data-target="#evaluationAssetEdit{{ $evaluationAsset->id }}"><i class="fas fa-pen"></i></button>
                                                    @include('evaluation.evaluationAssets.edit')
                                                @endcan
                                                @can('evalationsFamily.destroy')
                                                    <button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#evaluationAssetDelete{{ $evaluationAsset->id }}"><i class="fas fa-trash-alt"></i></button>
                                                    @include('evaluation.evaluationAssets.delete')
                                                @endcan
                                            </div>
                                        </td>
                                    @endcan
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th colspan="3">Total</th>
                                <th>{{ number_format($evaluation->evaluationAssets->sum('value'), 2, '.', ',') }}</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    Pasivos
                    @can('evalationsFamily.store')
                        <button type="button" class="btn btn-success btn-xs" data-toggle="modal" data-target="#evaluationPassiveCreate"><i class="fas fa-plus-circle"></i></button>
                        @include('evaluation.evaluationPassives.create')
                    @endcan
                </div>
                <div class="card-body p-0 table-responsive">
                    <table class="table table-bordered table-striped table-sm">
                        <thead>
                            <tr>
                                <th>Tipo de pasivo</th>
                                <th>Cuota Mensual</th>
                                <th>Saldo Deudor</th>
                                <th>Fecha de Vencimiento</th>
                                @can('evalationsFamily.update','evalationsFamily.destroy')
                                    <th>
                                        Opc
                                    </th>
                                @endcan
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($evaluation->evaluationPassives as $evaluationPassive)
                                <tr>
                                    <td>{{ $evaluationPassive->passiveType->name }}</td>
                                    <td>{{  number_format($evaluationPassive->share, 2, '.', ',') }}</td>
                                    <td>{{  number_format($evaluationPassive->balace, 2, '.', ',') }}</td>
                                    <td>{{ $evaluationPassive->coming }}</td>
                                    @can('evalationsFamily.update','evalationsFamily.destroy')
                                        <td>
                                            <div class="btn-group">
                                                @can('evalationsFamily.update')
                                                    <button type="button" class="btn btn-warning btn-xs" data-toggle="modal" data-target="#evaluationPassiveEdit{{ $evaluationPassive->id }}"><i class="fas fa-pen"></i></button>
                                                    @include('evaluation.evaluationPassives.edit')
                                                @endcan
                                                @can('evalationsFamily.destroy')
                                                    <button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#evaluationPassiveDelete{{ $evaluationPassive->id }}"><i class="fas fa-trash-alt"></i></button>
                                                    @include('evaluation.evaluationPassives.delete')
                                                @endcan
                                            </div>
                                        </td>
                                    @endcan
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Total</th>
                                <th>{{ number_format($evaluation->evaluationPassives->sum('share'), 2, '.', ',') }}</th>
                                <th>{{ number_format($evaluation->evaluationPassives->sum('balace'), 2, '.', ',') }}</th>
                                <th></th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
