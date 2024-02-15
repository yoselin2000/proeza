<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sales</title>

    <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">
</head>
<body>
    <div class="row justify-content-center pb-3">
        <h1>DETALLE DE VENTAS</h1>
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

    @if ($activity->averageSales->isNotEmpty())
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">

                </div>
                <div class="card-body">
                    <div class="row">
                        @foreach ($activity->averageSales as $averageSale)
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-header">
                                        {{ $averageSale->type }}
                                    </div>
                                    <div class="card-body p-0 table-responsive">
                                        <table class="table table-bordered table-striped table-sm">
                                            <thead>
                                                <tr>
                                                    @foreach ($averageSale->sales as $sale)
                                                        <th>{{ $sale->item }}</th>
                                                    @endforeach
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    @foreach ($averageSale->sales as $sale)
                                                        <td>{{ number_format($sale->amount, 2, '.', ',') }}</td>
                                                    @endforeach
                                                </tr>
                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <th colspan="{{ $averageSale->sales->count()-1 }}">Ventas {{ $averageSale->type }}</th>
                                                    <th>{{ number_format($averageSale->sales->sum('amount'), 2, '.', ',') }}</th>
                                                </tr>
                                            </tfoot>
                                        </table>
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

    @if ($activity->cash)
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        Detalle de Efectivo
                        @php
                            $cash = $activity->cash;
                        @endphp
                    </div>
                    <div class="card-body p-0 table-responsive">
                        <table class="table table-bordered table-striped table-sm">
                            <thead>
                                <tr>
                                    <th>Fecha de evaluacion</th>
                                    <th>Fecha Ultima Compra</th>
                                    <th>Efectivo Estimado</th>
                                    <th>Efectivo Real</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if ($cash)
                                    <tr>
                                        <td>{{ $cash->assessment }}</td>
                                        <td>{{ $cash->buys }}</td>
                                        <td>{{ $cash->estimado() }}</td>
                                        <td>{{ number_format($cash->real, 2, '.', ',') }}</td>
                                    </tr>
                                    <tr>
                                        <th colspan="3">Ventas Diarias</th>
                                        <th></th>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    @endif

    @if ($activity->shoppings->isNotEmpty())
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        Detalle de Compras
                    </div>
                    <div class="card-body p-0 table-responsive">
                        <table class="table table-bordered table-striped table-sm">
                            <thead>
                                <tr>
                                    <th>Producto</th>
                                    <th>Cantidad</th>
                                    <th>Unidad</th>
                                    <th>Frecuencia</th>
                                    <th>Precio Compra</th>
                                    <th>Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($activity->shoppings as $shopping)
                                    <tr>
                                        <td>{{ $shopping->name }}</td>
                                        <td>{{ $shopping->amount }}</td>
                                        <td>{{ $shopping->unit }}</td>
                                        <td>{{ $shopping->frecuency }}</td>
                                        <td>{{ number_format( $shopping->buys, 2, '.', ',') }}</td>
                                        <td>{{ number_format($shopping->total, 2, '.', ',') }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th colspan="5">Compras Mes</th>
                                    <th>{{ number_format($activity->shoppings->sum('total'), 2, '.', ',') }}</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    @endif

    @if ($activity->saleDetails ->isNotEmpty())
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        Detalle de productos
                    </div>
                    <div class="card-body p-0 table-responsive">
                        <table class="table table-bordered table-striped table-sm">
                            <thead>
                                <tr>
                                    <th>
                                        @if ($activity->form == "Produccion")
                                            Articulo
                                        @else
                                            Producto
                                        @endif
                                    </th>
                                    <th>Cantidad</th>
                                    <th>Frecuencia</th>
                                    <th>MBP</th>
                                    <th>Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($activity->saleDetails as $saleDetail)
                                    <tr>
                                        <td>
                                            @if ($activity->form == "Produccion")
                                                {{ $saleDetail->article->name ?? '' }}
                                            @else
                                                {{ $saleDetail->inventory->name ?? '' }}
                                            @endif
                                        </td>
                                        <td>{{ $saleDetail->cant }}</td>
                                        <td>{{ $saleDetail->frecuency }}</td>
                                        <td>{{ number_format($saleDetail->mbp(), 2, '.', ',') }} %</td>
                                        <td>{{ $saleDetail->total }}</td>
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
