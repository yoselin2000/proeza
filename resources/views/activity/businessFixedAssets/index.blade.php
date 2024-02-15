@extends('layouts.app')
@section('title')
    <div class="row">
        <h1 class="m-0">Activos Fijos Negocio</h1>
        @can('activities.store')
            <ol class="breadcrumb float-sm-right pl-1">
                <button type="button" class="btn btn-success btn-xs" data-toggle="modal" data-target="#businessFixedAssetCreate"><i class="fas fa-plus-circle"></i></button>
            </ol>
        @endcan
    </div>
    @include('activity.businessFixedAssets.create')
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
                                <th>Categoria</th>
                                <th>Participante</th>
                                <th>Tipo de Bien</th>
                                <th>Año/Compra</th>
                                <th>Valor Actual</th>
                                <th>Opciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($businessFixedAssets as $businessFixedAsset)
                                <tr>
                                    <td>{{ $businessFixedAsset->activity->evaluation->participant->application->id }}</td>
                                    <td>{{ $businessFixedAsset->activity->evaluation->participant->category->name }}</td>
                                    <td>{{ $businessFixedAsset->activity->evaluation->participant->client->lastName }} {{ $businessFixedAsset->activity->evaluation->participant->client->secondLastName }} {{ $businessFixedAsset->activity->evaluation->participant->client->name }}  {{ $businessFixedAsset->activity->evaluation->participant->client->thirdLastName }}</td>
                                    <td>{{ $businessFixedAsset->assetType->name }}</td>
                                    <td>{{ $businessFixedAsset->year }}</td>
                                    <td>{{ $businessFixedAsset->amount }}</td>
                                    <td>
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-info btn-xs" data-toggle="modal" data-target="#businessFixedAssetShow{{ $businessFixedAsset->id }}"><i class="fas fa-eye"></i></button>
                                            @include('activity.businessFixedAssets.show')
                                            @can('activities.update')
                                                <button type="button" class="btn btn-warning btn-xs" data-toggle="modal" data-target="#businessFixedAssetEdit{{ $businessFixedAsset->id }}"><i class="fas fa-pen"></i></button>
                                                @include('activity.businessFixedAssets.edit')
                                            @endcan
                                            @can('activities.destroy')
                                                <button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#businessFixedAssetDelete{{ $businessFixedAsset->id }}"><i class="fas fa-trash-alt"></i></button>
                                                @include('activity.businessFixedAssets.delete')
                                            @endcan
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tfoot>
                    </table>
                    {{ $businessFixedAssets->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
