<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Transport</title>

    <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">
</head>
<body>
    <div class="row justify-content-center pb-3">
        <h1>HOJA DE TRANSPORTE</h1>
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

    @foreach ($activity->vehicles as $vehicle)
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        Datos del Vehiculo
                    </div>
                    <div class="card-header">
                        <div class="row">
                            <div class="col-2">
                                <dl class="row">
                                    <dt class="col-4">Tipo</dt>
                                    <dd class="col-8">{{ $vehicle->type }}</dd>
                                    <dt class="col-4">Estado</dt>
                                    <dd class="col-8">{{ $vehicle->state }}</dd>
                                </dl>
                            </div>
                            <div class="col-2">
                                <dl class="row">
                                    <dt class="col-4">Marca</dt>
                                    <dd class="col-8">{{ $vehicle->brand }}</dd>
                                    <dt class="col-4">Placa</dt>
                                    <dd class="col-8">{{ $vehicle->plate }}</dd>
                                </dl>
                            </div>
                            <div class="col-2">
                                <dl class="row">
                                    <dt class="col-6">Color</dt>
                                    <dd class="col-6">{{ $vehicle->color }}</dd>
                                    <dt class="col-6">Cilindrada</dt>
                                    <dd class="col-6">{{ $vehicle->cylinder }}</dd>
                                </dl>
                            </div>
                            <div class="col-2">
                                <dl class="row">
                                    <dt class="col-7">Combustible</dt>
                                    <dd class="col-5">{{ $vehicle->fuel }}</dd>
                                    <dt class="col-7">Año de fabricacion</dt>
                                    <dd class="col-5">{{ $vehicle->manufacturing }}</dd>
                                </dl>
                            </div>
                            <div class="col-2">
                                <dl class="row">
                                    <dt class="col-7">soat</dt>
                                    <dd class="col-5">{{ $vehicle->soat }}</dd>
                                    <dt class="col-7">Combustible</dt>
                                    <dd class="col-5">{{ $vehicle->fuel }}</dd>
                                </dl>
                            </div>
                            <div class="col-2">
                                <dl class="row">
                                    <dt class="col-6">Año de fabricacion</dt>
                                    <dd class="col-6">{{ $vehicle->manufacturing }}</dd>
                                    <dt class="col-6">soat</dt>
                                    <dd class="col-6">{{ $vehicle->soat }}</dd>
                                </dl>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            @if ($vehicle->components->isNotEmpty())
                <div class="col">
                    <div class="card">
                        <div class="card-header">
                            Estado General
                        </div>
                        <div class="card-body p-0 table-responsive">
                            <table class="table table-bordered table-striped table-sm">
                                <thead>
                                    <tr>
                                        <th>Componente</th>
                                        <th>Estado</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($vehicle->components as $component)
                                        <tr>
                                            <td>{{ $component->componentDetail->name }}</td>
                                            <td>{{ $component->state }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            @endif

            @if ($vehicle->transport)
                @if ($vehicle->transport->transportDetails->isNotEmpty())
                    <div class="col">
                        <div class="card">
                            <div class="card-header">
                                @if ($vehicle->transport)
                                    @php
                                        $transport = $vehicle->transport;
                                    @endphp
                                    {{ $transport->type }}
                                @else
                                    Ingresos
                                @endif
                            </div>
                            <div class="card-body p-0 table-responsive">
                                <table class="table table-bordered table-striped table-sm">
                                    <thead>
                                        <tr>
                                            <th>Detalle</th>
                                            <th>Numero de Carga</th>
                                            <th>Unidad</th>
                                            <th>Numero de viajes</th>
                                            <th>Frecuencia</th>
                                            <th>Precio</th>
                                            <th>Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($transport->transportDetails as $transportDetail)
                                            <tr>
                                                <td>{{ $transportDetail->detail }}</td>
                                                <td>{{ $transportDetail->num }}</td>
                                                <td>{{ $transportDetail->unit }}</td>
                                                <td>{{ $transportDetail->number }}</td>
                                                <td>{{ $transportDetail->frequency }}</td>
                                                <td>{{ number_format($transportDetail->price, 2, '.', ',') }}</td>
                                                <td>{{ number_format($transportDetail->total, 2, '.', ',') }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th colspan="5">Total</th>
                                            <th>
                                                @if ($vehicle->transport && $vehicle->transport->transportDetails)
                                                    {{ number_format($vehicle->transport->transportDetails->sum('price'), 2, '.', ',') }}
                                                @endif
                                            </th>
                                            <th>
                                                @if ($vehicle->transport && $vehicle->transport->transportDetails)
                                                    {{ number_format($vehicle->transport->transportDetails->sum('total'), 2, '.', ',') }}
                                                @endif
                                            </th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                @endif
            @endif
        </div>


        @if ($vehicle->maintenances->isNotEmpty())
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            Costos
                        </div>
                        <div class="card-body p-0 table-responsive">
                            <table class="table table-bordered table-striped table-sm">
                                <thead>
                                    <tr>
                                        <th>Detalle de mantenimiento</th>
                                        <th>Detalle</th>
                                        <th>Cantidad</th>
                                        <th>Precio</th>
                                        <th>Total</th>
                                        <th>Frecuencia</th>
                                        <th>Monto mensual</th>
                                        <th>Monto anual</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($vehicle->maintenances as $maintenance)
                                        <tr>
                                            <td>{{ $maintenance->maintenanceDetail->name }}</td>
                                            <td>{{ $maintenance->detail }}</td>
                                            <td>{{ $maintenance->cant }}</td>
                                            <td>{{ number_format($maintenance->price, 2, '.', ',') }}</td>
                                            <td>{{ $maintenance->total }}</td>
                                            <td>{{ $maintenance->frequency }}</td>
                                            <td>{{ number_format($maintenance->month, 2, '.', ',') }}</td>
                                            <td>{{ number_format($maintenance->year, 2, '.', ',') }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th colspan="4">Total</th>
                                        <th>{{ number_format($vehicle->maintenances->sum('total'), 2, '.', ',') }}</th>
                                        <th></th>
                                        <th>{{ number_format($vehicle->maintenances->sum('month'), 2, '.', ',') }}</th>
                                        <th>{{ number_format($vehicle->maintenances->sum('year'), 2, '.', ',') }}</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        @endif

        @if ($vehicle->averageSales->isNotEmpty())
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        Ventas
                    </div>
                    <div class="card-body">
                        <div class="row">
                            @foreach ($vehicle->averageSales as $averageSale)
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
    @endforeach
</body>
</html>
