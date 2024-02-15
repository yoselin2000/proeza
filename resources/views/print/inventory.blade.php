<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Inventory</title>

    <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">
</head>
<body>
    <div class="row justify-content-center pb-3">
        <h1>INVENTARIO</h1>
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

    @if ($activity->inventories->isNotEmpty())
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        Inventarios
                    </div>
                    <div class="card-body p-0 table-responsive">
                        <table class="table table-bordered table-striped table-sm">
                            <thead>
                                <tr>
                                    <th>Cantidad</th>
                                    <th>Unidad</th>
                                    <th>Tipo</th>
                                    <th>Producto</th>
                                    <th>Precio de Compra</th>
                                    <th>Precio de Venta</th>
                                    <th>MB</th>
                                    <th>Valor</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($activity->inventories as $inventory)
                                    <tr>
                                        <td>{{ $inventory->amount }}</td>
                                        <td>{{ $inventory->unit }}</td>
                                        <td>{{ $inventory->type }}</td>
                                        <td>{{ $inventory->name }}</td>
                                        <td>{{ number_format($inventory->buys, 2, '.', ',') }}</td>
                                        <td>{{ number_format($inventory->sale, 2, '.', ',') }}</td>
                                        <td>{{ $inventory->mb }} %</td>
                                        <td>{{ number_format($inventory->vipt, 2, '.', ',') }}</td>
                                        </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th colspan="4">Total</th>
                                    <th>{{ number_format($activity->inventories->sum('buys'), 2, '.', ',') }}</th>
                                    <th>{{ number_format($activity->inventories->sum('sale'), 2, '.', ',') }}</th>
                                    <th>{{ $activity->mbTotal() }} %</th>
                                    <th>{{ number_format($activity->inventories->sum('vipt'), 2, '.', ',') }}</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    @endif
</body>
</html>
