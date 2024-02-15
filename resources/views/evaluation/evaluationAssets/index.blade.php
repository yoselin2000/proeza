@extends('layouts.app')
@section('title')
    <div class="row">
        <h1 class="m-0">Activos</h1>
        @can('evalationsFamily.store')
            <ol class="breadcrumb float-sm-right pl-1">
                <button type="button" class="btn btn-success btn-xs" data-toggle="modal" data-target="#evaluationAssetCreate"><i class="fas fa-plus-circle"></i></button>
            </ol>
        @endcan
    </div>
    @include('evaluation.evaluationAssets.create')
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
                            @foreach ($evaluationAssets as $evaluationAsset)
                                <tr>
                                    <td>{{ $evaluationAsset->id }}</td>
                                    <td>{{ $evaluationAsset->evaluation->participant->application->id }}</td>
                                    <td>{{ $evaluationAsset->evaluation->participant->category->name }}</td>
                                    <td>{{ $evaluationAsset->evaluation->participant->client->lastName }} {{ $evaluationAsset->evaluation->participant->client->secondLastName }} {{ $evaluationAsset->evaluation->participant->client->name }}  {{ $evaluationAsset->evaluation->participant->client->thirdLastName }}</td>
                                    <td>
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-info btn-xs" data-toggle="modal" data-target="#evaluationAssetShow{{ $evaluationAsset->id }}"><i class="fas fa-eye"></i></button>
                                            @include('evaluation.evaluationAssets.show')
                                            @can('evalationsFamily.update')
                                                <button type="button" class="btn btn-warning btn-xs" data-toggle="modal" data-target="#evaluationAssetEdit{{ $evaluationAsset->id }}"><i class="fas fa-pen"></i></button>
                                                @include('evaluation.evaluationAssets.edit')
                                            @endcan
                                            @can('evalationsFamily.destroy')
                                                <button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#evaluationAssetDelete{{ $evaluationAsset->id }}"><i class="fas fa-trash-alt"></i></button>
                                                @include('evaluation.evaluationAssets.delete')
                                            @endcan
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tfoot>
                    </table>
                    {{ $evaluationAssets->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
