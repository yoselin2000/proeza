@extends('layouts.app')
@section('title')
    <div class="row">
        <h1 class="m-0">Garantias</h1>
        @can('evalationsFamily.store')
            <ol class="breadcrumb float-sm-right pl-1">
                <button type="button" class="btn btn-success btn-xs" data-toggle="modal" data-target="#warrantyCreate"><i class="fas fa-plus-circle"></i></button>
            </ol>
        @endcan
    </div>
    @include('evaluation.warranties.create')
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
                                <th>Garantia</th>
                                <th>Opciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($warranties as $warranty)
                                <tr>
                                    <td>{{ $warranty->id }}</td>
                                    <td>{{ $warranty->name }}</td>
                                    
                                    <td>
                                        <div class="btn-group">
                                            @can('evalationsFamily.update')
                                                <button type="button" class="btn btn-warning btn-xs" data-toggle="modal" data-target="#warrantyEdit{{ $warranty->id }}"><i class="fas fa-pen"></i></button>
                                                @include('evaluation.warranties.edit')
                                            @endcan
                                            @can('evalationsFamily.destroy')
                                                <button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#warrantyDelete{{ $warranty->id }}"><i class="fas fa-trash-alt"></i></button>
                                                @include('evaluation.warranties.delete')
                                            @endcan
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tfoot>
                    </table>
                    {{ $warranties->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
