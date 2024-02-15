<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">
</head>
<body>
    <div class="row justify-content-center pb-3">
        <h1>DECLARACIÓN PATRIMONIAL</h1>
    </div>
    <div class="row justify-content-center m-0">
        <div class="col-2">
            <div class="row justify-content-center m-0">
                <img class="" src="{{ asset('dist/img/proeza.jpg') }}"  width="120">
            </div>
        </div>
        <div class="col-3">
            <dl class="row">
                <dt class="col-5">Ciudad:</dt>
                <dd class="col-7">
                    {{ $application->user->agency->city->name  }}
                </dd>
                <dt class="col-5">Sucursal:</dt>
                <dd class="col-7">
                    {{ $application->user->agency->name }}
                </dd>
                <dt class="col-5">Responsable:</dt>
                <dd class="col-7">
                    {{ $application->user->name }}
                </dd>
            </dl>
        </div>
        <div class="col-2">
            <dl class="row">
                <dt class="col-5">Fecha:</dt>
                <dd class="col-7">
                    {{ date('Y-m-d') ?? ' '}}
                </dd>
            </dl>
        </div>
    </div>

    @if ($participant->evaluation && $participant->evaluation->evaluationAssets && $participant->evaluation->evaluationAssets->isNotEmpty())
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h6><strong>ACTIVOS</strong></h6>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <table class="table table-light">
                                <thead class="thead-light">
                                    <tr>
                                        <th>Tipo de Activo</th>
                                        <th>Descripción</th>
                                        <th>Registro, Placa, Otros</th>
                                        <th>Valor Bs</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($participant->evaluation->evaluationAssets as $evaluationAsset)
                                        <tr>
                                            <td>{{ $evaluationAsset->assetType->name }}</td>
                                            <td>{{ $evaluationAsset->description }}</td>
                                            <td>{{ $evaluationAsset->complement }}</td>
                                            <td>{{ $evaluationAsset->value }}</td>
                                        </tr>
                                    @endforeach
                                    <tr>
                                        <td colspan="3"><strong>Total Activos</strong></td>
                                        <td><strong>{{ $participant->evaluation->evaluationAssets->sum('value') }}</strong></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
    @if ($participant->evaluation && $participant->evaluation->evaluationPassives && $participant->evaluation->evaluationPassives->isNotEmpty())
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h6><strong>PASIVOS</strong></h6>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <table class="table table-light">
                                <thead class="thead-light">
                                    <tr>
                                        <th>Tipo de Pasivo</th>
                                        <th>Cuota Mensual</th>
                                        <th>Saldo Deudor</th>
                                        <th>Fecha de Vencimiento</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($participant->evaluation->evaluationPassives as $evaluationPassive)
                                        <tr>
                                            <td>{{ $evaluationPassive->passiveType->name }}</td>
                                            <td>{{ $evaluationPassive->share }}</td>
                                            <td>{{ $evaluationPassive->balace }}</td>
                                            <td>{{ $evaluationPassive->coming }}</td>
                                        </tr>
                                    @endforeach
                                    <tr>
                                        <td colspan="1"><strong>Total Pasivos</strong></td>
                                        <td><strong>{{ $participant->evaluation->evaluationPassives->sum('share') }}</strong></td>
                                        <td><strong>{{ $participant->evaluation->evaluationPassives->sum('balace') }}</strong></td>
                                        <td colspan="2"></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
</body>
</html>
