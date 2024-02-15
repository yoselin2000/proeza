<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Costs</title>

    <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">
</head>
<body>
    <div class="row justify-content-center pb-3">
        <h1>HOJA DE COSTOS</h1>
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
        @foreach ($activity->articles as $article)
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        Producto: {{ $article->name }} <br>
                        Rendimiento: {{ $article->performance }} <br>
                        Unidad: {{ $article->production }}
                    </div>
                    @if ($article->supplies->isNotEmpty())
                        <div class="card-body table-responsive">
                            <div class="row">
                                <div class="col">
                                    <div class="card">
                                        <table class="table table-bordered table-striped table-sm">
                                            <thead>
                                                <tr>
                                                    <th>Insumo</th>
                                                    <th>Cantidad</th>
                                                    <th>Unidad</th>
                                                    <th>Rendimiento</th>
                                                    <th>Precio unitario</th>
                                                    <th>Total</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($article->supplies as $supply)
                                                    <tr>
                                                        <td>{{ $supply->name }}</td>
                                                        <td>{{ $supply->cant }}</td>
                                                        <td>{{ $supply->unit }}</td>
                                                        <td>{{ $supply->performance }}</td>
                                                        <td>{{ number_format($supply->price, 2, '.', ',') }}</td>
                                                        <td>{{ number_format($supply->total, 2, '.', ',') }}</td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <th colspan="5">Total</th>
                                                    <th>{{ number_format($article->supplies->sum('total'), 2, '.', ',') }}</th>
                                                </tr>
                                                <tr>
                                                    <th colspan="5">Costo</th>
                                                    <th>{{ number_format($article->buys(), 2, '.', ',') }}</th>
                                                </tr>
                                                <tr>
                                                    <th colspan="5">Precio</th>
                                                    <th>{{ number_format($article->sale, 2, '.', ',') }}</th>
                                                </tr>
                                                <tr>
                                                    <th colspan="5">MB</th>
                                                    <th>{{ number_format($article->mb(), 2, '.', ',') }} %</th>
                                                </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        @endforeach
    </div>
</body>
</html>
