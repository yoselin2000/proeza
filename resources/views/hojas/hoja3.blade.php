@extends('layouts.app')
@section('title')
    <div class="row">
        <h5 class="m-0">Solicitud  {{ $evaluation->participant->client->id }} -
            Cliente {{ $evaluation->participant->client->lastName }} {{ $evaluation->participant->client->secondLastName }} {{ $evaluation->participant->client->name }} {{ $evaluation->participant->client->thirdLastName }} -
            Evaluacion {{ $evaluation->id }}
        </h5>
        @if ($activity->form == 'Comercio' || $activity->form == 'Servicio' || $activity->form == 'Produccion')
            <form class="mr-1" action="{{ route('inventario.show', $activity->id) }}" method="GET">
                <button class="btn btn-primary btn-xs" type="submit">Inventario</button>
            </form>
        @endif
        @if ($activity->form == 'Comercio' || $activity->form == 'Servicio' || $activity->form == 'Produccion')
            <form class="mr-1" action="{{ route('ventas.show', $activity->id) }}" method="GET">
                <button class="btn btn-primary btn-xs" type="submit">Det. Ventas</button>
            </form>
        @endif
        @if ($activity->form == 'Produccion')
            <form class="mr-1" action="{{ route('costos.show', $activity->id) }}" method="GET">
                <button class="btn btn-primary btn-xs" type="submit">Hoja de Costos</button>
            </form>
        @endif
        @if ($activity->form == 'Transporte')
            <form class="mr-1" action="{{ route('transporte.show', $activity->id) }}" method="GET">
                <button class="btn btn-primary btn-xs" type="submit">Hoja de Transporte</button>
            </form>
        @endif
        @if ($activity->form == 'Dependiente')
            <form class="mr-1" action="{{ route('empresa.show', $activity->id) }}" method="GET">
                <button class="btn btn-primary btn-xs" type="submit">Datos de Empresa</button>
            </form>
        @endif
        <div class="btn-group" role="group" aria-label="Button group">
            <form class="mr-1" action="{{ route('prints.activity', $activity->id) }}" method="GET">
                <button class="btn btn-info btn-xs" type="submit"><i class="fa fa-print" aria-hidden="true"></i></button>
            </form>
        </div>
    </div>
@endsection
@section('content')
    @include('option.confirmation')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    Actividad Economica
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                            <dl class="row">
                                <dt class="col-md-6">Actividad Economica</dt>
                                <dd class="col-md-6">{{ $activity->form }}</dd>
                                <dt class="col-md-6">Caedec</dt>
                                <dd class="col-md-6">{{ $activity->caedec->code }}.- {{ $activity->caedec->heading }}.- {{ $activity->caedec->description }}</dd>
                                <dt class="col-md-6">Actividad Especifica</dt>
                                <dd class="col-md-6">{{ $activity->specific }}</dd>
                            </dl>
                        </div>
                        <div class="col-md-4">
                            <dl class="row">
                                <dt class="col-md-6">Profesion/Ocupacion</dt>
                                <dd class="col-md-6">{{ $activity->profession }}</dd>
                                <dt class="col-md-6">Realizada por</dt>
                                <dd class="col-md-6">{{ $activity->responsable }}</dd>
                                <dt class="col-md-6">Experiencia en el Rubro (meses)</dt>
                                <dd class="col-md-6">{{ $activity->experience }}</dd>
                            </dl>
                        </div>
                        <div class="col-md-4">
                            <dl class="row">
                                <dt class="col-md-6">Antiguedad del Negocio (meses)</dt>
                                <dd class="col-md-6">{{ $activity->antiquity }}</dd>
                                <dt class="col-md-6">Propiedad del puesto y/o Lugar</dt>
                                <dd class="col-md-6">{{ $activity->property }}</dd>
                            </dl>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    Informacion
                    @if (!$application->approved && !$application->rejected)
                        @can('activities.store')
                            <button type="button" class="btn btn-success btn-xs" data-toggle="modal" data-target="#complementCreate"><i class="fas fa-plus-circle"></i></button>
                            @include('activity.complements.create')
                        @endcan
                    @endif
                </div>
                <div class="card-body">
                    <div class="row">
                        @foreach ($activity->complements as $complement)
                            <div class="col-md">
                                <div class="card">
                                    <div class="card-header">
                                        Informacion sobre {{ $complement->complementType->name }}
                                        @if (!$application->approved && !$application->rejected)
                                            @can('activities.update')
                                                <button type="button" class="btn btn-warning btn-xs" data-toggle="modal" data-target="#complementEdit{{ $complement->id }}"><i class="fas fa-pen"></i></button>
                                                @include('activity.complements.edit')
                                            @endcan
                                            @can('activities.destroy')
                                                <button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#complementDelete{{ $complement->id }}"><i class="fas fa-trash-alt"></i></button>
                                                @include('activity.complements.delete')
                                            @endcan
                                        @endif
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

    {{--  current_assets  --}}
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    Activos Corrientes
                    @if (!$application->approved && !$application->rejected)
                        @can('evalationsFamily.store')
                            <button type="button" class="btn btn-success btn-xs" data-toggle="modal" data-target="#businessCurrentAssetCreate"><i class="fas fa-plus-circle"></i></button>
                            @include('activity.businessCurrentAssets.create')
                        @endcan
                    @endif
                </div>
                <div class="card-body p-0 table-responsive">
                    <table class="table table-bordered table-striped table-sm">
                        <thead>
                            <tr>
                                <th>Nombre</th>
                                <th>Valor</th>
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
                            @foreach ($activity->businessCurrentAssets as $businessCurrentAsset)
                                <tr>
                                    <td>{{ $businessCurrentAsset->assetType->name }}</td>
                                    <td>{{ number_format($businessCurrentAsset->amount, 2, '.', ',') }}</td>
                                    @if (!$application->approved && !$application->rejected)
                                        @can('evalationsFamily.update','evalationsFamily.destroy')
                                            <td>
                                                <div class="btn-group">
                                                    @can('evalationsFamily.update')
                                                        <button type="button" class="btn btn-warning btn-xs" data-toggle="modal" data-target="#businessCurrentAssetEdit{{ $businessCurrentAsset->id }}"><i class="fas fa-pen"></i></button>
                                                        @include('activity.businessCurrentAssets.edit')
                                                    @endcan
                                                    @can('evalationsFamily.destroy')
                                                        <button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#businessCurrentAssetDelete{{ $businessCurrentAsset->id }}"><i class="fas fa-trash-alt"></i></button>
                                                        @include('activity.businessCurrentAssets.delete')
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
                                <th>{{ number_format($activity->businessCurrentAssets->sum('amount'), 2, '.', ',') }}</th>
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
                    Activos Fijos
                    @if (!$application->approved && !$application->rejected)
                        @can('activities.store')
                            <button type="button" class="btn btn-success btn-xs" data-toggle="modal" data-target="#businessFixedAssetCreate"><i class="fas fa-plus-circle"></i></button>
                            @include('activity.businessFixedAssets.create')
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
                                    @can('activities.update','activities.destroy')
                                        <th>
                                            Opc
                                        </th>
                                    @endcan
                                @endif
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($activity->businessFixedAssets as $businessFixedAsset)
                                <tr>
                                    <td>{{ $businessFixedAsset->assetType->name }}</td>
                                    <td>{{ $businessFixedAsset->year }}</td>
                                    <td>{{ number_format($businessFixedAsset->amount, 2, '.', ',') }}</td>
                                        @if (!$application->approved && !$application->rejected)
                                            @can('activities.update','activities.destroy')
                                                <td>
                                                    <div class="btn-group">
                                                        @can('activities.update')
                                                            <button type="button" class="btn btn-warning btn-xs" data-toggle="modal" data-target="#businessFixedAssetEdit{{ $businessFixedAsset->id }}"><i class="fas fa-pen"></i></button>
                                                            @include('activity.businessFixedAssets.edit')
                                                        @endcan
                                                        @can('activities.destroy')
                                                            <button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#businessFixedAssetDelete{{ $businessFixedAsset->id }}"><i class="fas fa-trash-alt"></i></button>
                                                            @include('activity.businessFixedAssets.delete')
                                                        @endcan
                                                    </div>
                                                </td>
                                        @endif
                                    @endcan
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Total</th>
                                <th>#</th>
                                <th>{{ number_format($activity->businessFixedAssets->sum('amount'), 2, '.', ',') }}</th>
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
                    @if (!$application->approved && !$application->rejected)
                        @can('activities.store')
                            <button type="button" class="btn btn-success btn-xs" data-toggle="modal" data-target="#businessPassiveCreate"><i class="fas fa-plus-circle"></i></button>
                            @include('activity.businessPassives.create')
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
                                    @can('activities.update','activities.destroy')
                                        <th>
                                            Opc
                                        </th>
                                    @endcan
                                @endif
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($activity->businessPassives as $businessPassive)
                                <tr>
                                    <td>{{ $businessPassive->passiveType->name }}</td>
                                    <td>{{ number_format($businessPassive->amount, 2, '.', ',') }}</td>
                                    <td>{{ number_format($businessPassive->share, 2, '.', ',') }}</td>
                                    <td>{{ $businessPassive->term }}</td>
                                    <td>{{ $businessPassive->frecuency }}</td>
                                    <td>{{ $businessPassive->destination }}</td>
                                    <td>{{ $businessPassive->warranty }}</td>
                                    <td>{{ number_format($businessPassive->balace, 2, '.', ',') }}</td>
                                    @if (!$application->approved && !$application->rejected)
                                        @can('activities.update','activities.destroy')
                                            <td>
                                                <div class="btn-group">
                                                    @can('activities.update')
                                                        <button type="button" class="btn btn-warning btn-xs" data-toggle="modal" data-target="#businessPassiveEdit{{ $businessPassive->id }}"><i class="fas fa-pen"></i></button>
                                                        @include('activity.businessPassives.edit')
                                                    @endcan
                                                    @can('activities.destroy')
                                                        <button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#businessPassiveDelete{{ $businessPassive->id }}"><i class="fas fa-trash-alt"></i></button>
                                                        @include('activity.businessPassives.delete')
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
                                <th>{{number_format($activity->businessPassives->sum('balace'), 2, '.', ',') }}</th>
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
                    Gastos Operativos
                    @if (!$application->approved && !$application->rejected)
                        @can('activities.store')
                            <button type="button" class="btn btn-success btn-xs" data-toggle="modal" data-target="#businessExpenseCreate"><i class="fas fa-plus-circle"></i></button>
                            @include('activity.businessExpenses.create')
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
                                    @can('activities.update','activities.destroy')
                                        <th>
                                            Opc
                                        </th>
                                    @endcan
                                @endif
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($activity->businessExpenses as $businessExpense)
                                <tr>
                                    <td>{{ $businessExpense->expenseType->name}}</td>
                                    <td>{{ number_format($businessExpense->amount, 2, '.', ',') }}</td>
                                    @if (!$application->approved && !$application->rejected)
                                        @can('activities.update','activities.destroy')
                                            <td>
                                                <div class="btn-group">
                                                    @can('activities.update')
                                                        <button type="button" class="btn btn-warning btn-xs" data-toggle="modal" data-target="#businessExpenseEdit{{ $businessExpense->id }}"><i class="fas fa-pen"></i></button>
                                                        @include('activity.businessExpenses.edit')
                                                    @endcan
                                                    @can('activities.destroy')
                                                        <button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#businessExpenseDelete{{ $businessExpense->id }}"><i class="fas fa-trash-alt"></i></button>
                                                        @include('activity.businessExpenses.delete')
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
                                <th>{{ number_format($activity->businessExpenses->sum('amount'), 2, '.', ',') }}</th>
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
                    Endeudamiento
                    @php
                        $debt = $activity->debt;
                    @endphp
                    @if (!$application->approved && !$application->rejected)
                        @if (!$debt)
                            @can('activities.store')
                                <button type="button" class="btn btn-success btn-xs" data-toggle="modal" data-target="#debtCreate"><i class="fas fa-plus-circle"></i></button>
                                @include('activity.debts.create')
                            @endcan
                        @endif
                    @endif
                </div>
                <div class="card-body p-0 table-responsive">
                    <table class="table table-bordered table-striped table-sm">
                        <thead>
                            <tr>
                                <th>Pasivo corto plazo</th>
                                <th>Pasivo largo plazo</th>
                                <th>Opciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($debt)
                                <tr>
                                    <td>{{  number_format($debt->shortTerm, 2, '.', ',') }}</td>
                                    <td>{{  number_format($debt->longTerm, 2, '.', ',') }}</td>
                                    <td>
                                        <div class="btn-group">
                                            @can('activities.update')
                                                <button type="button" class="btn btn-warning btn-xs" data-toggle="modal" data-target="#debtEdit{{ $debt->id }}"><i class="fas fa-pen"></i></button>
                                                @include('activity.debts.edit')
                                            @endcan
                                            @can('activities.destroy')
                                                <button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#debtDelete{{ $debt->id }}"><i class="fas fa-trash-alt"></i></button>
                                                @include('activity.debts.delete')
                                            @endcan
                                        </div>
                                    </td>
                                </tr>
                            @endif
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
                    Direccion del Negocio
                    @php
                        $businessAddress = $activity->businessAddress;
                    @endphp
                    @if (!$application->approved && !$application->rejected)
                        @if ($businessAddress)
                            @can('activities.update')
                                <button type="button" class="btn btn-warning btn-xs" data-toggle="modal" data-target="#businessAddressEdit{{ $activity->businessAddress->id }}"><i class="fas fa-pen"></i></button>
                                @include('activity.businessAddresses.edit')
                            @endcan
                            @can('activities.destroy')
                                <button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#businessAddressDelete{{ $activity->businessAddress->id }}"><i class="fas fa-trash-alt"></i></button>
                                @include('activity.businessAddresses.delete')
                            @endcan
                        @else
                            @can('activities.store')
                                <button type="button" class="btn btn-success btn-xs" data-toggle="modal" data-target="#businessAddressCreate"><i class="fas fa-plus-circle"></i></button>
                                @include('activity.businessAddresses.create')
                            @endcan
                        @endif
                    @endif
                </div>
                @if ($businessAddress)
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <dl class="row">
                                    <dt class="col-md-4">Tipo de Propiedad</dt>
                                    <dd class="col-md-8">{{ $businessAddress->property }}</dd>
                                    <dt class="col-md-4">Tiempo que reside en el lugar</dt>
                                    <dd class="col-md-8">{{ $businessAddress->time }}</dd>
                                    <dt class="col-md-4">Dir. Domicilio</dt>
                                    <dd class="col-md-8">{{ $businessAddress->direction }}</dd>
                                    <dt class="col-md-4">No.</dt>
                                    <dd class="col-md-8">{{ $businessAddress->number }}</dd>
                                    <dt class="col-md-4">Zona/Barrio</dt>
                                    <dd class="col-md-8">{{ $businessAddress->zone }}</dd>
                                    <dt class="col-md-4">Teléfono</dt>
                                    <dd class="col-md-8">{{ $businessAddress->mobile }}</dd>
                                    <dt class="col-md-4">Provincia/Municipio/Comunidad</dt>
                                    <dd class="col-md-8">{{ $businessAddress->province }}</dd>
                                    <dt class="col-md-4">Link Google Map</dt>
                                    <dd class="col-md-8"><a href="{{ $businessAddress->link }}">{{ $businessAddress->link }}</a></dd>
                                    <dt class="col-md-4">Descripcion</dt>
                                    <dd class="col-md-8">{{ $businessAddress->description }}</dd>
                                </dl>
                            </div>
                            <div class="col-md-6">
                                <div class="row justify-content-center">
                                    <div class="img-fluid fa-border">
                                        <img src="{{ $businessAddress->file }}" width="300">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection
