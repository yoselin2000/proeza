@extends('layouts.app')
@section('title')
    <div class="row">
        <h1 class="m-0">Gastos Negocio</h1>
        @can('activities.store')
            <ol class="breadcrumb float-sm-right pl-1">
                <button type="button" class="btn btn-success btn-xs" data-toggle="modal" data-target="#businessExpenseCreate"><i class="fas fa-plus-circle"></i></button>
            </ol>
        @endcan
    </div>
    @include('activity.businessExpenses.create')
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
                                <th>Item</th>
                                <th>Valor</th>
                                <th>Opciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($businessExpenses as $businessExpense)
                                <tr>
                                    {{--  <td>{{ $businessExpense->id }}</td>  --}}
                                    <td>{{ $businessExpense->activity->evaluation->participant->application->id }}</td>
                                    <td>{{ $businessExpense->activity->evaluation->participant->category->name }}</td>
                                    <td>{{ $businessExpense->activity->evaluation->participant->client->lastName }} {{ $businessExpense->activity->evaluation->participant->client->secondLastName }} {{ $businessExpense->activity->evaluation->participant->client->name }}  {{ $businessExpense->activity->evaluation->participant->client->thirdLastName }}</td>
                                    <td>{{ $businessExpense->expenseType->name }}</td>
                                    <td>{{ $businessExpense->amount }}</td>
                                    <td>
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-info btn-xs" data-toggle="modal" data-target="#businessExpenseShow{{ $businessExpense->id }}"><i class="fas fa-eye"></i></button>
                                            @include('activity.businessExpenses.show')
                                            @can('activities.update')
                                                <button type="button" class="btn btn-warning btn-xs" data-toggle="modal" data-target="#businessExpenseEdit{{ $businessExpense->id }}"><i class="fas fa-pen"></i></button>
                                                @include('activity.businessExpenses.edit')
                                            @endcan
                                            @can('activities.destroy')
                                                <button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#businessExpenseDelete{{ $businessExpense->id }}"><i class="fas fa-trash-alt"></i></button>
                                                @include('activity.businessExpenses.delete')
                                            @endcan
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tfoot>
                    </table>
                    {{ $businessExpenses->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
