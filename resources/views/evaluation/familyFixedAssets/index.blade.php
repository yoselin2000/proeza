@extends('layouts.app')
@section('title')
    <div class="row">
        <h1 class="m-0">Activos Fijos de la Familia</h1>
        @can('evalationsFamily.store')
            <ol class="breadcrumb float-sm-right pl-1">
                <button type="button" class="btn btn-success btn-xs" data-toggle="modal" data-target="#familyFixedAssetCreate"><i class="fas fa-plus-circle"></i></button>
            </ol>
        @endcan
    </div>
    @include('evaluation.familyFixedAssets.create')
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
                            @foreach ($familyFixedAssets as $familyFixedAsset)
                                <tr>
                                    <td>{{ $familyFixedAsset->id }}</td>
                                    <td>{{ $familyFixedAsset->evaluation->participant->application->id }}</td>
                                    <td>{{ $familyFixedAsset->evaluation->participant->category->name }}</td>
                                    <td>{{ $familyFixedAsset->evaluation->participant->client->lastName }} {{ $familyFixedAsset->evaluation->participant->client->secondLastName }} {{ $familyFixedAsset->evaluation->participant->client->name }}  {{ $familyFixedAsset->evaluation->participant->client->thirdLastName }}</td>
                                    <td>
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-info btn-xs" data-toggle="modal" data-target="#familyFixedAssetShow{{ $familyFixedAsset->id }}"><i class="fas fa-eye"></i></button>
                                            @include('evaluation.familyFixedAssets.show')
                                            @can('evalationsFamily.update')
                                                <button type="button" class="btn btn-warning btn-xs" data-toggle="modal" data-target="#familyFixedAssetEdit{{ $familyFixedAsset->id }}"><i class="fas fa-pen"></i></button>
                                                @include('evaluation.familyFixedAssets.edit')
                                            @endcan
                                            @can('evalationsFamily.destroy')
                                                <button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#familyFixedAssetDelete{{ $familyFixedAsset->id }}"><i class="fas fa-trash-alt"></i></button>
                                                @include('evaluation.familyFixedAssets.delete')
                                            @endcan
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tfoot>
                    </table>
                    {{ $familyFixedAssets->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection