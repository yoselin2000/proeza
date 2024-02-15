@extends('layouts.app')
@section('title')
    <div class="row">
        <h1 class="m-0">Activos Corrientes</h1>
        @can('evalationsFamily.store')
            <ol class="breadcrumb float-sm-right pl-1">
                <button type="button" class="btn btn-success btn-xs" data-toggle="modal" data-target="#currentAssetCreate"><i class="fas fa-plus-circle"></i></button>
            </ol>
        @endcan
    </div>
    @include('evaluation.currentAssets.create')
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
                            @foreach ($currentAssets as $currentAsset)
                                <tr>
                                    <td>{{ $currentAsset->id }}</td>
                                    <td>{{ $currentAsset->evaluation->participant->application->id }}</td>
                                    <td>{{ $currentAsset->evaluation->participant->category->name }}</td>
                                    <td>{{ $currentAsset->evaluation->participant->client->lastName }} {{ $currentAsset->evaluation->participant->client->secondLastName }} {{ $currentAsset->evaluation->participant->client->name }}  {{ $currentAsset->evaluation->participant->client->thirdLastName }}</td>
                                    <td>
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-info btn-xs" data-toggle="modal" data-target="#currentAssetShow{{ $currentAsset->id }}"><i class="fas fa-eye"></i></button>
                                            @include('evaluation.currentAssets.show')
                                            @can('evalationsFamily.update')
                                                <button type="button" class="btn btn-warning btn-xs" data-toggle="modal" data-target="#currentAssetEdit{{ $currentAsset->id }}"><i class="fas fa-pen"></i></button>
                                                @include('evaluation.currentAssets.edit')
                                            @endcan
                                            @can('evalationsFamily.destroy')
                                                <button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#currentAssetDelete{{ $currentAsset->id }}"><i class="fas fa-trash-alt"></i></button>
                                                @include('evaluation.currentAssets.delete')
                                            @endcan
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tfoot>
                    </table>
                    {{ $currentAssets->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection