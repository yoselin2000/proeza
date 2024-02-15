@extends('layouts.app')
@section('title')
    <div class="row">
        <h1 class="m-0">Referencias</h1>
        @can('evalationsFamily.store')
            <ol class="breadcrumb float-sm-right pl-1">
                <button type="button" class="btn btn-success btn-xs" data-toggle="modal" data-target="#referenceCreate"><i class="fas fa-plus-circle"></i></button>
            </ol>
        @endcan
    </div>
    @include('evaluation.references.create')
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
                            @foreach ($references as $reference)
                                <tr>
                                    <td>{{ $reference->id }}</td>
                                    <td>{{ $reference->evaluation->participant->application->id }}</td>
                                    <td>{{ $reference->evaluation->participant->category->name }}</td>
                                    <td>{{ $reference->evaluation->participant->client->lastName }} {{ $reference->evaluation->participant->client->secondLastName }} {{ $reference->evaluation->participant->client->name }}  {{ $reference->evaluation->participant->client->thirdLastName }}</td>
                                    <td>
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-info btn-xs" data-toggle="modal" data-target="#referenceShow{{ $reference->id }}"><i class="fas fa-eye"></i></button>
                                            @include('evaluation.references.show')
                                            @can('evalationsFamily.update')
                                                <button type="button" class="btn btn-warning btn-xs" data-toggle="modal" data-target="#referenceEdit{{ $reference->id }}"><i class="fas fa-pen"></i></button>
                                                @include('evaluation.references.edit')
                                            @endcan
                                            @can('evalationsFamily.destroy')
                                                <button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#referenceDelete{{ $reference->id }}"><i class="fas fa-trash-alt"></i></button>
                                                @include('evaluation.references.delete')
                                            @endcan
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tfoot>
                    </table>
                    {{ $references->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
