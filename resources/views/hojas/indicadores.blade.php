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
                    Datos a De la Familia
                </div>
                <div class="card-body p-0">
                    <div class="row">
                        <div class="col-md-12 table-responsive">
                            <table class="table table-bordered table-striped table-sm">
                                <thead>
                                    <tr>
                                        <th>Items</th>
                                        <th>Datos</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Activos Fijos</td>
                                        <td>{{ number_format($familyFixedAssets, 2, '.', ',') }}</td>
                                    </tr>
                                    <tr>
                                        <td>Pasivos</td>
                                        <td>{{ number_format($familyPassives, 2, '.', ',') }}</td>
                                    </tr>
                                    <tr>
                                        <td>Gastos Operativos</td>
                                        <td>{{ number_format($familyExpenses + $evaluation->familyPassives->sum('share'), 2, '.', ',') }}</td>
                                    </tr>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>Total</th>
                                        <th>{{ number_format($totalFamily, 2, '.', ',') }}</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-6">
            <div class="card">
                <div class="card-header">
                    Actividad Economica: {{ $activity->form }}
                </div>
                <div class="card-body p-0">
                    <div class="row">
                        <div class="col-md-12 table-responsive">
                            <table class="table table-bordered table-striped table-sm">
                                <thead>
                                    <tr>
                                        <th>Estado de Resultados</th>
                                        <th>Datos</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Activo Corriente</td>
                                        <td>{{ number_format( $activity->businessCurrentAssets->sum('amount'), 2, '.', ',') }}</td>
                                    </tr>
                                    <tr>
                                        <td>Activos Fijo</td>
                                        <td>{{ number_format($activity->businessFixedAssets->sum('amount'), 2, '.', ',') }}</td>
                                    </tr>
                                    <tr>
                                        <td>Pasivos</td>
                                        <td>{{number_format($activity->businessPassives->sum('balace'), 2, '.', ',') }}</td>
                                    </tr>
                                    <tr>
                                        <td>Gastos Operativo</td>
                                        <td>{{ number_format($activity->businessExpenses->sum('amount'), 2, '.', ',') }}</td>
                                    </tr>
                                    <tr>
                                        <td>Inventario</td>
                                        <td>{{ number_format($activity->inventories->sum('vipt'), 2, '.', ',') }}</td>
                                    </tr>
                                    @foreach ($activity->averageSales as $averageSale)
                                        <tr>
                                            <td>Total Ventas {{ $averageSale->type }}</td>
                                            <td>{{ number_format($averageSale->sales->sum('amount'), 2, '.', ',') }}</td>
                                        </tr>
                                    @endforeach
                                    <tr>
                                        @if ($activity->cash)
                                            <td>Detalle de Efectivo (Ventas diarias)</td>
                                            <td>{{ number_format($activity->cash->estimado(), 2, '.', ',') }}</td>
                                        @endif
                                    </tr>
                                    <tr>
                                        <td>Detalle de Compras Mes</td>
                                        <td>{{ number_format($activity->shoppings->sum('total'), 2, '.', ',') }}</td>
                                    </tr>
                                    <tr>
                                        <td>Costo Ventas (Produccion)</td>
                                        <td>{{ number_format($activity->costoVenta(), 2, '.', ',')}}
                                    </tr>
                                    <tr>
                                        <td>Pasivo a corto plazo</td>
                                        <td>
                                            @if($activity->debt)
                                                {{ number_format($activity->debt->shortTerm, 2, '.', ',') }}
                                            @else
                                                0.00
                                            @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Pasivo a largo plazo</td>
                                        <td>
                                            @if($activity->debt)
                                                {{ number_format($activity->debt->longTerm, 2, '.', ',') }}
                                            @else
                                                0.00
                                            @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Pago deudas</td>
                                        <td>{{ number_format($activity->businessPassives->sum('share'), 2, '.', ',') }}</td>
                                    </tr>
                                    <tr>
                                        <td>Ventas</td>
                                        <td>{{ number_format($activity->venta(), 2, '.', ',') }}</td>
                                    </tr>
                                    <tr>
                                        <td>Otros ingresos</td>
                                        <td>{{ number_format($activity->otrosIngresos(), 2, '.', ',') }}</td>
                                    </tr>
                                    <tr>
                                        <td>Total Activo Corriente</td>
                                        <td>{{ number_format( ($activity->inventories->sum('vipt')) + ($activity->businessCurrentAssets->sum('amount')), 2, '.', ',') }}</td>
                                    </tr>
                                    <tr>
                                        <td>Total activo del negocio</td>
                                        <td>{{ number_format(($activity->inventories->sum('vipt')+($activity->businessCurrentAssets->sum('amount')))+($activity->businessFixedAssets->sum('amount')), 2, '.', ',') }}</td>
                                    </tr>
                                    <tr>
                                        <td>Utilidad Bruta</td>
                                        <td>
                                            @if ($activity->form == "Comercio" || $activity->form == "Servicio")
                                                {{ number_format($activity->utilidadBruta() / 100, 2, '.', ',') }}
                                            @endif
                                            @if ($activity->form == "Produccion" || $activity->form == "Transporte")
                                                {{ number_format($activity->utilidadBruta(), 2, '.', ',') }}
                                            @endif
                                            @if ($activity->form == "Dependiente")
                                                {{ number_format($activity->utilidadBruta(), 2, '.', ',') }}
                                            @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Utilidad operativa</td>
                                        <td>
                                            @if ($activity->form == "Comercio" || $activity->form == "Servicio")
                                                {{ number_format($activity->utilidadOperativa() / 100, 2, '.', ',') }}
                                            @endif
                                            @if ($activity->form == "Produccion" || $activity->form == "Transporte")
                                                {{ number_format($activity->utilidadOperativa(), 2, '.', ',') }}
                                            @endif
                                            @if ($activity->form == "Dependiente")
                                                {{ number_format($activity->utilidadOperativa(), 2, '.', ',') }}
                                            @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Utilidad Neta</td>
                                        <td>{{ number_format($activity->utilidadNeta(), 2, '.', ',') }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-6">
            <div class="card">
                <div class="card-header">
                    Ventas
                </div>
                <div class="card-body p-0">
                    <div class="row">
                        <div class="col-md-12 table-responsive">
                            <table class="table table-bordered table-striped table-sm">
                                <thead>
                                    <tr>
                                        <th>Ventas</th>
                                        <th>Diario</th>
                                        <th>Mensual</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if ($activity->form == "Comercio" || $activity->form == "Servicio")
                                        @foreach ($activity->averageSales as $averageSale)
                                            <tr>
                                                <td>Total Ventas {{ $averageSale->type }}</td>
                                                <td>{{ number_format($averageSale->ventaDiaria(), 2, '.', ',') }}</td>
                                                <td>{{ number_format($averageSale->ventaMensual(), 2, '.', ',') }}</td>
                                            </tr>
                                        @endforeach
                                    @endif
                                    @if ($activity->form == "Produccion")
                                        @foreach ($activity->averageSales as $averageSale)
                                            <tr>
                                                <td>Total Ventas {{ $averageSale->type }}</td>
                                                <td>{{ number_format($averageSale->ventaDiaria(), 2, '.', ',') }}</td>
                                                <td>{{ number_format($averageSale->ventaMensual(), 2, '.', ',') }}</td>
                                            </tr>
                                        @endforeach
                                    @endif
                                    @if ($activity->form == "Transporte")
                                        @foreach ($activity->vehicles as $vehicle)
                                            @foreach ($vehicle->averageSales as $averageSale)
                                                <tr>
                                                    <td>Total Ventas {{ $averageSale->type }}</td>
                                                    <td>{{ number_format($averageSale->ventaDiaria(), 2, '.', ',') }}</td>
                                                    <td>{{ number_format($averageSale->ventaMensual(), 2, '.', ',') }}</td>
                                                </tr>
                                            @endforeach
                                        @endforeach
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-6">
            <div class="card">
                <div class="card-header">
                    Consolidado
                </div>
                <div class="card-body p-0">
                    <div class="row">
                        <div class="col-md-12 table-responsive">
                            @php
                                $totalAssets = $familyFixedAssets;
                                $totalPassives = $familyPassives;
                                $totalExpenses = $familyExpenses;
                            @endphp
                            @foreach ($activities as $activity)
                                @php
                                    $totalAssets += $activity->businessFixedAssets->sum('amount');
                                    $totalPassives += $activity->businessPassives->sum('balace');
                                    $totalExpenses += $activity->businessExpenses->sum('amount');
                                @endphp
                            @endforeach
                            <table class="table table-bordered table-striped table-sm">
                                <thead>
                                    <tr>
                                        <th>Actividad Economica</th>
                                        <th>Activos</th>
                                        <th>Pasivos</th>
                                        <th>Gastos Operativos</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Actividad de la familia</td>
                                        <td>{{ number_format($familyFixedAssets, 2, '.', ',') }}</td>
                                        <td>{{ number_format($familyPassives, 2, '.', ',') }}</td>
                                        <td>{{ number_format($familyExpenses, 2, '.', ',') }}</td>
                                    </tr>
                                    @foreach ($activities as $activity)
                                        <tr>
                                            <td>{{ $activity->form }}</td>
                                            <td>{{ number_format($activity->businessFixedAssets->sum('amount'), 2, '.', ',') }}</td>
                                            <td>{{ number_format($activity->businessPassives->sum('balace'), 2, '.', ',') }}</td>
                                            <td>{{ number_format($activity->businessExpenses->sum('amount'), 2, '.', ',') }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>Total</th>
                                        <th>{{ number_format($totalAssets, 2, '.', ',') }}</th>
                                        <th>{{ number_format($totalPassives, 2, '.', ',') }}</th>
                                        <th>{{ number_format($totalExpenses, 2, '.', ',') }}</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @if ($activity = $evaluation->activities->first())
            <div class="col-6">
                <div class="card">
                    <div class="card-header">
                        Indicadores Financieros
                    </div>
                    <div class="card-body p-0">
                        <div class="row">
                            <div class="col-md-12 table-responsive">
                                <table class="table table-bordered table-striped table-sm">
                                    <thead>
                                        <tr>
                                            <th>Indicadores Financieros de Parametro</th>
                                            <th>Valor Indicador</th>
                                            <th>Parametro</th>
                                            <th>Cumple</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            @php
                                                $solvencia = $activity->Solvencia();
                                            @endphp
                                            <td>De solvencia</td>
                                            <td>{{ number_format($activity->Solvencia(), 2, '.', ',') }}</td>
                                            <td>>= 1,0</td>
                                            <td>
                                                @if (isset($solvencia) && $solvencia >= 1)
                                                    SI CUMPLE
                                                @else
                                                    NO CUMPLE
                                                @endif
                                            </td>
                                        </tr>
                                        @php
                                            $capacidadPago = $activity->CapacidadPago();
                                        @endphp
                                        <tr>
                                            <td>De capacidad de pago</td>
                                            <td>{{ number_format($activity->CapacidadPago(), 2, '.', ',') }}</td>
                                            <td>>= 1,0</td>
                                            <td>
                                                @if (isset($capacidadPago) && $capacidadPago >= 1)
                                                    SI CUMPLE
                                                @else
                                                    NO CUMPLE
                                                @endif
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </div>

    @if ($activity = $evaluation->activities->first())
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        Otros Indicadores
                    </div>
                    <div class="card-body p-0">
                        <div class="row">
                            <div class="col-md-12 table-responsive">
                                <table class="table table-bordered table-striped table-sm">
                                    <thead>
                                        <tr>
                                            <th>Nombre</th>
                                            <th>Formula</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Liquidez a corto plazo</td>
                                            <td>{{number_format($activity->Liquidez(), 2, '.', ',')}}</td>
                                        </tr>
                                        <tr>
                                            <td>Prueba acida</td>
                                            <td>{{number_format($activity->pruebaAcida(), 2, '.', ',')}}</td>
                                        </tr>
                                        <tr>
                                            <td>Endeudamiento negocio</td>
                                            <td>{{number_format($activity->eNegocio(), 2, '.', ',')}}</td>
                                        </tr>
                                        <tr>
                                            <td>Endeudamiento a corto plazo</td>
                                            <td>{{number_format($activity->eCortoPlazo(), 2, '.', ',')}}</td>
                                        </tr>
                                        <tr>
                                            <td>Endeudamiento a largo plazo</td>
                                            <td>{{ number_format($activity->eLargoPlazo(), 2, '.', ',') }}</td>
                                        </tr>
                                        <tr>
                                            <td>Margen de Utilidad Bruta (MUB)</td>
                                            <td>
                                                @if ($activity->form == "Comercio" || $activity->form == "Servicio")
                                                    {{ number_format($activity->mbpTotal(), 2, '.', ',') }} %
                                                @endif
                                                @if ($activity->form == "Produccion")
                                                    {{ number_format($activity->mbpTotal() * 100, 2, '.', ',') }} %
                                                @endif
                                                @if ($activity->form == "Transporte")
                                                    {{ number_format($activity->mbTransport() * 100, 2, '.', ',') }} %
                                                @endif
                                                @if ($activity->form == "Dependiente")
                                                    {{ number_format($activity->mbpTotal(), 2, '.', ',') }} %
                                                @endif
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Margen de Utilidad Operativa (MUO)</td>
                                            <td>{{number_format($activity->MUO(), 2, '.', ',')}} %</td>
                                        </tr>
                                        <tr>
                                            <td>Margen de Utilidad Neta (MUN)</td>
                                            <td>{{number_format($activity->MUN(), 2, '.', ',')}} %</td>
                                        </tr>
                                        <tr>
                                            <td>Rel. gastos fams. / Utilidad Operativa</td>
                                            <td>{{number_format($activity->RelUO(), 2, '.', ',')}} %</td>
                                        </tr>
                                        <tr>
                                            <td>Rel otro Ingresos / Utilidad Neta</td>
                                            <td>{{number_format($activity->RelUN(), 2, '.', ',')}} %</td>
                                        </tr>
                                        <tr>
                                            <td>ROA</td>
                                            <td>{{number_format($activity->ROA(), 2, '.', ',')}} %</td>
                                        </tr>
                                        <tr>
                                            <td>ROE</td>
                                            <td>{{number_format($activity->ROE(), 2, '.', ',')}} %</td>
                                        </tr>
                                        <tr>
                                            <td>Rotacion inventario mensual</td>
                                            <td>{{number_format($activity->RIM(), 2, '.', ',')}} %</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
@endsection
