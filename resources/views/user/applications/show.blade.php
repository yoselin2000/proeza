@extends('layouts.app')
@section('title')
    <div class="row">
        <h1 class="m-0">Participantes</h1>
        @if (!$application->approved && !$application->rejected)
            @can('participants.store')
                <ol class="breadcrumb float-sm-right pr-1">
                    <button type="button" class="btn btn-success btn-xs" data-toggle="modal" data-target="#participantCreate"><i class="fas fa-plus-circle"></i></button>
                </ol>
                @include('credit.participants.create')
            @endcan
        @endif
        <div class="btn-group" role="group" aria-label="Button group">
            <form action="{{ route('prints.solicitud', $application->id) }}" method="GET">
                <button class="btn btn-info btn-xs" type="submit"><i>Solicitud</i></button>
            </form>
        </div>
    </div>
@endsection
@section('browser')
    <li class="breadcrumb-item"><a href="{{ route('home') }}">inicio</a></li>
    <li class="breadcrumb-item">solicitud</li>
@endsection
@section('content')
    @include('option.confirmation')
    {{-- Revision --}}
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    Datos de Revision
                </div>
                <div class="card-body">
                    @if ($application->observeds->count() > 0)
                        <h5 class="card-title"><strong>Observaciones</strong></h5><br>
                        @foreach ($application->observeds as $observed)
                            <p>
                                {{ $observed->description }}
                            </p>
                        @endforeach
                    @endif
                    @if ($application->rejected)
                        <h5 class="card-title"><strong>Rechazo</strong></h5><br>
                        <p>
                            {{ $application->rejected->description }}
                        </p>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    Datos de solicitud
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <dl class="row">
                                <dt class="col-md-4">Monto</dt>
                                <dd class="col-md-8">{{ number_format($application->amount ?? ' ', 2, '.', ',')}}</dd>
                                <dt class="col-md-4">Plazo</dt>
                                <dd class="col-md-8">{{ $application->term ?? ' '}}</dd>
                                <dt class="col-md-4">Frecuencia</dt>
                                <dd class="col-md-8">{{ $application->frequency ?? ' '}}</dd>
                            </dl>
                        </div>
                        <div class="col-md-6">
                            <dl class="row">
                                <dt class="col-md-6">Tipo de Cuota</dt>
                                <dd class="col-md-6">{{ $application->feeType ?? ' '}}</dd>
                                <dt class="col-md-6">Destino de Crédito</dt>
                                <dd class="col-md-6">{{ $application->destination->name ?? ' '}}</dd>
                                <dt class="col-md-6">Detalle Especifico del Destino</dt>
                                <dd class="col-md-6">{{ $application->specific ?? ' '}}</dd>
                            </dl>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @foreach ($application->participants as $participant)
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        {{ $participant->category->name }}
                        <div class="btn-group" role="group" aria-label="Button group">
                            @if (!$application->approved && !$application->rejected)
                                @can('participants.update')
                                    <button type="button" class="btn btn-warning btn-xs" data-toggle="modal" data-target="#participantEdit{{ $participant->id }}"><i class="fas fa-pen"></i></button>
                                    @include('credit.participants.edit')
                                @endcan
                                @can('participants.destroy')
                                    <button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#participantDelete{{ $participant->id }}"><i class="fas fa-trash-alt"></i></button>
                                    @include('credit.participants.delete')
                                @endcan
                            @endif
                        </div>
                        <div class="btn-group" role="group" aria-label="Button group">
                            @if ($participant->evaluation)
                                <form action="{{ route('hoja1.show', $participant->evaluation->id) }}" method="GET">
                                    <button class="btn btn-primary btn-xs" type="submit">Datos Cliente</button>
                                </form>
                                <form action="{{ route('hoja2.show', $participant->evaluation->id) }}" method="GET">
                                    <button class="btn btn-primary btn-xs" type="submit">D.P.</button>
                                </form>
                                @if ($participant->evaluation->activities->first())
                                    <form action="{{ route('indicadores.show', $participant->evaluation->id) }}" method="GET">
                                        <button class="btn btn-primary btn-xs" type="submit">Indicadores</button>
                                    </form>
                                @endif
                            @else
                                @if (!$application->approved && !$application->rejected)
                                    @can('evaluations.store')
                                        <button type="button" class="btn btn-success btn-xs" data-toggle="modal" data-target="#evaluationCreate"><i class="fas fa-plus-circle"></i></button>
                                        @include('credit.evaluations.create')
                                    @endcan
                                @endif
                            @endif
                        </div>
                        <div class="btn-group" role="group" aria-label="Button group">
                            <form action="{{ route('prints.address', $participant->id) }}" method="GET">
                                <button class="btn btn-info btn-xs" type="submit"><i>Croquis</i></button>
                            </form>
                            <form action="{{ route('prints.statement', $participant->id) }}" method="GET">
                                <button class="btn btn-info btn-xs" type="submit"><i>Declaración Patrimonial</i></button>
                            </form>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4">
                                <dl class="row">
                                    <dt class="col-md-4">Nombre</dt>
                                    <dd class="col-md-8">{{ $participant->client->lastName }} {{ $participant->client->secondLastName }} {{ $participant->client->name }} {{ $participant->client->thirdLastName }}</dd>
                                    <dt class="col-md-4">Sexo</dt>
                                    <dd class="col-md-8">{{ $participant->client->gender }}</dd>
                                    <dt class="col-md-4">Nacionalidad</dt>
                                    <dd class="col-md-8">{{ $participant->client->nacionality }}</dd>
                                </dl>
                            </div>
                            <div class="col-md-4">
                                <dl class="row">
                                    <dt class="col-md-4">Tipo de Documento</dt>
                                    <dd class="col-md-8">{{ $participant->client->identification }}</dd>
                                    <dt class="col-md-4">Cumpleaños</dt>
                                    <dd class="col-md-8">{{ $participant->client->birth }}</dd>
                                </dl>
                            </div>
                            <div class="col-md-4">
                                <dl class="row">
                                    <dt class="col-md-4">CI</dt>
                                    <dd class="col-md-8">{{ $participant->client->number }} - {{ $participant->client->complement }} {{ $participant->client->extension }}</dd>
                                </dl>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@endsection
