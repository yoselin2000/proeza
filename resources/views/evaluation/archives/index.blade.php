@extends('layouts.app')
@section('title')
    <div class="row">
        <h1 class="m-0">Archivos</h1>
        @can('evalationsFamily.store')
            <ol class="breadcrumb float-sm-right pl-1">
                <button type="button" class="btn btn-success btn-xs" data-toggle="modal" data-target="#archiveCreate"><i class="fas fa-plus-circle"></i></button>
            </ol>
        @endcan
    </div>
    @include('evaluation.archives.create')
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
                            @foreach ($archives as $archive)
                                <tr>
                                    <td>{{ $archive->id }}</td>
                                    <td>{{ $archive->evaluation->participant->application->id }}</td>
                                    <td>{{ $archive->evaluation->participant->category->name }}</td>
                                    <td>{{ $archive->evaluation->participant->client->lastName }} {{ $archive->evaluation->participant->client->secondLastName }} {{ $archive->evaluation->participant->client->name }}  {{ $archive->evaluation->participant->client->thirdLastName }}</td>
                                    <td>
                                        <div class="btn-group">
                                            @can('evalationsFamily.update')
                                                <button type="button" class="btn btn-warning btn-xs" data-toggle="modal" data-target="#archiveEdit{{ $archive->id }}"><i class="fas fa-pen"></i></button>
                                                @include('evaluation.archives.edit')
                                            @endcan
                                            @can('evalationsFamily.destroy')
                                                <button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#archiveDelete{{ $archive->id }}"><i class="fas fa-trash-alt"></i></button>
                                                @include('evaluation.archives.delete')
                                            @endcan
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tfoot>
                    </table>
                    {{ $archives->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
