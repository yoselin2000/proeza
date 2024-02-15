@extends('layouts.app')
@section('title')
    <div class="row">
        <h5 class="m-0">
            Cliente {{ $evaluation->participant->client->lastName }} {{ $evaluation->participant->client->secondLastName }} {{ $evaluation->participant->client->name }} {{ $evaluation->participant->client->thirdLastName }} - Datos de la Empresa
        </h5>
        @if (!$application->approved && !$application->rejected)
            @can('activities.store')
                <button type="button" class="btn btn-success btn-xs mr-1" data-toggle="modal" data-target="#companyCreate"><i class="fas fa-plus-circle"></i></button>
                @include('activity.companies.create')
            @endcan
        @endif
        <div class="btn-group" role="group" aria-label="Button group">
            <form action="{{ route('prints.company', $activity->id) }}" method="GET">
                <button class="btn btn-info btn-xs" type="submit"><i class="fa fa-print" aria-hidden="true"></i></button>
            </form>
        </div>
    </div>
@endsection
@section('content')
    @include('option.confirmation')
    @foreach ($activity->companies as $company)
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        {{ $company->name }}
                        @if (!$application->approved && !$application->rejected)
                            @can('activities.update')
                                <button type="button" class="btn btn-warning btn-xs" data-toggle="modal" data-target="#companyEdit{{ $company->id }}"><i class="fas fa-pen"></i></button>
                                @include('activity.companies.edit')
                            @endcan
                            @can('activities.destroy')
                                <button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#companyDelete{{ $company->id }}"><i class="fas fa-trash-alt"></i></button>
                                @include('activity.companies.delete')
                            @endcan
                        @endif
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <dl class="row">
                                    <dt class="col-md-4">Nombre</dt>
                                    <dd class="col-md-8">{{ $company->name }}</dd>
                                    <dt class="col-md-4">Cargo que desempeña</dt>
                                    <dd class="col-md-8">{{ $company->post }}</dd>
                                </dl>
                            </div>
                            <div class="col-md-6">
                                <dl class="row">
                                    <dt class="col-md-4">Antiguedad (años)</dt>
                                    <dd class="col-md-8">{{ $company->antiquity }}</dd>
                                    <dt class="col-md-4">Liquido pagable</dt>
                                    <dd class="col-md-8">{{ number_format($company->salary, 2, '.', ',') }}</dd>
                                </dl>
                            </div>
                            <div class="col-md-6">
                                <dl class="row">
                                    <dt class="col-md-4">Frecuencia</dt>
                                    <dd class="col-md-8">{{ $company->frequency }}</dd>
                                </dl>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@endsection
