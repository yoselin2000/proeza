@extends('layouts.app')
@section('title')
    <div class="row">
        <h1 class="m-0">Ventas</h1>
        @can('activities.store')
            <ol class="breadcrumb float-sm-right pl-1">
                <button type="button" class="btn btn-success btn-xs" data-toggle="modal" data-target="#saleCreate"><i class="fas fa-plus-circle"></i></button>
            </ol>
        @endcan
    </div>
    @include('activity.sales.create')
@endsection
@section('browser')
    <li class="breadcrumb-item"><a href="{{ route('home') }}">inicio</a></li>
    <li class="breadcrumb-item">ventas</li>
@endsection
@section('content')
    @include('option.confirmation')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body p-0 table-responsive">
                    <table class="table table-bordered table-striped table-sm">
                        <thead>
                            <tr>
                                <th>id</th>
                                <th>Dias</th>
                                <th>Monto</th>
                                <th>Opciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($sales as $sale)
                                <tr>
                                    <td>{{ $sale->id }}</td>
                                    <td>{{ $sale->averageSale->activity->evaluation->participant->application->id }}</td>
                                    <td>{{ $sale->averageSale->activity->evaluation->participant->category->name }}</td>
                                    <td>{{ $sale->averageSale->activity->evaluation->participant->client->lastName }} {{ $sale->averageSale->activity->evaluation->participant->client->secondLastName }} {{ $sale->averageSale->activity->evaluation->participant->client->name }}  {{ $sale->averageSale->activity->evaluation->participant->client->thirdLastName }}</td>
                                    <td>
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-info btn-xs" data-toggle="modal" data-target="#saleShow{{ $sale->id }}"><i class="fas fa-eye"></i></button>
                                            @include('activity.sales.show')
                                            @can('activities.update')
                                                <button type="button" class="btn btn-warning btn-xs" data-toggle="modal" data-target="#saleEdit{{ $sale->id }}"><i class="fas fa-pen"></i></button>
                                                @include('activity.sales.edit')
                                            @endcan
                                            @can('activities.destroy')
                                                <button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#saleDelete{{ $sale->id }}"><i class="fas fa-trash-alt"></i></button>
                                                @include('activity.sales.delete')
                                            @endcan
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tfoot>
                    </table>
                    {{ $sales->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
