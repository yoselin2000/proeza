<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>cliente</title>

    <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">
</head>
<body>
    <div class="row justify-content-center pb-3">
        <h1>DATOS DEL CLIENTE</h1>
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
                    {{ $evaluation->participant->application->user->agency->city->name  }}
                </dd>
                <dt class="col-5">Sucursal:</dt>
                <dd class="col-7">
                    {{ $evaluation->participant->application->user->agency->name }}
                </dd>
                <dt class="col-5">Responsable:</dt>
                <dd class="col-7">
                    {{ $evaluation->participant->application->user->name }}
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
                    Datos de Evaluacion
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-2">
                            <dl class="row">
                                <dt class="col-md-6">Edad</dt>
                                <dd class="col-md-6">{{ $evaluation->age }}</dd>
                            </dl>
                        </div>
                        <div class="col-3">
                            <dl class="row">
                                <dt class="col-4">Estado Civil</dt>
                                <dd class="col-8">{{ $evaluation->civil }}</dd>
                            </dl>
                        </div>
                        <div class="col-2">
                            <dl class="row">
                                <dt class="col-4">Telf. Fijo</dt>
                                <dd class="col-8">{{ $evaluation->landline }}</dd>
                            </dl>
                        </div>
                        <div class="col-2">
                            <dl class="row">
                                <dt class="col-4">Telf. Movil</dt>
                                <dd class="col-8">{{ $evaluation->mobile }}</dd>
                            </dl>
                        </div>
                        <div class="col-3">
                            <dl class="row">
                                <dt class="col-4">Situación Laboral</dt>
                                <dd class="col-8">{{ $evaluation->employment }}</dd>
                            </dl>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @if ($evaluation->childrens->isNotEmpty())
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        Descripcion Familiar
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered table-striped table-sm">
                            <thead>
                                <tr>
                                    <th>Tipo</th>
                                    <th>Edad</th>
                                    <th>Sexo</th>
                                    <th>Estudia</th>
                                    <th>Donde</th>
                                    <th>Tipo de Entidad</th>
                                    <th>Otras Actividades</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($evaluation->childrens as $children)
                                    <tr>
                                        <td>{{ $children->state }}</td>
                                        <td>{{ $children->age }}</td>
                                        <td>{{ $children->gender }}</td>
                                        <td>{{ $children->student }}</td>
                                        <td>{{ $children->place }}</td>
                                        <td>{{ $children->type }}</td>
                                        <td>{{ $children->other }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    @endif

    @if ($evaluation->references->isNotEmpty())
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        Referencias
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <table class="table table-bordered table-striped table-sm">
                                <thead>
                                    <tr>
                                        <th>Tipo de Referencia</th>
                                        <th>Nombre</th>
                                        <th>Direccion</th>
                                        <th>Telf. Movil</th>
                                        <th>Vinculo</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($evaluation->references as $reference)
                                        <tr>
                                            <td>{{ $reference->type }}</td>
                                            <td>{{ $reference->name }}</td>
                                            <td>{{ $reference->address }}</td>
                                            <td>{{ $reference->mobile }}</td>
                                            <td>{{ $reference->link }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif

    @if ($evaluation->homeAddress)
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        Direccion de Domicilio
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-6">
                                <dl class="row">
                                    <dt class="col-4">Tipo de Propiedad</dt>
                                    <dd class="col-8">{{ $evaluation->homeAddress->property }}</dd>
                                    <dt class="col-4">Tiempo que reside en el lugar</dt>
                                    <dd class="col-8">{{ $evaluation->homeAddress->time }}</dd>
                                    <dt class="col-4">Dir. Domicilio</dt>
                                    <dd class="col-8">{{ $evaluation->homeAddress->direction }}</dd>
                                    <dt class="col-4">No.</dt>
                                    <dd class="col-8">{{ $evaluation->homeAddress->number }}</dd>
                                    <dt class="col-4">Zona/Barrio</dt>
                                    <dd class="col-8">{{ $evaluation->homeAddress->zone }}</dd>
                                    <dt class="col-4">Teléfono</dt>
                                    <dd class="col-8">{{ $evaluation->homeAddress->mobile }}</dd>
                                    <dt class="col-4">Provincia/Municipio/Comunidad</dt>
                                    <dd class="col-8">{{ $evaluation->homeAddress->province }}</dd>
                                    <dt class="col-4">Link Google Map</dt>
                                    <dd class="col-8"><{{ $evaluation->homeAddress->link }}>{{ $evaluation->homeAddress->link }}</a></dd>
                                    <dt class="col-4">Descripcion</dt>
                                    <dd class="col-8">{{ $evaluation->homeAddress->description }}</dd>
                                </dl>
                            </div>
                            <div class="col-6">
                                <div class="row justify-content-center">
                                    <div class="img-fluid fa-border">
                                        <img src="{{ $evaluation->homeAddress->file }}" width="300">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif

    @if ($evaluation->receptions->isNotEmpty())
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        Recepcion de documentos
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <table class="table table-bordered table-striped table-sm">
                                <thead>
                                    <tr>
                                        <th>Tipo de Garantia</th>
                                        <th>Tipo de Bien</th>
                                        <th>Tipo de Documento</th>
                                        <th>N° Doc</th>
                                        <th>N° de Fojas</th>
                                        <th>Documento</th>
                                        <th>Estado</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($evaluation->receptions as $reception)
                                        <tr>
                                            <td>{{ $reception->warranty->name }}</td>
                                            <td>{{ $reception->document->element->name }}</td>
                                            <td>{{ $reception->document->name }}</td>
                                            <td>{{ $reception->doc }}</td>
                                            <td>{{ $reception->fojas }}</td>
                                            <td>{{ $reception->type }}</td>
                                            <td>{{ $reception->estate }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif

    <div class="row">
        @if ($evaluation->archives->isNotEmpty())
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        Documentos de respaldo
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <table class="table table-bordered table-striped table-sm">
                                <thead>
                                    <tr>
                                        <th>Tipo de Archivo</th>
                                        {{--  <th>Link</th>  --}}
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($evaluation->archives as $archive)
                                        <tr>
                                            <td>{{ $archive->archiveType->name }}</td>
                                            {{--  <td><{{ $archive->file }} {{ $archive->evaluation->participant->client->lastName }} {{ $archive->evaluation->participant->client->secondLastName }} {{ $archive->evaluation->participant->client->name }}  {{ $archive->evaluation->participant->client->thirdLastName }} - {{ $archive->archiveType->name }}.pdf>{{ $archive->archiveType->name }}</td>  --}}
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        @endif

        @if ($evaluation->familyExpenses->isNotEmpty())
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
                            <tbody>
                                @foreach ($evaluation->familyExpenses as $familyExpense)
                                    <tr>
                                        <td>{{ $familyExpense->expenseType->name }}</td>
                                        <td>{{ number_format($familyExpense->amount, 2, '.', ',') }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Total</th>
                                    <th>{{ number_format($evaluation->familyExpenses->sum('amount'), 2, '.', ',') }}</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        @endif
    </div>

    @if ($evaluation->familyFixedAssets->isNotEmpty())
        <div class="row">
            <div class="col-12">
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
                            <tbody>
                                @foreach ($evaluation->familyFixedAssets as $familyFixedAsset)
                                    <tr>
                                        <td>{{ $familyFixedAsset->assetType->name }}</td>
                                        <td>{{ $familyFixedAsset->year }}</td>
                                        <td>{{ number_format($familyFixedAsset->amount, 2, '.', ',') }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th colspan="2">Total activos</th>
                                    <th>{{ number_format($evaluation->familyFixedAssets->sum('amount'), 2, '.', ',') }}</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    @endif

    @if ($evaluation->familyPassives->isNotEmpty())
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
                            <tbody>
                                @foreach ($evaluation->familyPassives as $familyPassive)
                                    <tr>
                                        <td>{{ $familyPassive->passiveType->name }}</td>
                                        <td>{{ number_format($familyPassive->amount, 2, '.', ',') }}</td>
                                        <td>{{ number_format($familyPassive->share, 2, '.', ',') }}</td>
                                        <td>{{ $familyPassive->term }}</td>
                                        <td>{{ $familyPassive->frecuency }}</td>
                                        <td>{{ $familyPassive->destination }}</td>
                                        <td>{{ $familyPassive->warranty }}</td>
                                        <td>{{ number_format($familyPassive->balace, 2, '.', ',') }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th colspan="7">Total pasivos</th>
                                    <th>{{ number_format($evaluation->familyPassives->sum('amount'), 2, '.', ',') }}</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    @endif

    @if ($evaluation->activities->isNotEmpty())
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        Actividad Economica
                    </div>
                    <div class="card-body p-0 table-responsive">
                        <table class="table table-bordered table-striped table-sm">
                            <thead>
                                <tr>
                                    <th>Actividad Economica</th>
                                    <th>Caedec</th>
                                    <th>Actividad Especifica</th>
                                    <th>Profesion/Ocupacion</th>
                                    <th>Realizada por</th>
                                    <th>Experiencia en el Rubro (meses)</th>
                                    <th>Antiguedad del Negocio (meses)</th>
                                    <th>Propiedad del puesto y/o Lugar</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($evaluation->activities as $activity)
                                    <tr>
                                        <td>{{ $activity->form }}</td>
                                        <td>{{ $activity->caedec->code }}.- {{ $activity->caedec->heading }}.- {{ $activity->caedec->description }}</td>
                                        <td>{{ $activity->form }}</td>
                                        <td>{{ $activity->profession }}</td>
                                        <td>{{ $activity->responsable }}</td>
                                        <td>{{ $activity->experience }}</td>
                                        <td>{{ $activity->antiquity }}</td>
                                        <td>{{ $activity->property }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    @endif
</body>
</html>
