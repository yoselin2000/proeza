@extends('layouts.app')
@section('title')
    <div class="row">
        <h5 class="m-0">Solicitud  {{ $evaluation->participant->client->id }} -
            Cliente {{ $evaluation->participant->client->lastName }} {{ $evaluation->participant->client->secondLastName }} {{ $evaluation->participant->client->name }} {{ $evaluation->participant->client->thirdLastName }} -
            Evaluacion {{ $evaluation->id }}
        </h5>
        <div class="btn-group" role="group" aria-label="Button group">
            <form action="{{ route('prints.client', $evaluation->id) }}" method="GET">
                <button class="btn btn-info btn-xs" type="submit"><i class="fa fa-print" aria-hidden="true"></i></button>
            </form>
        </div>
    </div>
@endsection
@section('content')
    @include('option.confirmation')
{{--  evaluation --}}
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    Datos de Evaluacion
                    @if (!$application->approved && !$application->rejected)
                        @can('evaluations.update')
                            <button type="button" class="btn btn-warning btn-xs" data-toggle="modal" data-target="#evaluationEdit{{ $evaluation->id }}"><i class="fas fa-pen"></i></button>
                            @include('credit.evaluations.edit')
                        @endcan
                        @can('evaluations.destroy')
                            <button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#evaluationDelete{{ $evaluation->id }}"><i class="fas fa-trash-alt"></i></button>
                            @include('credit.evaluations.delete')
                        @endcan
                    @endif
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-2">
                            <dl class="row">
                                <dt class="col-md-6">Edad</dt>
                                <dd class="col-md-6">{{ $evaluation->age }}</dd>
                            </dl>
                        </div>
                        <div class="col-md-3">
                            <dl class="row">
                                <dt class="col-md-6">Estado Civil</dt>
                                <dd class="col-md-6">{{ $evaluation->civil }}</dd>
                            </dl>
                        </div>
                        <div class="col-md-2">
                            <dl class="row">
                                <dt class="col-md-6">Telf. Fijo</dt>
                                <dd class="col-md-6">{{ $evaluation->landline }}</dd>
                            </dl>
                        </div>
                        <div class="col-md-2">
                            <dl class="row">
                                <dt class="col-md-6">Telf. Movil</dt>
                                <dd class="col-md-6">{{ $evaluation->mobile }}</dd>
                            </dl>
                        </div>
                        <div class="col-md-3">
                            <dl class="row">
                                <dt class="col-md-6">Situación Laboral</dt>
                                <dd class="col-md-6">{{ $evaluation->employment }}</dd>
                            </dl>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

{{--  childrens  --}}
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    Descripcion Familiar
                    @if (!$application->approved && !$application->rejected)
                        @can('evalationsFamily.store')
                            <button type="button" class="btn btn-success btn-xs" data-toggle="modal" data-target="#childrenCreate"><i class="fas fa-plus-circle"></i></button>
                            @include('evaluation.childrens.create')
                        @endcan
                    @endif
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
                                @if (!$application->approved && !$application->rejected)
                                    @can('evalationsFamily.update','evalationsFamily.destroy')
                                        <th>
                                            Opc
                                        </th>
                                    @endcan
                                @endif
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
                                    @if (!$application->approved && !$application->rejected)
                                        @can('evalationsFamily.update','evalationsFamily.destroy')
                                            <td>
                                                <div class="btn-group">
                                                    @can('evalationsFamily.update')
                                                        <button type="button" class="btn btn-warning btn-xs" data-toggle="modal" data-target="#childrenEdit{{ $children->id }}"><i class="fas fa-pen"></i></button>
                                                        @include('evaluation.childrens.edit')
                                                    @endcan
                                                    @can('evalationsFamily.destroy')
                                                        <button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#childrenDelete{{ $children->id }}"><i class="fas fa-trash-alt"></i></button>
                                                        @include('evaluation.childrens.delete')
                                                    @endcan
                                                </div>
                                            </td>
                                        @endcan
                                    @endif
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

{{--  references  --}}
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    Referencias
                    @if (!$application->approved && !$application->rejected)
                        @can('evalationsFamily.store')
                            <button type="button" class="btn btn-success btn-xs" data-toggle="modal" data-target="#referenceCreate"><i class="fas fa-plus-circle"></i></button>
                            @include('evaluation.references.create')
                        @endcan
                    @endif
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
                                    @if (!$application->approved && !$application->rejected)
                                        @can('evalationsFamily.update','evalationsFamily.destroy')
                                            <th>
                                                Opc
                                            </th>
                                        @endcan
                                    @endif
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
                                        @if (!$application->approved && !$application->rejected)
                                            @can('evalationsFamily.update','evalationsFamily.destroy')
                                                <td>
                                                    <div class="btn-group">
                                                        @can('evalationsFamily.update')
                                                            <button type="button" class="btn btn-warning btn-xs" data-toggle="modal" data-target="#referenceEdit{{ $reference->id }}"><i class="fas fa-pen"></i></button>
                                                            @include('evaluation.references.edit')
                                                        @endcan
                                                        @can('evalationsFamily.destroy')
                                                            <button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#referenceDelete{{ $reference->id }}"><i class="fas fa-trash-alt"></i></button>
                                                            @include('evaluation.references.delete')
                                                        @endcan
                                                    </div>
                                                </td>
                                            @endcan
                                        @endif
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

{{--  home_addresses  --}}
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    Direccion de Domicilio
                    @php
                        $homeAddress = $evaluation->homeAddress;
                    @endphp
                    @if (!$application->approved && !$application->rejected)
                        @if ($homeAddress)
                            @can('evalationsFamily.update')
                                <button type="button" class="btn btn-warning btn-xs" data-toggle="modal" data-target="#homeAddressEdit{{ $evaluation->homeAddress->id }}"><i class="fas fa-pen"></i></button>
                                @include('evaluation.homeAddresses.edit')
                            @endcan
                            @can('evalationsFamily.destroy')
                                <button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#homeAddressDelete{{ $evaluation->homeAddress->id }}"><i class="fas fa-trash-alt"></i></button>
                                @include('evaluation.homeAddresses.delete')
                            @endcan
                        @else
                            @can('evalationsFamily.store')
                                <button type="button" class="btn btn-success btn-xs" data-toggle="modal" data-target="#homeAddressCreate"><i class="fas fa-plus-circle"></i></button>
                                @include('evaluation.homeAddresses.create')
                            @endcan
                        @endif
                    @endif
                </div>
                @if ($homeAddress)
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <dl class="row">
                                    <dt class="col-md-4">Tipo de Propiedad</dt>
                                    <dd class="col-md-8">{{ $homeAddress->property }}</dd>
                                    <dt class="col-md-4">Tiempo que reside en el lugar</dt>
                                    <dd class="col-md-8">{{ $homeAddress->time }}</dd>
                                    <dt class="col-md-4">Dir. Domicilio</dt>
                                    <dd class="col-md-8">{{ $homeAddress->direction }}</dd>
                                    <dt class="col-md-4">No.</dt>
                                    <dd class="col-md-8">{{ $homeAddress->number }}</dd>
                                    <dt class="col-md-4">Zona/Barrio</dt>
                                    <dd class="col-md-8">{{ $homeAddress->zone }}</dd>
                                    <dt class="col-md-4">Teléfono</dt>
                                    <dd class="col-md-8">{{ $homeAddress->mobile }}</dd>
                                    <dt class="col-md-4">Provincia/Municipio/Comunidad</dt>
                                    <dd class="col-md-8">{{ $homeAddress->province }}</dd>
                                    <dt class="col-md-4">Link Google Map</dt>
                                    <dd class="col-md-8"><a href="{{ $homeAddress->link }}">{{ $homeAddress->link }}</a></dd>
                                    <dt class="col-md-4">Descripcion</dt>
                                    <dd class="col-md-8">{{ $homeAddress->description }}</dd>
                                </dl>
                            </div>
                            <div class="col-md-6">
                                <div class="row justify-content-center">
                                    <div class="img-fluid fa-border">
                                        <img src="{{ $homeAddress->file }}" width="300">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>

{{--  receptions  --}}
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    Recepcion de documentos
                    @if (!$application->approved && !$application->rejected)
                        @can('evalationsFamily.store')
                            <button type="button" class="btn btn-success btn-xs" data-toggle="modal" data-target="#receptionCreate"><i class="fas fa-plus-circle"></i></button>
                            @include('evaluation.receptions.create')
                        @endcan
                    @endif
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
                                    @if (!$application->approved && !$application->rejected)
                                        @can('evalationsFamily.update','evalationsFamily.destroy')
                                            <th>
                                                Opc
                                            </th>
                                        @endcan
                                    @endif
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
                                        @can('evalationsFamily.update','evalationsFamily.destroy')
                                            <td>
                                                <div class="btn-group">
                                                    @can('evalationsFamily.update')
                                                        <button type="button" class="btn btn-warning btn-xs" data-toggle="modal" data-target="#receptionEdit{{ $reception->id }}"><i class="fas fa-pen"></i></button>
                                                        @include('evaluation.receptions.edit')
                                                    @endcan
                                                    @can('evalationsFamily.destroy')
                                                        <button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#receptionDelete{{ $reception->id }}"><i class="fas fa-trash-alt"></i></button>
                                                        @include('evaluation.receptions.delete')
                                                    @endcan
                                                </div>
                                            </td>
                                        @endcan
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

{{--  archives  --}}
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    Documentos de respaldo
                    @if (!$application->approved && !$application->rejected)
                        @can('evalationsFamily.store')
                            <button type="button" class="btn btn-success btn-xs" data-toggle="modal" data-target="#archiveCreate"><i class="fas fa-plus-circle"></i></button>
                            @include('evaluation.archives.create')
                        @endcan
                    @endif
                </div>
                <div class="card-body">
                    <div class="row">
                        <table class="table table-bordered table-striped table-sm">
                            <thead>
                                <tr>
                                    <th>Tipo de Archivo</th>
                                    <th>Link</th>
                                    @if (!$application->approved && !$application->rejected)
                                        @can('evalationsFamily.update','evalationsFamily.destroy')
                                            <th>
                                                Opc
                                            </th>
                                        @endcan
                                    @endif
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($evaluation->archives as $archive)
                                    <tr>
                                        <td>{{ $archive->archiveType->name }}</td>
                                        <td><a href="{{ $archive->file }}" download="{{ $archive->evaluation->participant->client->lastName }} {{ $archive->evaluation->participant->client->secondLastName }} {{ $archive->evaluation->participant->client->name }}  {{ $archive->evaluation->participant->client->thirdLastName }} - {{ $archive->archiveType->name }}.pdf">{{ $archive->archiveType->name }}</a></td>
                                        @if (!$application->approved && !$application->rejected)
                                            @can('evalationsFamily.update','evalationsFamily.destroy')
                                                <td>
                                                    <div class="btn-group">
                                                        @can('evalationsFamily.update')
                                                            <button type="button" class="btn btn-warning btn-xs" data-toggle="modal" data-target="#archiveEdit{{ $archive->id }}"><i class="fas fa-pen"></i></button>
                                                            @include('evaluation.archives.edit')
                                                        @endcan
                                                        @can('evalationsFamily.destroy')
                                                            <button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#archiveDelete{{ $archive->id }}"><i class="fas fa-trash-alt"></i></button>
                                                            @include('evaluation.archives.delete')
                                                        @endcan
                                                    </div>
                                                </td>
                                            @endcan
                                        @endif
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

{{--  family_fixed_assets  --}}
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    Activos Fijos
                    @if (!$application->approved && !$application->rejected)
                        @can('evalationsFamily.store')
                            <button type="button" class="btn btn-success btn-xs" data-toggle="modal" data-target="#familyFixedAssetCreate"><i class="fas fa-plus-circle"></i></button>
                            @include('evaluation.familyFixedAssets.create')
                        @endcan
                    @endif
                </div>
                <div class="card-body p-0 table-responsive">
                    <table class="table table-bordered table-striped table-sm">
                        <thead>
                            <tr>
                                <th>Tipo de Bien</th>
                                <th>Año/Compra</th>
                                <th>Valor Actual</th>
                                @if (!$application->approved && !$application->rejected)
                                    @can('evalationsFamily.update','evalationsFamily.destroy')
                                        <th>
                                            Opc
                                        </th>
                                    @endcan
                                @endif
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($evaluation->familyFixedAssets as $familyFixedAsset)
                                <tr>
                                    <td>{{ $familyFixedAsset->assetType->name }}</td>
                                    <td>{{ $familyFixedAsset->year }}</td>
                                    <td>{{ number_format($familyFixedAsset->amount, 2, '.', ',') }}</td>
                                    @if (!$application->approved && !$application->rejected)
                                        @can('evalationsFamily.update','evalationsFamily.destroy')
                                            <td>
                                                <div class="btn-group">
                                                    @can('evalationsFamily.update')
                                                        <button type="button" class="btn btn-warning btn-xs" data-toggle="modal" data-target="#familyFixedAssetEdit{{ $familyFixedAsset->id }}"><i class="fas fa-pen"></i></button>
                                                        @include('evaluation.familyFixedAssets.edit')
                                                    @endcan
                                                    @can('evalationsFamily.destroy')
                                                        <button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#familyFixedAssetDelete{{ $familyFixedAsset->id }}"><i class="fas fa-trash-alt"></i></button>
                                                        @include('evaluation.familyFixedAssets.delete')
                                                    @endcan
                                                </div>
                                            </td>
                                        @endcan
                                    @endif
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Total</th>
                                <th>#</th>
                                <th>{{ number_format($evaluation->familyFixedAssets->sum('amount'), 2, '.', ',') }}</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>

{{--  family_passives  --}}
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    Pasivos
                    @if (!$application->approved && !$application->rejected)
                        @can('evalationsFamily.store')
                            <button type="button" class="btn btn-success btn-xs" data-toggle="modal" data-target="#familyPassiveCreate"><i class="fas fa-plus-circle"></i></button>
                            @include('evaluation.familyPassives.create')
                        @endcan
                    @endif
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
                                @if (!$application->approved && !$application->rejected)
                                    @can('evalationsFamily.update','evalationsFamily.destroy')
                                        <th>
                                            Opc
                                        </th>
                                    @endcan
                                @endif
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
                                    @if (!$application->approved && !$application->rejected)
                                        @can('evalationsFamily.update','evalationsFamily.destroy')
                                            <td>
                                                <div class="btn-group">
                                                    @can('evalationsFamily.update')
                                                        <button type="button" class="btn btn-warning btn-xs" data-toggle="modal" data-target="#familyPassiveEdit{{ $familyPassive->id }}"><i class="fas fa-pen"></i></button>
                                                        @include('evaluation.familyPassives.edit')
                                                    @endcan
                                                    @can('evalationsFamily.destroy')
                                                        <button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#familyPassiveDelete{{ $familyPassive->id }}"><i class="fas fa-trash-alt"></i></button>
                                                        @include('evaluation.familyPassives.delete')
                                                    @endcan
                                                </div>
                                            </td>
                                        @endcan
                                    @endif
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Total</th>
                                <th>#</th>
                                <th>#</th>
                                <th>#</th>
                                <th>#</th>
                                <th>#</th>
                                <th>#</th>
                                <th>{{ number_format($evaluation->familyPassives->sum('balace'), 2, '.', ',') }}</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>

{{--  family_expenses  --}}
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    Gastos Operativos
                    @if (!$application->approved && !$application->rejected)
                        @can('evalationsFamily.store')
                            <button type="button" class="btn btn-success btn-xs" data-toggle="modal" data-target="#familyExpenseCreate"><i class="fas fa-plus-circle"></i></button>
                            @include('evaluation.familyExpenses.create')
                        @endcan
                    @endif
                </div>
                <div class="card-body p-0 table-responsive">
                    <table class="table table-bordered table-striped table-sm">
                        <thead>
                            <tr>
                                <th>Item</th>
                                <th>valor</th>
                                @if (!$application->approved && !$application->rejected)
                                    @can('evalationsFamily.update','evalationsFamily.destroy')
                                        <th>
                                            Opc
                                        </th>
                                    @endcan
                                @endif
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($evaluation->familyExpenses as $familyExpense)
                                <tr>
                                    <td>{{ $familyExpense->expenseType->name }}</td>
                                    <td>{{ number_format($familyExpense->amount, 2, '.', ',') }}</td>
                                    @if (!$application->approved && !$application->rejected)
                                        @can('evalationsFamily.update','evalationsFamily.destroy')
                                            <td>
                                                <div class="btn-group">
                                                    @can('evalationsFamily.update')
                                                        <button type="button" class="btn btn-warning btn-xs" data-toggle="modal" data-target="#familyExpenseEdit{{ $familyExpense->id }}"><i class="fas fa-pen"></i></button>
                                                        @include('evaluation.familyExpenses.edit')
                                                    @endcan
                                                    @can('evalationsFamily.destroy')
                                                        <button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#familyExpenseDelete{{ $familyExpense->id }}"><i class="fas fa-trash-alt"></i></button>
                                                        @include('evaluation.familyExpenses.delete')
                                                    @endcan
                                                </div>
                                            </td>
                                        @endcan
                                    @endif
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Total</th>
                                <th>{{ number_format($evaluation->familyExpenses->sum('amount'), 2, '.', ',') }}</th>
                            </tr>
                            <tr>
                                <th>Total Gastos</th>
                                <th>{{ number_format($evaluation->familyExpenses->sum('amount') + $evaluation->familyPassives->sum('share'), 2, '.', ',') }}</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>

{{--  activities  --}}
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    Actividad Economica
                    @if (!$application->approved && !$application->rejected)
                        @can('evalationsFamily.store')
                            <button type="button" class="btn btn-success btn-xs" data-toggle="modal" data-target="#activityCreate"><i class="fas fa-plus-circle"></i></button>
                            @include('evaluation.activities.create')
                        @endcan
                    @endif
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
                                @if (!$application->approved && !$application->rejected)
                                    @can('evalationsFamily.update','evalationsFamily.destroy')
                                        <th>
                                            Opc
                                        </th>
                                    @endcan
                                @endif
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($evaluation->activities as $activity)
                                <tr>
                                    <td>
                                        <form class="p-1" action="{{ route('hoja3.show', $activity->id) }}" method="GET">
                                            <button class="btn btn-primary btn-xs" type="submit">{{ $activity->form }}</button>
                                        </form>
                                    </td>
                                    <td>{{ $activity->caedec->code }}.- {{ $activity->caedec->heading }}.- {{ $activity->caedec->description }}</td>
                                    <td>{{ $activity->form }}</td>
                                    <td>{{ $activity->profession }}</td>
                                    <td>{{ $activity->responsable }}</td>
                                    <td>{{ $activity->experience }}</td>
                                    <td>{{ $activity->antiquity }}</td>
                                    <td>{{ $activity->property }}</td>
                                    @if (!$application->approved && !$application->rejected)
                                        @can('evalationsFamily.update','evalationsFamily.destroy')
                                            <td>
                                                <div class="btn-group">
                                                    @can('evalationsFamily.update')
                                                        <button type="button" class="btn btn-warning btn-xs" data-toggle="modal" data-target="#activityEdit{{ $activity->id }}"><i class="fas fa-pen"></i></button>
                                                        @include('evaluation.activities.edit')
                                                    @endcan
                                                    @can('evalationsFamily.destroy')
                                                        <button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#activityDelete{{ $activity->id }}"><i class="fas fa-trash-alt"></i></button>
                                                        @include('evaluation.activities.delete')
                                                    @endcan
                                                </div>
                                            </td>
                                        @endcan
                                    @endif
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
