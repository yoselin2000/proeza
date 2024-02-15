@extends('layouts.app')
@section('title')
    <div class="row">
        <h1 class="m-0">Activos Corrientes</h1>
        @can('evalationsFamily.store')
            <ol class="breadcrumb float-sm-right pl-1">
                <button type="button" class="btn btn-success btn-xs" data-toggle="modal" data-target="#businessCurrentAssetCreate"><i class="fas fa-plus-circle"></i></button>
            </ol>
        @endcan
    </div>
    @include('activity.businessCurrentAssets.create')
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
                                <th>Solicitud</th>
                                <th>Categoria</th>
                                <th>Cliente</th>
                                <th>Opciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($businessCurrentAssets as $businessCurrentAsset)
                                <tr>
                                    <td>{{ $businessCurrentAsset->id }}</td>
                                    <td>{{ $businessCurrentAsset->activity->evaluation->participant->application->id }}</td>
                                    <td>{{ $businessCurrentAsset->activity->evaluation->participant->category->name }}</td>
                                    <td>{{ $businessCurrentAsset->activity->evaluation->participant->client->lastName }} {{ $businessCurrentAsset->activity->evaluation->participant->client->secondLastName }} {{ $businessCurrentAsset->activity->evaluation->participant->client->name }}  {{ $businessCurrentAsset->activity->evaluation->participant->client->thirdLastName }}</td>
                                    <td>
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-info btn-xs" data-toggle="modal" data-target="#businessCurrentAssetShow{{ $businessCurrentAsset->id }}"><i class="fas fa-eye"></i></button>
                                            @include('activity.businessCurrentAssets.show')
                                            @can('evalationsFamily.update')
                                                <button type="button" class="btn btn-warning btn-xs" data-toggle="modal" data-target="#businessCurrentAssetEdit{{ $businessCurrentAsset->id }}"><i class="fas fa-pen"></i></button>
                                                @include('activity.businessCurrentAssets.edit')
                                            @endcan
                                            @can('evalationsFamily.destroy')
                                                <button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#businessCurrentAssetDelete{{ $businessCurrentAsset->id }}"><i class="fas fa-trash-alt"></i></button>
                                                @include('activity.businessCurrentAssets.delete')
                                            @endcan
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tfoot>
                    </table>
                    {{ $businessCurrentAssets->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection