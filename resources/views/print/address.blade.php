<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">
</head>
<body>
    <div class="row justify-content-center pb-3">
        <h1>DIRECCIÓN Y CROQUIS</h1>
    </div>
    <div class="row justify-content-center m-0">
        <div class="col-2">
            <div class="row justify-content-center m-0">
                <img class="" src="{{ asset('dist/img/proeza.jpg') }}"  width="120">
            </div>
        </div>
        <div class="col-3">
            <dl class="row">
                <dt class="col-4">Ciudad:</dt>
                <dd class="col-8">
                    {{ $application->user->agency->city->name  }}
                </dd>
                <dt class="col-4">Sucursal:</dt>
                <dd class="col-8">
                    {{ $application->user->agency->name }}
                </dd>
                <dt class="col-4">Responsable:</dt>
                <dd class="col-8">
                    {{ $application->user->name }}
                </dd>
            </dl>
        </div>
        <div class="col-2">
            <dl class="row">
                <dt class="col-4">Fecha:</dt>
                <dd class="col-8">
                    {{ date('Y-m-d') ?? ' '}}
                </dd>
            </dl>
        </div>
    </div>

    @if ($participant->evaluation)
        @if ($participant->evaluation->homeAddress)
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h6><strong>Croquis de Domicilio</strong></h6>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-6">
                                    <dl class="row">
                                        <dt class="col-4">Tipo de Propiedad</dt>
                                        <dd class="col-8">{{ $participant->evaluation->homeAddress->property ?? ' '}}</dd>
                                        <dt class="col-4">Tiempo que reside en el lugar(meses)</dt>
                                        <dd class="col-8">{{ $participant->evaluation->homeAddress->time ?? ' '}}</dd>
                                        <dt class="col-4">Dir. Domicilio</dt>
                                        <dd class="col-8">{{ $participant->evaluation->homeAddress->direction ?? ' '}}</dd>
                                        <dt class="col-4">N°</dt>
                                        <dd class="col-8">{{ $participant->evaluation->homeAddress->number ?? ' '}}</dd>
                                        <dt class="col-4">Zona/Barrio</dt>
                                        <dd class="col-8">{{ $participant->evaluation->homeAddress->zone ?? ' '}}</dd>
                                        <dt class="col-4">Teléfono</dt>
                                        <dd class="col-8">{{ $participant->evaluation->homeAddress->mobile ?? ' '}}</dd>
                                        <dt class="col-4">Provincia/Municipio/Comunidad</dt>
                                        <dd class="col-8">{{ $participant->evaluation->homeAddress->province ?? ' '}}</dd>
                                        <dt class="col-4">Descripción</dt>
                                        <dd class="col-8">{{ $participant->evaluation->homeAddress->description?? ' '}}</dd>
                                    </dl>
                                </div>
                                <div class="col-6">
                                    <div class="row justify-content-center">
                                        <div class="img-fluid fa-border">
                                            <img src="{{ $participant->evaluation->homeAddress->file }}" width="300">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    @endif

    @if ($participant->evaluation)
        @foreach ($participant->evaluation->activities as $activity)
            @if ($activity->businessAddress)
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <strong>Croquis del Negocio</strong>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-6">
                                        <dl class="row">
                                            <dt class="col-4">Tipo de Propiedad</dt>
                                            <dd class="col-8">{{ $activity->businessAddress->property ?? ' '}}</dd>
                                            <dt class="col-4">Tiempo que reside en el lugar(meses)</dt>
                                            <dd class="col-8">{{ $activity->businessAddress->time ?? ' '}}</dd>
                                            <dt class="col-4">Dir. Domicilio</dt>
                                            <dd class="col-8">{{ $activity->businessAddress->direction ?? ' '}}</dd>
                                            <dt class="col-4">N°</dt>
                                            <dd class="col-8">{{ $activity->businessAddress->number ?? ' '}}</dd>
                                            <dt class="col-4">Zona/Barrio</dt>
                                            <dd class="col-8">{{ $activity->businessAddress->zone ?? ' '}}</dd>
                                            <dt class="col-4">Teléfono</dt>
                                            <dd class="col-8">{{ $activity->businessAddress->mobile ?? ' '}}</dd>
                                            <dt class="col-4">Provincia/Municipio/Comunidad</dt>
                                            <dd class="col-8">{{ $activity->businessAddress->province ?? ' '}}</dd>
                                            <dt class="col-4">Descripción</dt>
                                            <dd class="col-8">{{ $activity->businessAddress->description ?? ' '}}</dd>
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
        @endforeach
    @endif
</body>
</html>
