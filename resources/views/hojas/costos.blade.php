@extends('layouts.app')
@section('title')
    <div class="row">
        <h5 class="m-0">
            Cliente {{ $evaluation->participant->client->lastName }} {{ $evaluation->participant->client->secondLastName }} {{ $evaluation->participant->client->name }} {{ $evaluation->participant->client->thirdLastName }} - Hoja de Costos
        </h5>
        @if (!$application->approved && !$application->rejected)
            @can('activities.store')
                <button type="button" class="btn btn-success btn-xs mr-1" data-toggle="modal" data-target="#articleCreate"><i class="fas fa-plus-circle"></i></button>
                @include('activity.articles.create')
            @endcan
        @endif
        <div class="btn-group" role="group" aria-label="Button group">
            <form action="{{ route('prints.costs', $activity->id) }}" method="GET">
                <button class="btn btn-info btn-xs" type="submit"><i class="fa fa-print" aria-hidden="true"></i></button>
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
    <div class="row">
        @foreach ($activity->articles as $article)
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        Producto: {{ $article->name }} <br>
                        Rendimiento: {{ $article->performance }} <br>
                        Unidad: {{ $article->production }}
                        @if (!$application->approved && !$application->rejected)
                            @can('activities.store')
                                <button type="button" class="btn btn-success btn-xs" data-toggle="modal" data-target="#supplyCreate{{ $article->id }}"><i class="fas fa-plus-circle"></i></button>
                                @include('activity.supplies.create')
                            @endcan
                            @can('activities.update')
                                <button type="button" class="btn btn-warning btn-xs" data-toggle="modal" data-target="#articleEdit{{ $article->id }}"><i class="fas fa-pen"></i></button>
                                @include('activity.articles.edit')
                            @endcan
                            @can('activities.destroy')
                                <button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#articleDelete{{ $article->id }}"><i class="fas fa-trash-alt"></i></button>
                                @include('activity.articles.delete')
                            @endcan
                        @endif
                    </div>
                    <div class="card-body table-responsive">
                        <div class="row">
                            <div class="col-md">
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
                                                @if (!$application->approved && !$application->rejected)
                                                    @can('activities.update','activities.destroy')
                                                        <th>
                                                            Opc
                                                        </th>
                                                    @endcan
                                                @endif
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
                                                    @if (!$application->approved && !$application->rejected)
                                                        <td>
                                                            <div class="btn-group">
                                                                @can('activities.update')
                                                                    <button type="button" class="btn btn-warning btn-xs" data-toggle="modal" data-target="#supplyEdit{{ $supply->id }}"><i class="fas fa-pen"></i></button>
                                                                    @include('activity.supplies.edit')
                                                                @endcan
                                                                @can('activities.destroy')
                                                                    <button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#supplyDelete{{ $supply->id }}"><i class="fas fa-trash-alt"></i></button>
                                                                    @include('activity.supplies.delete')
                                                                @endcan
                                                            </div>
                                                        </td>
                                                    @endif
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
                </div>
            </div>
        @endforeach
    </div>
@endsection
