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
        <h1>SOLICITUD DE PRÉSTAMO</h1>
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

    @foreach ($application->participants as $participant)
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <strong>Datos del {{ $participant->category->name }}</strong>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-4">
                                <dl class="row">
                                    <dt class="col-6">Nombre(s) y Apellido(s)</dt>
                                    <dd class="col-6">{{ $participant->client->lastName }} {{ $participant->client->secondLastName }} {{ $participant->client->name }} {{ $participant->client->thirdLastName }}</dd>
                                    <dt class="col-6">Nacionalidad</dt>
                                    <dd class="col-6">{{ $participant->client->nacionality }}</dd>
                                    <dt class="col-6">Sexo</dt>
                                    <dd class="col-6">{{ $participant->client->gender }}</dd>
                                    <dt class="col-6">Teléfono Movil</dt>
                                    <dd class="col-6">{{ $participant->evaluation->mobile ?? ' '}}</dd>
                                </dl>
                            </div>
                            <div class="col-4">
                                <dl class="row">
                                    <dt class="col-6">Doc. de Identidad</dt>
                                    <dd class="col-6">{{ $participant->client->identification }}</dd>
                                    <dt class="col-6">Fecha de nacimiento</dt>
                                    <dd class="col-6">{{ $participant->client->birth }} </dd>
                                    <dt class="col-6">Estado Civil</dt>
                                    <dd class="col-6">{{ $participant->evaluation->civil ?? ' ' }}</dd>
                                    <dt class="col-6">Telefono Fijo</dt>
                                    <dd class="col-6">{{ $participant->evaluation->landline ?? ' ' }}</dd>
                                    <dt class="col-6">Fecha de Solicitud</dt>
                                    <dd class="col-6">{{ $participant->application->created_at->format('Y-m-d') }}</dd>
                                </dl>
                            </div>
                            <div class="col-4">
                                <dl class="row">
                                    <dt class="col-6">N° de Documento</dt>
                                    <dd class="col-6">{{ $participant->client->number }} - {{ $participant->client->complement }} {{ $participant->client->extension }}</dd>
                                    <dt class="col-6">Edad</dt>
                                    <dd class="col-6">{{ $participant->client->age }}</dd>
                                    <dt class="col-6">Situacion Laboral</dt>
                                    <dd class="col-6">{{ $participant->evaluation->employment ?? ' ' }}</dd>
                                    @if ($participant->evaluation)
                                    <dt class="col-6">Fecha de Evalucación</dt>
                                    <dd class="col-6">{{ $participant->evaluation->created_at->format('Y-m-d') }}</dd>
                                    @else
                                    @endif

                                </dl>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            @if ($participant->evaluation)
                @foreach ($participant->evaluation->references as $reference)
                    <div class="col">
                        <div class="card">
                                <div class="card-header">
                                    <h6><strong>Referencia {{ $reference->type }}</strong></h6>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-6">
                                            <dl class="row">
                                                <dt class="col-6">Nombre(s)</dt>
                                                <dd class="col-6">{{ $reference->name }}</dd>
                                                <dt class="col-6">Dirección</dt>
                                                <dd class="col-6">{{ $reference->address }}</dd>
                                            </dl>
                                        </div>
                                        <div class="col-6">
                                            <dl class="row">
                                                <dt class="col-6">Vínculo</dt>
                                                <dd class="col-6">{{ $reference->type }}</dd>
                                                <dt class="col-6">Teléfono Móvil</dt>
                                                <dd class="col-6">{{ $reference->mobile }}</dd>
                                            </dl>
                                        </div>
                                    </div>
                                </div>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
        <div class="row">
            @if ($participant->evaluation)
                @foreach ($participant->evaluation->activities as $activity)
                    <div class="col">
                        <div class="card">
                            <div class="card-header">
                                <h6><strong>Actividad Primaria</strong></h6>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col">
                                        <dl class="row">
                                            <dt class="col-6">CAEDEC Actividad Primaria</dt>
                                            <dd class="col-6">{{ $activity->caedec->code}}.- {{ $activity->caedec->heading}} {{ $activity->caedec->description}}</dd>
                                            <dt class="col-6">Actividad Especifica</dt>
                                            <dd class="col-6">{{ $activity->specific }}</dd>
                                        </dl>
                                    </div>
                                    <div class="col">
                                        <dl class="row">
                                            <dt class="col-6">Profesión/Ocupación</dt>
                                            <dd class="col-6">{{ $activity->profession }}</dd>
                                            <dt class="col-6">Realizada por</dt>
                                            <dd class="col-6">{{ $activity->responsable }}</dd>
                                            <dt class="col-6">Experiencia en el Rubro (meses)</dt>
                                            <dd class="col-6">{{ $activity->experience }}</dd>
                                        </dl>
                                    </div>
                                    <div class="col">
                                        <dl class="row">
                                            <dt class="col-6">Antiguedad del Negocio (meses)</dt>
                                            <dd class="col-6">{{ $activity->antiquity }} </dd>
                                            <dt class="col-6">Propiedad del puesto y/o Lugar</dt>
                                            <dd class="col-6">{{ $activity->property}}</dd>
                                        </dl>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
    @endforeach

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h6><strong>Datos del Prestamo</strong></h6>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-6">
                            <dl class="row">
                                <dt class="col-4">Monto</dt>
                                <dd class="col-8">{{ $application->amount ?? ' '}}</dd>
                                <dt class="col-4">Plazo</dt>
                                <dd class="col-8">{{ $application->term ?? ' '}}</dd>
                                <dt class="col-4">Frecuencia</dt>
                                <dd class="col-8">{{ $application->frequency ?? ' '}}</dd>
                            </dl>
                        </div>
                        <div class="col-6">
                            <dl class="row">
                                <dt class="col-6">Tipo de Cuota</dt>
                                <dd class="col-6">{{ $application->feeType ?? ' '}}</dd>
                                <dt class="col-6">Destino de Crédito</dt>
                                <dd class="col-6">{{ $application->destination->name ?? ' '}}</dd>
                                <dt class="col-6">Detalle Especifico del Destino</dt>
                                <dd class="col-6">{{ $application->specific ?? ' '}}</dd>
                            </dl>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
