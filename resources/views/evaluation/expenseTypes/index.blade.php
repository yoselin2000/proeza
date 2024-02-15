@extends('layouts.app')
@section('title')
    <div class="row">
        <h1 class="m-0">Tipos de Gastos</h1>
        @can('evalationsFamily.store')
            <ol class="breadcrumb float-sm-right pl-1">
                <button type="button" class="btn btn-success btn-xs" data-toggle="modal" data-target="#expenseTypeCreate"><i class="fas fa-plus-circle"></i></button>
            </ol>
        @endcan
    </div>
    @include('evaluation.expenseTypes.create')
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
                            @foreach ($expenseTypes as $expenseType)
                                <tr>
                                    <td>{{ $expenseType->id }}</td>
                                    <td>{{ $expenseType->name }}</td>
                                    
                                    <td>
                                        <div class="btn-group">
                                            @can('evalationsFamily.update')
                                                <button type="button" class="btn btn-warning btn-xs" data-toggle="modal" data-target="#expenseTypeEdit{{ $expenseType->id }}"><i class="fas fa-pen"></i></button>
                                                @include('evaluation.expenseTypes.edit')
                                            @endcan
                                            @can('evalationsFamily.destroy')
                                                <button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#expenseTypeDelete{{ $expenseType->id }}"><i class="fas fa-trash-alt"></i></button>
                                                @include('evaluation.expenseTypes.delete')
                                            @endcan
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tfoot>
                    </table>
                    {{ $expenseTypes->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
