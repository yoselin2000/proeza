<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Activity</title>

    <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">
</head>
<body>
    <div class="row justify-content-center pb-3">
        <h1>ACTIVIDAD ECONÓMICA</h1>
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
                    {{ $activity->evaluation->participant->application->user->agency->city->name  }}
                </dd>
                <dt class="col-5">Sucursal:</dt>
                <dd class="col-7">
                    {{ $activity->evaluation->participant->application->user->agency->name }}
                </dd>
                <dt class="col-5">Responsable:</dt>
                <dd class="col-7">
                    {{ $activity->evaluation->participant->application->user->name }}
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

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    Actividad Economica
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-4">
                            <dl class="row">
                                <dt class="col-6">Actividad Economica</dt>
                                <dd class="col-6">{{ $activity->form }}</dd>
                                <dt class="col-6">Caedec</dt>
                                <dd class="col-6">{{ $activity->caedec->code }}.- {{ $activity->caedec->heading }}.- {{ $activity->caedec->description }}</dd>
                                <dt class="col-6">Actividad Especifica</dt>
                                <dd class="col-6">{{ $activity->specific }}</dd>
                            </dl>
                        </div>
                        <div class="col-4">
                            <dl class="row">
                                <dt class="col-6">Profesion/Ocupacion</dt>
                                <dd class="col-6">{{ $activity->profession }}</dd>
                                <dt class="col-6">Realizada por</dt>
                                <dd class="col-6">{{ $activity->responsable }}</dd>
                                <dt class="col-6">Experiencia en el Rubro (meses)</dt>
                                <dd class="col-6">{{ $activity->experience }}</dd>
                            </dl>
                        </div>
                        <div class="col-4">
                            <dl class="row">
                                <dt class="col-6">Antiguedad del Negocio (meses)</dt>
                                <dd class="col-6">{{ $activity->antiquity }}</dd>
                                <dt class="col-6">Propiedad del puesto y/o Lugar</dt>
                                <dd class="col-6">{{ $activity->property }}</dd>
                            </dl>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @if ($activity->complements->isNotEmpty())
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        Informacion
                    </div>
                    <div class="card-body">
                            <div class="row">
                                @foreach ($activity->complements as $complement)
                                    <div class="col">
                                        <div class="card">
                                            <div class="card-header">
                                                Informacion sobre {{ $complement->complementType->name }}
                                            </div>
                                            <div class="card-body">
                                                <p>{{ $complement->description }}</p>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                    </div>
                </div>
            </div>
        </div>
    @endif

    @if ($activity->businessCurrentAssets->isNotEmpty())
        <div class="col">
            <div class="card">
                <div class="card-header">
                    Activos Corrientes
                </div>
                <div class="card-body p-0 table-responsive">
                    <table class="table table-bordered table-striped table-sm">
                        <thead>
                            <tr>
                                <th>Nombre</th>
                                <th>Valor</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($activity->businessCurrentAssets as $businessCurrentAsset)
                                <tr>
                                    <td>{{ $businessCurrentAsset->assetType->name }}</td>
                                    <td>{{ number_format($businessCurrentAsset->amount, 2, '.', ',') }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Total</th>
                                <th>{{ number_format($activity->businessCurrentAssets->sum('amount'), 2, '.', ',') }}</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    @endif

    <div class="row">
        @if ($activity->businessFixedAssets->isNotEmpty())
        <div class="col">
            <div class="card">
                <div class="card-header">
                    Activos Fijos
                </div>
                <div class="card-body p-0 table-responsive">
                    <table class="table table-bordered table-striped table-sm">
                        <thead>
                            <tr>
                                <th>Tipo de Bien</th>
                                <th>Año/Compra</th>
                                <th>Valor Actual</th>
                            </tr>
                        </thead>
                        @foreach ($activity->businessFixedAssets as $businessFixedAsset)
                            <tbody>
                                <tr>
                                    <td>{{ $businessFixedAsset->assetType->name  }}</td>
                                    <td>{{ $businessFixedAsset->year }}</td>
                                    <td>{{ number_format($businessFixedAsset->amount, 2, '.', ',') }}</td>
                                </tr>
                            </tbody>
                        @endforeach
                        <tfoot>
                            <tr>
                                <th colspan="2">Total activos</th>
                                <th>{{ number_format($activity->businessFixedAssets->sum('amount'), 2, '.', ',') }}</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
        @endif
        @if ($activity->businessExpenses->isNotEmpty())
        <div class="col">
            <div class="card">
                <div class="card-header">
                    Gastos Operativos
                </div>
                <div class="card-body p-0 table-responsive">
                    <table class="table table-bordered table-striped table-sm">
                        <thead>
                            <tr>
                                <th>Item</th>
                                <th>valor</th>
                            </tr>
                        </thead>
                        @foreach ($activity->businessExpenses as $businessExpense)
                            <tbody>
                                <tr>
                                    <td>{{ $businessExpense->expenseType->name }}</td>
                                    <td>{{ number_format($businessExpense->amount, 2, '.', ',') }}</td>
                                </tr>
                            </tbody>
                        @endforeach
                        <tfoot>
                            <tr>
                                <th>Total</th>
                                <th>{{ number_format($activity->businessExpenses->sum('amount'), 2, '.', ',') }}</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
        @endif
    </div>

    @if ($activity->businessPassives->isNotEmpty())
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        Pasivos
                    </div>
                    <div class="card-body p-0 table-responsive">
                        <table class="table table-bordered table-striped table-sm">
                            <thead>
                                <tr>
                                    <th>Nombre del Banco u otro Acreedor</th>
                                    <th>Monto</th>
                                    <th>Cuota</th>
                                    <th>Plazo</th>
                                    <th>Frecuencia</th>
                                    <th>Destino</th>
                                    <th>Tipo de Garantia</th>
                                    <th>Saldo</th>
                                </tr>
                            </thead>
                            @foreach ($activity->businessPassives as $businessPassive)
                                <tbody>
                                    <tr>
                                        <td>{{ $businessPassive->passiveType->name }}</td>
                                        <td>{{ number_format($businessPassive->amount, 2, '.', ',') }}</td>
                                        <td>{{ number_format($businessPassive->share, 2, '.', ',') }}</td>
                                        <td>{{ $businessPassive->term }}</td>
                                        <td>{{ $businessPassive->frecuency }}</td>
                                        <td>{{ $businessPassive->destination }}</td>
                                        <td>{{ $businessPassive->warranty }}</td>
                                        <td>{{ number_format($businessPassive->balace, 2, '.', ',') }}</td>
                                    </tr>
                                </tbody>
                            @endforeach
                            <tfoot>
                                <tr>
                                    <th colspan="7" >Total pasivos</th>
                                    <th>{{ number_format($activity->businessPassives->sum('balace'), 2, '.', ',') }}</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    @endif

    @if ($activity->businessAddress)
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        Direccion del Negocio
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-6">
                                <dl class="row">
                                    <dt class="col-4">Tipo de Propiedad</dt>
                                    <dd class="col-8">{{ $activity->businessAddress->property }}</dd>
                                    <dt class="col-4">Tiempo que reside en el lugar</dt>
                                    <dd class="col-8">{{ $activity->businessAddress->time }}</dd>
                                    <dt class="col-4">Dir. Domicilio</dt>
                                    <dd class="col-8">{{ $activity->businessAddress->direction }}</dd>
                                    <dt class="col-4">No.</dt>
                                    <dd class="col-8">{{ $activity->businessAddress->number }}</dd>
                                    <dt class="col-4">Zona/Barrio</dt>
                                    <dd class="col-8">{{ $activity->businessAddress->zone }}</dd>
                                    <dt class="col-4">Teléfono</dt>
                                    <dd class="col-8">{{ $activity->businessAddress->mobile }}</dd>
                                    <dt class="col-4">Provincia/Municipio/Comunidad</dt>
                                    <dd class="col-8">{{ $activity->businessAddress->province }}</dd>
                                    <dt class="col-4">Link Google Map</dt>
                                    <dd class="col-8"><{{ $activity->businessAddress->link }}>{{ $activity->businessAddress->link }}</a></dd>
                                    <dt class="col-4">Descripcion</dt>
                                    <dd class="col-8">{{ $activity->businessAddress->description }}</dd>
                                </dl>
                            </div>
                            <div class="col-6">
                                <div class="row justify-content-center">
                                    <div class="img-fluid fa-border">
                                        <img src="{{ $activity->businessAddress->file }}" width="300">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif

    @if ($activity->debt)
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        Endeudamiento
                    </div>
                    <div class="card-body p-0 table-responsive">
                        <table class="table table-bordered table-striped table-sm">
                            <thead>
                                <tr>
                                    <th>Pasivo corto plazo</th>
                                    <th>Pasivo largo plazo</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if ($activity->debt)
                                    <tr>
                                        <td>{{ number_format($activity->debt->shortTerm, 2, '.', ',') }}</td>
                                        <td>{{ number_format($activity->debt->longTerm, 2, '.', ',') }}</td>
                                    </tr>
                                @endif
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    @endif

</body>
</html>
