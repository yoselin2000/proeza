@extends('layouts.app')
@section('title')
    <div class="row">
        <h1 class="m-0">Gastos Operativos de la Familia</h1>
        @can('evalationsFamily.store')
            <ol class="breadcrumb float-sm-right pl-1">
                <button type="button" class="btn btn-success btn-xs" data-toggle="modal" data-target="#familyExpenseCreate"><i class="fas fa-plus-circle"></i></button>
            </ol>
        @endcan
    </div>
    @include('evaluation.familyExpenses.create')
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
                            @foreach ($familyExpenses as $familyExpense)
                                <tr>
                                    <td>{{ $familyExpense->id }}</td>
                                    <td>{{ $familyExpense->evaluation->participant->application->id }}</td>
                                    <td>{{ $familyExpense->evaluation->participant->category->name }}</td>
                                    <td>{{ $familyExpense->evaluation->participant->client->lastName }} {{ $familyExpense->evaluation->participant->client->secondLastName }} {{ $familyExpense->evaluation->participant->client->name }}  {{ $familyExpense->evaluation->participant->client->thirdLastName }}</td>
                                    <td>{{ $familyExpense->amount }}</td>
                                    <td>
                                        <div class="btn-group">
                                            @can('evalationsFamily.update')
                                                <button type="button" class="btn btn-warning btn-xs" data-toggle="modal" data-target="#familyExpenseEdit{{ $familyExpense->id }}"><i class="fas fa-pen"></i></button>
                                                @include('evaluation.familyExpenses.edit')
                                            @endcan
                                            @can('evalationsFamily.destroy')
                                                <button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#familyExpenseDelete{{ $familyExpense->id }}"><i class="fas fa-trash-alt"></i></button>
                                                @include('evaluation.familyExpenses.delete')
                                            @endcan
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tfoot>
                    </table>
                    {{ $familyExpenses->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection