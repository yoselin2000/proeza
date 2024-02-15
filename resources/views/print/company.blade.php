<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Company</title>

    <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">
</head>
<body>
    <div class="row justify-content-center pb-3">
        <h1>DATOS DE LA EMPRESA</h1>
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

    @foreach ($activity->companies as $company)
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        {{ $company->name }}
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-6">
                                <dl class="row">
                                    <dt class="col-4">Nombre</dt>
                                    <dd class="col-8">{{ $company->name }}</dd>
                                    <dt class="col-4">Cargo que desempeña</dt>
                                    <dd class="col-8">{{ $company->post }}</dd>
                                </dl>
                            </div>
                            <div class="col-6">
                                <dl class="row">
                                    <dt class="col-4">Antiguedad (años)</dt>
                                    <dd class="col-8">{{ $company->antiquity }}</dd>
                                    <dt class="col-4">Liquido pagable</dt>
                                    <dd class="col-8">{{ number_format($company->salary, 2, '.', ',') }}</dd>
                                </dl>
                            </div>
                            <div class="col-6">
                                <dl class="row">
                                    <dt class="col-4">Frecuencia</dt>
                                    <dd class="col-8">{{ $company->frequency }}</dd>
                                </dl>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach

</body>
</html>
