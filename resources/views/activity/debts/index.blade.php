@extends('layouts.app')
@section('title')
    <div class="row">
        <h1 class="m-0">Endeudamiento</h1>
        {{--  @if($showCreateButton)  --}}
            @can('activities.store')
                <ol class="breadcrumb float-sm-right pl-1">
                    <button type="button" class="btn btn-success btn-xs" data-toggle="modal" data-target="#debtCreate"><i class="fas fa-plus-circle"></i></button>
                </ol>
            @endcan
        {{--  @endif  --}}
    </div>
    @include('activity.debts.create')
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
                                <th>Pasivo corto plazo</th>
                                <th>Pasivo largo plazo</th>
                                <th>Opciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($debts as $debt)
                                <tr>
                                    <td>{{ $debt->id }}</td>
                                    <td>{{  number_format($debt->shortTerm, 2, '.', ',') }}</td>
                                    <td>{{  number_format($debt->longTerm, 2, '.', ',') }}</td>
                                    <td>
                                        <div class="btn-group">
                                            @can('activities.update')
                                                <button type="button" class="btn btn-warning btn-xs" data-toggle="modal" data-target="#debtEdit{{ $debt->id }}"><i class="fas fa-pen"></i></button>
                                                @include('activity.debts.edit')
                                            @endcan
                                            @can('activities.destroy')
                                                <button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#debtDelete{{ $debt->id }}"><i class="fas fa-trash-alt"></i></button>
                                                @include('activity.debts.delete')
                                            @endcan
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tfoot>
                    </table>
                    {{ $debts->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
