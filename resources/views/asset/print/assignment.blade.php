<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>asignacion</title>

    <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">
</head>
<body>

    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-body p-0 table-responsive">
                    <table class="table table-bordered table-striped table-sm">
                        <tbody>
                            <tr>
                                <td rowspan="4">
                                    <div class="row justify-content-center p-4">
                                        <img class="" src="{{ asset('dist/img/proeza.jpg') }}"  width="120">
                                    </div>
                                </td>
                                <td colspan="4" class="text-center">
                                    <dt>ACTA DE ENTREGA</dt>
                                </td>
                            </tr>
                            <tr>
                                <td class="text-center">
                                    <dt>JEFATURA</dt>
                                </td class="text-center">
                                <td colspan="3" class="text-center">
                                    <dt> {{ $assignment->assignedByUser->roles->pluck('post')->implode(', ') }} </dt>
                                </td>
                            </tr>
                            <tr>
                                <td class="text-center">
                                    <dt>CÓDIGO</dt>
                                </td>
                                <td class="text-center" name="assigned_by">
                                    <dt> {{ $assignment->assignedByUser->roles->pluck('acronym')->implode(', ') }}/AE/{{ date('Y') }} </dt>
                                </td>
                                <td class="text-center">
                                    <dt>VERSIÓN</dt>
                                </td>
                                <td class="text-center">
                                    <dt>02</dt>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
                <dt class="row justify-content-center">ACTA DE ENTREGA</dt>
                <dt class="row justify-content-center">No 0{{ $assignment->cont }}/{{ date('Y') }}</dt>
            <div class="card-body">
                <div class="row">
                    <div class="col-12">
                        <dl class="row">
                            <dt class="col-2">Para: </dt>
                            <dd class="col-10">{{ $assignment->assignedToUser->name }}</dd>
                            <dt class="col-2"></dt>
                            <dd class="col-10">{{ $assignment->assignedToUser->roles->pluck('post')->implode(', ') }} Sucursal {{ $assignment->assignedToUser->agency->name}}</dd>

                            <dt class="col-2">De: </dt>
                            <dd class="col-10">{{ $assignment->assignedByUser->name }}</dd>
                            <dt class="col-2"></dt>
                            <dd class="col-10">{{ $assignment->assignedByUser->roles->pluck('post')->implode(', ') }}</dd>

                            <dt class="col-2">Lugar y fecha: </dt>
                            <dd class="col-10">{{ $assignment->assignedByUser->agency->city->name }}, {{ date('Y-m-d') ?? ' ' }}</dd>
                        </dl>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <dl class="row">
                            <dd class="col-12">Mediante el siguiente se hace la entrega de los equipos computacionales destinados a facilitar el desarrollo de sus actividades. A traves de este comunicado, formalizamos la entrega de los siguientes equipos:</dd>
                        </dl>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-body p-0 table-responsive">
                    <table class="table table-bordered table-striped table-sm">
                        <thead>
                            <tr>
                                <th>Equipo</th>
                                <th>Marca</th>
                                <th>Modelo</th>
                                <th>SN</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($assignment->elementComponents as $elementComponent)
                            <tr>
                                <td>{{ $elementComponent->companyElement->name }}</td>
                                <td>{{ $elementComponent->brand }}</td>
                                <td>{{ $elementComponent->model }}</td>
                                <td>{{ $elementComponent->SN }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="card-body">
            <div class="row">
                <div class="col-12">
                    <dl class="row">
                        <dt class="col-12">Responsabilidades</dt>
                        <dd class="col-12">Le solicitamos que tome en cuenta las siguientes pautas con respecto al uso y cuidado del equipo:</dd>
                        <dd class="col-10">
                            <strong> Uso apropiado: </strong>
                            El equipo debe ser utilizado únicamente para fines laborales y en concordancia con las políticas y directrices de seguridad de la empresa.
                        </dd>
                        <dd class="col-10">
                            <strong> Mantenimiento: </strong>
                            Es su responsabilidad mntener el equipo en condiciones óptimas. Evite exponerlo a condiciones adversas, como humedad, polvo o temperaturas extremas.
                        </dd>
                        <dd class="col-10">
                            <strong>Seguridad:</strong>
                            El equipo es asignado a usted personalmente. Por lo tanto, es importante que tome las medidas necesarias para protegerlo contra robos y daños.
                        </dd>
                        <dd class="col-10">
                            <strong>Actualizaciones y software: </strong>
                            Si requiere asistencia con actualizaciones de software o problemas técnicos, por favor contacte con la Jefatura Nacional de Tecnología e Innovación Digital.
                        </dd>
                    </dl>
                </div>
            </div>

            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>

            <div class="row">
                <div class="col-12">
                    <hr class="my-4">
                    <div class="container-fluid">
                        <div class="row justify-content-center">
                            <div class="col-4 text-center">
                                <dt>Área de entrega</dt>
                            </div>
                            <div class="col-4 text-center">
                                <dt>V°B°</dt>
                            </div>
                            <div class="col-4 text-center">
                                <dt>Recepción</dt>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </div>
</body>
</html>
